<!doctype html>
<html lang="pt-br">
  <head>
    <title>Alteração de credenciais da instituição</title>
	<script type='text/javascript'>
  function mascara(formato, keypress, objeto){
    campo = eval(objeto);

    //TELEFONE
    if(formato == 'telefone'){
      separador1 = '(';
      separador2 = ') ';
      separador3 = '-';
      conjunto1 = 0;
      conjunto2 = 3;
      conjunto3 = 9;
      if(telefone.value.length == conjunto1){
        telefone.value = telefone.value + separador1;
      }
      if(telefone.value.length == conjunto2){
        telefone.value = telefone.value + separador2;
      }
      if(telefone.value.length == conjunto3){
        telefone.value = telefone.value + separador3;
      }
    }
  }
  </script>
  </head>
<body>
<?php
session_start();
if(!$_SESSION['instituicao']){
    header('location:login.php');
    exit();
}
$cnpj = $_SESSION['instituicao'][3];


if (isset($_POST['senha_inst'])) {
	

 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva a nova senha</h5><br>

        <label><b>Senha:</b></label>
        <br>
        <input type='password' name='senha_inst' placeholder='Nova senha'>
        <br>
		<br>
		<input type='password' name='confirmar_senha' placeholder='Confirmar senha'>
        <br>
        <br>
    

	    <input class='btn btn-info' type='submit' name='alterar' value='Alterar'>

	    <br><br>

	    <input class='btn btn-danger' type='reset' value='Limpar'>
		<br>
		<a href='painel_inst.php'>voltar</a>

	    </form>";
	}
	
	
else if (isset($_POST['nome_inst'])) {
	

 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva o novo nome</h5><br>

        <label><b>Nome:</b></label>
        <br>
        <input type='text' name='nome_inst' placeholder='Novo nome'>
        <br>
        <br>
    

	    <input class='btn btn-info' type='submit' name='alterar' value='Alterar'>

	    <br><br>

	    <input class='btn btn-danger' type='reset' value='Limpar'>
		<br>
		<a href='painel_inst.php'>voltar</a>

	    </form>";
	}
		

		
else if (isset($_POST['endereco_inst'])) {
	

 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva o novo endereço</h5><br>

        <label><b>Endereço:</b></label>
        <br>
        <input type='text' name='endereço_inst' placeholder='Novo endereço'>
        <br>
        <br>
    

	    <input class='btn btn-info' type='submit' name='alterar' value='Alterar'>

	    <br><br>

	    <input class='btn btn-danger' type='reset' value='Limpar'>
<br>
		<a href='painel_inst.php'>voltar</a>
	    </form>";
		
	}
			
		
	

		
else if (isset($_POST['bairro_inst'])) {
	

 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva o novo bairro</h5><br>

        <label><b>Bairro:</b></label>
        <br>
        <input type='text' name='bairro_inst' placeholder='Novo bairro'>
        <br>
        <br>
    

	    <input class='btn btn-info' type='submit' name='alterar' value='Alterar'>

	    <br><br>

	    <input class='btn btn-danger' type='reset' value='Limpar'>
<br>
		<a href='painel_inst.php'>voltar</a>
	    </form>";
	}
		
		

		
else if (isset($_POST['cidade_inst'])) {
	

 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva a nova cidade</h5><br>

        <label><b>Cidade:</b></label>
        <br>
        <input type='text' name='cidade_inst' placeholder='Nova cidade'>
        <br>
        <br>
    

	    <input class='btn btn-info' type='submit' name='alterar' value='Alterar'>

	    <br><br>

	    <input class='btn btn-danger' type='reset' value='Limpar'>
<br>
		<a href='painel_inst.php'>voltar</a>
	    </form>";
	}
			

				
else if (isset($_POST['cep_inst'])) {
	

 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva o novo CEP</h5><br>

        <label><b>CEP:</b></label>
        <br>
        <input type='text' name='cep_inst' placeholder='Novo CEP'>
        <br>
        <br>
    

	    <input class='btn btn-info' type='submit' name='alterar' value='Alterar'>

	    <br><br>

	    <input class='btn btn-danger' type='reset' value='Limpar'>
<br>
		<a href='painel_inst.php'>voltar</a>
	    </form>";
	}
		
	
else if (isset($_POST['email_inst'])) {
	

 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva o novo Email:</h5><br>

        <label><b>Email:</b></label>
        <br>
        <input type='email' name='email_inst' placeholder='Novo Email'>
        <br>
        <br>
    

	    <input class='btn btn-info' type='submit' name='alterar' value='Alterar'>

	    <br><br>

	    <input class='btn btn-danger' type='reset' value='Limpar'>
<br>
		<a href='painel_inst.php'>voltar</a>
	    </form>";
	}
				

				
else if (isset($_POST['telefone_inst'])) {
	

 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva novo telefone</h5><br>

        <label><b>Telefone:</b></label>
        <br>
        input type='text' name='telefone' maxlength='15' placeholder='(99) 99999-9999' onkeypress='mascara('telefone', window.event.keyCode, 'document.cadastro_uso.telefone')'> <br><small>*(com DDD)</small>
        <br>
        <br>
    

	    <input class='btn btn-info' type='submit' name='alterar' value='Alterar'>

	    <br><br>

	    <input class='btn btn-danger' type='reset' value='Limpar'>
		<br>
		<a href='painel_inst.php'>voltar</a>
	    </form>";
}
else{
	header('Location:painel_inst.php');
	exit();
}
?>

<?php
if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true){
	
	include "connection.php";
	$conn = conexao();
	
	//declaramos as variáveis se o post correspondente existir (isset) e alteramos o comando sql de acordo com o item que foi escolhido para ser alterado
	
	if(isset($_POST['senha_inst'])){
			
		if(strlen(utf8_decode($_POST["senha_inst"])) < 10 || strlen(utf8_decode($_POST["senha_inst"])) > 100){
			$erro = " digite uma senha válida (use entre 10 e 100 caracteres).";
			echo "<div class='erro'>".$erro."</div><br>";
		}
		elseif($_POST["senha_inst"] != $_POST["confirmar_senha"]){
			$erro = "Confirmação de senha inválida. Por favor, digite novamente.";
			echo "<div class='erro'>".$erro."</div><br>";
		}
		else{
			$senha = md5($_POST['senha_inst']);
			$update = "update faculdade set senha_inst=? where cnpj = ? ";
			$res = $conn->prepare($update);
			$res->bindValue(1,$senha);
			$res->bindValue(2,$_SESSION['instituicao'][3]);
			$res->execute();
		}
			
	}
	
	elseif(isset($_POST['nome_inst'])){
		if (strlen(utf8_decode($_POST["nome_inst"]))<5 || strlen(utf8_decode($_POST["nome_inst"]))>255) {
			$erro = "preencha o campo nome corretamente (5 ou mais caracteres ou menos de 255)";
			echo "<div class='erro'>".$erro."</div><br>";
		}
		else{
			$nome_inst = $_POST["nome_inst"];
			$update = "update faculdade set nome_inst=? where cnpj = ? ";
			$res = $conn->prepare($update);
			$res->bindValue(1,$nome_inst);
			$res->bindValue(2,$_SESSION['instituicao'][3]);
			$res->execute();
			
		}
	}
	
	elseif(isset($_POST['endereco_inst'])){
		if(strlen(utf8_decode($_POST["endereco_inst"]))<3 || strlen(utf8_decode($_POST["endereco_inst"]))>255){
			$erro="digite um endereço valido";
			echo "<div class='erro'>".$erro."</div><br>";
		}
		else{
			$endereco_inst = $_POST["endereco_inst"];
			$update = "update faculdade set endereco_inst=? where cnpj = ? ";
			$res = $conn->prepare($update);
			$res->bindValue(1,$endereco_inst);
			$res->bindValue(2,$_SESSION['instituicao'][3]);
			$res->execute();
		}
			
	}
	
	elseif(isset($_POST['bairro_inst'])){
		if(strlen(utf8_decode($_POST["bairro_inst"]))<5 || strlen(utf8_decode($_POST["bairro_inst"]))>30){
			$erro= "digite algo valido(bairro)";
			echo "<div class='erro'>".$erro."</div><br>";
		}
		else{
			$bairro_inst = $_POST["bairro_inst"];
			$update = "update faculdade set bairro_inst=? where cnpj = ? ";
			$res = $conn->prepare($update);
			$res->bindValue(1,$bairro_inst);
			$res->bindValue(2,$_SESSION['instituicao'][3]);
			$res->execute();
		}
	}
	
	elseif(isset($_POST['cidade_inst'])){
		if(strlen(utf8_decode($_POST["cidade_inst"]))<5 || strlen(utf8_decode($_POST["cidade_inst"]))>255){
			$erro= "digite algo valido (cidade)";
			echo "<div class='erro'>".$erro."</div><br>";
		}
		else{
			$cidade_inst = $_POST["cidade_inst"];
			$update = "update faculdade set cidade_inst=? where cnpj = ? ";
			$res = $conn->prepare($update);
			$res->bindValue(1,$cidade_inst);
			$res->bindValue(2,$_SESSION['instituicao'][3]);
			$res->execute();
		}
	}
	
	elseif(isset($_POST['cep_inst'])){
		if(strlen(utf8_decode($_POST["cep"]))<8 || strlen(utf8_decode($_POST["cep"]))>8){
			$erro= "digite corretamente o CEP";
			echo "<div class='erro'>".$erro."</div><br>";
		}
		else{
			$cep_inst = $_POST["cep_inst"];
			$update = "update faculdade set cep_inst=? where cnpj = ? ";
			$res = $conn->prepare($update);
			$res->bindValue(1,$cep_inst);
			$res->bindValue(2,$_SESSION['instituicao'][3]);
			$res->execute();
		}
	}
	
	elseif(isset($_POST['email_inst'])){
		if(!filter_var($_POST["email_inst"], FILTER_VALIDATE_EMAIL)){
			$erro = " digite um email valido.";
			echo "<div class='erro'>".$erro."</div><br>";
		}
		else{
			$email_inst = $_POST["email_inst"];
			$result = $conn->prepare("select * from faculdade where email_inst = '{$email_inst}'");
      		$result->execute(); //Executa o comando

			if($result->fetchColumn() > 0){ //Se retornar mais de 0 resultado, existe um email igual cadastrado
				$erro = "Não é possivel utilizar o email digitado, por favor, insira outro";
				echo "<div class='erro'>".$erro."</div><br>";
			}
			else{
				$update = "update faculdade set email_inst=? where cnpj = ? ";
				$res = $conn->prepare($update);
				$res->bindValue(1,$email_inst);
				$res->bindValue(2,$_SESSION['instituicao'][3]);
				$res->execute();
			}
		}
	}
	
	elseif(isset($_POST['telefone_inst'])){
		if(strlen(utf8_decode($_POST["telefone_inst"]))<14 || strlen(utf8_decode($_POST["telefone_inst"]))>15){
			$erro= "insira um telefone valido";
			echo "<div class='erro'>".$erro."</div><br>";
		}
		else{
			$telefone_inst = $_POST["telefone_inst"];
			$update = "update faculdade set telefone_inst=? where cnpj = ? ";
			$res = $conn->prepare($update);
			$res->bindValue(1,$telefone_inst);
			$res->bindValue(2,$_SESSION['instituicao'][3]);
			$res->execute();
		}
	}

	elseif(isset($_POST['estado_inst'])){
		if(strlen(utf8_decode($_POST["estado"]))<1 || strlen(utf8_decode($_POST["estado"]))>2){
			$erro="digite uma estado valido";
			echo "<div class='erro'>".$erro."</div><br>";
		}
		else{
			$estado_inst = $_POST["estado_inst"];
			$update = "update faculdade set estado_inst=? where cnpj = ? ";
			$res = $conn->prepare($update);
			$res->bindValue(1,$estado_inst);
			$res->bindValue(2,$_SESSION['instituicao'][3]);
			$res->execute();
		}
	}
		
}

?>
