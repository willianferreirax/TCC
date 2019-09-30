<?php
  include 'connection.php';
  session_start();
  if(!$_SESSION['instituicao']){
    header('location:login.php');
    exit();
  }
  else{
        $id=$_GET['id_eve'];
        $conn=conexao();
        $select="select * from evento where cod_evento = {$id}";
        $res = $conn->prepare($select);//preparando query
        $res->execute();//executando
        $result = $res->fetchAll();
        
  }
  
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alterar evento</title>
</head>
<body>
        <form name='alterar_evento' method="POST" action="?validar=true&id_eve=<?php echo $id?>">


			<label class='labelint'>Dê um <b>nome</b> ao seu evento:</label><br>
			<input class='inputcreate' id='createnome' type='text' name='nome' value=<?php echo $result[0]['nome_evento'];?>>
            <br><br>
			
        
			<label class='labelint'>Informe o <b>logradouro</b> do evento:</label>
			<input class='inputcreate' type='text' name='endereco' value=<?php echo $result[0]['endereco_evento'];?>>
            <br>	<br>

		    <label class='labelint'>Qual <b>bairro</b> o evento ocorrerá?</label>
			<input class='inputcreate' type='text' name='bairro' value=<?php echo $result[0]['bairro_evento'];?>>
            <br><br>

			<label class='labelint'>Qual <b>cidade</b> o evento ocorrerá?</label>
			<input class='inputcreate' type='text' name='cidade' value=<?php echo $result[0]['cidade_evento'];?>>
            <br>	<br>	

			<label class='labelint'>Qual <b>estado</b> o evento ocorrerá?</label>
			<select name="estado" >
                <option value=<?php echo $result[0]['estado_evento'];?> selected><?php echo $result[0]['estado_evento'];?></option>
				<option value="AC">Acre</option>
				<option value="AL">Alagoas</option>
				<option value="AP">Amapá</option>
				<option value="AM">Amazonas</option>
				<option value="BA">Bahia</option>
				<option value="CE">Ceará</option>
				<option value="DF">Distrito Federal</option>
				<option value="ES">Espirito Santo</option>
				<option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
				<option value="MS">Mato Grosso do Sul</option>
				<option value="MG">Minas Gerais</option>
				<option value="PA">Pará</option>
				<option value="PB">Paraíba</option>
				<option value="PR">Paraná</option>
				<option value="PE">Pernambuco</option>
				<option value="PI">Piauí</option>
				<option value="RJ">Rio de Janeiro</option>
				<option value="RJ">Rio Grande do Norte</option>
				<option value="RS">Rio grande do sul</option>
				<option value="RO">Rondônia</option>
				<option value="RR">Roraima</option>
				<option value="SC">Santa Catarina</option>
				<option value="SP">São Paulo</option>
				<option value="SE">Sergipe</option>
				<option value="TO">Tocantins</option>
			</select>
            <br><br>	
				<label class='labelint'>Agora, digite o <b>CEP</b>:</label>
				<input class='inputcreate' type='text' name='cep' value=<?php echo $result[0]['cep_evento'];?>>
                <br><br>	
				<label class='labelint'>Quando o evento irá <b>começar</b>?</label>
				<input class='inputcreate' type='date' name='dateinic' value=<?php echo $result[0]['data_inicio'];?>>
                <br><br>
				<label class='labelint'>Quando o evento irá <b>acabar</b>?</label>
				<input class='inputcreate' type='date' name='datefinal' value=<?php echo $result[0]['data_termino'];?>>
                <br><br>
				<label class='labelint'>Informe o horário que o evento <b>inciará</b>:</label>
				<input class='inputcreate' type='time' name='timeinic' value=<?php echo $result[0]['hora_inicio'];?>>
                <br><br>
				<label class='labelint'>Informe o horário que o evento <b>encerrará</b>:</label>
				<input class='inputcreate' type='time' name='timefinal' value=<?php echo $result[0]['hora_termino'];?>>
                <br><br>
				<label class='labelint'>Qual o <b>preço</b> do evento?</label>
				<input class='inputcreate' type='number' name='preco' value=<?php echo $result[0]['preco_evento'];?>>
                <br><br>
				<label class='labelint'>Por fim, conta pra gente sobre o seu evento:</label>
				<textarea draggable="false" name='desc' maxlength="149"><?php echo $result[0]['descricao_evento'];?></textarea>
				<br><br><br><br>
				

    <input type="hidden" name="id" value="<?php echo $_REQUEST["id"]; ?>">

    <button class='cadastraraltinst' type="submit" value="validar">Prosseguir</button>

    </form>
    
</body>
</html>



<?php
if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true){
		$conn=conexao();
    $erro = null;
    $coderro = null;
    $valido = false;

    if(strlen(utf8_decode($_POST["nome"])) < 1 || strlen(utf8_decode($_POST["nome"])) > 255) {
        $erro = " digite um nome válido.";
        $coderro = 1;
    }  
    
    elseif(strlen(utf8_decode($_POST["dateinic"])) <10 || strlen(utf8_decode($_POST["dateinic"])) > 10) {
        $erro = " selecione uma data de inicio do evento.";
        $coderro = 3;
    }
    
    elseif(strlen(utf8_decode($_POST["datefinal"])) < 10 || strlen(utf8_decode($_POST["datefinal"])) > 10){
        $erro = "selecione uma data de termino do eventto.";
        $coderro = 4;
    }

    elseif(strtotime($_POST['dateinic']) > strtotime($_POST['datefinal'])){
        $erro = "A data de inicio é posterior à data de termino. Selecione de maneira correta";
        $coderro = 5;
    }

    elseif(strlen(utf8_decode($_POST["timeinic"])) <8 || strlen(utf8_decode($_POST["timeinic"])) > 8) {
        $erro = " digite uma hora para o inicio do evento.";
        $coderro = 6;
    }
    elseif(strlen(utf8_decode($_POST["timefinal"])) < 8 || strlen(utf8_decode($_POST["timefinal"])) > 8){
        $erro = " digite uma hora para o final do evento";
        $coderro = 7;
    }

    elseif(strtotime($_POST['timeinic']) > strtotime($_POST['timefinal'])){
        $erro = "A hora de inicio é posterior à hora de termino. Selecione de maneira correta";
        $coderro = 8;
    }

    
    elseif(strlen(utf8_decode($_POST["endereco"])) < 5 || strlen(utf8_decode($_POST["endereco"])) > 100){
        $erro = " digite um endereço valido(Minimo 5 caracateres)";
        $coderro = 9;
    }
    elseif(strlen(utf8_decode($_POST["bairro"])) < 3 || strlen(utf8_decode($_POST["bairro"])) > 100){
        $erro = "Digite um bairro válido (Minimo 3 caracteres)";
        $coderro = 10;
    }
    elseif(strlen(utf8_decode($_POST["cidade"])) < 1 || strlen(utf8_decode($_POST["cidade"])) > 100){
        $erro = "Digite uma cidade válida (Minimo 1 caractere) ";
        $coderro = 11;
    }
    elseif(strlen(utf8_decode($_POST["estado"])) < 1 || strlen(utf8_decode($_POST["estado"])) > 2){
        $erro = "Selecione o estado onde acontecerá o evento";
        $coderro = 12;
    }
    elseif(strlen(utf8_decode($_POST["cep"])) != 9) {
        $erro = "Digite um cep válido";
        $coderro = 13;
    }
    elseif(strlen(utf8_decode($_POST["desc"])) < 1 || strlen(utf8_decode($_POST["desc"])) > 200){
        $erro = "Digite uma descrição válida (Minimo de 1 caractere)";
        $coderro = 14;
    }
    
    else{
        $valido = true;
    }
    
}
    
    if(isset($valido) && $valido == true){
        $update="update evento set nome_evento =?,data_inicio=?,data_termino=?,hora_inicio=?,hora_termino=?,endereco_evento=?,bairro_evento=?,cidade_evento=?,estado_evento=?,cep_evento=?,descricao_evento=?,preco_evento=? where cod_evento ={$_GET['id_eve']}";
        $stmt = $conn->prepare($update);
			
			//Atrelando os dados às tabelas
			$stmt->bindValue(1, $_POST["nome"]);
			$stmt->bindValue(2, $_POST["dateinic"]);
			$stmt->bindValue(3, $_POST["datefinal"]);
			$stmt->bindValue(4,$_POST["timeinic"]);
			$stmt->bindValue(5,$_POST["timefinal"]);
			$stmt->bindValue(6,$_POST["endereco"]);
			$stmt->bindValue(7,$_POST["bairro"]);
			$stmt->bindValue(8,$_POST["cidade"]);
			$stmt->bindValue(9,$_POST["estado"]);
			$stmt->bindValue(10,$_POST["cep"]);
            $stmt->bindValue(11,$_POST["desc"]);
            $stmt->bindValue(12,$_POST["preco"]);
            
			
			$stmt->execute();
            
			if($stmt->errorCode() != "00000"){
				$erro = "Erro código " . $stmt->errorCode() . ": ";
				$erro .= implode(", ", $stmt->errorInfo());
				echo $erro;
            } //Exibir erro de comunicação com o banco de dados
            
            $script = "<script language='javascript'>location.href='painel_inst.php';
            alert('Evento excluido com sucesso');
            </script>';";
            echo $script;
    }
    else{
        if (isset($erro)) {
            if($coderro == 1){
                echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
            }
            if($coderro == 2){
                echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
            }
            if($coderro == 3){
                echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
            }
            if($coderro == 4){
                echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
            }
            if($coderro == 5){
                echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
            }
            if($coderro == 6){
                echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
            }
            if($coderro == 7){
                echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
            }
            if($coderro == 8){
                echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
            }
            if($coderro == 9){
                echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
            }
            if($coderro == 10){
                echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
            }
            if($coderro == 11){
                echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
            }
            if($coderro == 12){
                echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
            }
            if($coderro == 13){
                echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
            }
            if($coderro == 14){
                echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
            }
        }
    }
?>