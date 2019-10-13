<?php
session_start();
if(isset($_SESSION['instituicao']) || isset($_SESSION['usuario'])){
    header('location:index.php');
    exit();
}
?>
<!doctype html>
<html lang="pt-br">
<head>
  <title>Junte-se ao FRESHR</title>
  <!-- Required meta tags -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="description" content="Junte-se ao FRESHR. Uma visão de prosperidade para a sua carreira.">
  <meta name="keywords" content="FRESHR, Eventos, Buscar, Profissão, Cadastro">
  <meta name="robots" content="cadastro_inst, index, follow">
  <meta name="author" content="Iago Pereira, Lucas Campanelli, Renato Melo, Willian Ferreira">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/auth.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="images/icon.png">
  <meta name="viewport" content="width=device-width">
  <meta name="theme-color" content="#121212">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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

  <center>
    <header class='cabecalho'>
      <a href="index.php" class='homea'>
          <label for='logospace' class='logo'>
            <h1 class='logospace'></h1>
          </label>
          </a>
          <hr>
    </header>

    <?php

    if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true){

      include 'connection.php';
      $conn = conexao();


      //fazer script de mascara do cep e cnpj e telefone
   
      $erro = null;
      $valido = false;


      if (strlen(utf8_decode($_POST["nome"]))<5 || strlen(utf8_decode($_POST["nome"]))>255) {
        $erro = "preencha o campo nome corretamente (5 ou mais caracteres ou menos de 255)";
      }
      else{
        if(strlen(utf8_decode($_POST["bairro"]))<5 || strlen(utf8_decode($_POST["bairro"]))>30){
          $erro= "digite algo valido(bairro)";
        }
        else{
          if(strlen(utf8_decode($_POST["endereco"]))<3 || strlen(utf8_decode($_POST["endereco"]))>255){
            $erro="digite um endereço valido";
          }
          else{
            if(strlen(utf8_decode($_POST["cidade"]))<5 || strlen(utf8_decode($_POST["cidade"]))>255){
              $erro= "digite algo valido (cidade)";
            }
            else{

              if(strlen(utf8_decode($_POST["telefone"]))<14 || strlen(utf8_decode($_POST["telefone"]))>15){
                $erro= "insira um telefone valido";
              }
              else{
                if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                  $erro="digite um email valido";
                }
                else{
                  if(strlen(utf8_decode($_POST["senha"]))<10 || strlen(utf8_decode($_POST["senha"]))>255){
                    $erro="digite uma senha valida (Mais de 10 caracteres)";
                  }
                  else{
                    if($_POST["senha"] != $_POST["confirmar"]){
                      $erro="senhas diferentes digitadas";
                    }
                    else{
                      if(strlen(utf8_decode($_POST["estado"]))<1 || strlen(utf8_decode($_POST["estado"]))>2){
                        $erro="digite uma estado valido";
                      }
                      else{
                        if(strlen(utf8_decode($_POST["cep"]))<8 || strlen(utf8_decode($_POST["cep"]))>8){
                          $erro= "digite corretamente o CEP";
                        }
                        else{
                          if(strlen(utf8_decode($_POST["cnpj"]))<11 || strlen(utf8_decode($_POST["cnpj"]))>11){
                            $erro= "digite corretamente o CNPJ";
                          }
                          else{
                            $valido=true;
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }

    }


    if(isset($valido) && $valido ==true){
      $cnpj=$_POST['cnpj'];
      $email=$_POST['email'];
      $result = $conn->prepare("select * from faculdade where CNPJ = '{$cnpj}' or email_inst = '{$email}'"); //Comando de seleção que verifica se há um cnpj igual no banco de dados
      $result->execute(); //Executa o comando

      if($result->fetchColumn() > 0){ //Se retornar mais de 0 resultado, existe um cnpj igual cadastrado
        $script = "
        <script type='text/javascript'>
        alert('Email ou CNPJ já está cadastrados');
        </script>";
        echo $script;
        header('Location: cadastro_inst.php'); //Direciona o usuário para a página de login
        exit();
      }
      else{

      //concertar o banco pra voltar o md5
      $senhaHash = md5($_POST["senha"]);
      $sql="insert into faculdade (CNPJ, login_inst ,senha_inst ,nome_inst ,endereco_inst ,bairro_inst ,cidade_inst ,estado_inst ,cep_inst ,email_inst ,telefone_inst) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


      $stmt = $conn->prepare($sql);



      //Atrelando os dados às tabelas
      $stmt->bindParam(1, $_POST["cnpj"],PDO::PARAM_STR);
      $stmt->bindParam(2, $_POST["login"],PDO::PARAM_STR);


      $senha = md5($_POST["senha"]);
      $stmt->bindParam(3, $senha);

      $stmt->bindParam(4, $_POST["nome"],PDO::PARAM_STR);
      $stmt->bindParam(5, $_POST["endereco"],PDO::PARAM_STR);
      $stmt->bindParam(6, $_POST["bairro"],PDO::PARAM_STR);
      $stmt->bindParam(7, $_POST["cidade"],PDO::PARAM_STR);
      $stmt->bindParam(8, $_POST["estado"],PDO::PARAM_STR);
      $stmt->bindParam(9, $_POST["cep"],PDO::PARAM_STR);
      $stmt->bindParam(10, $_POST["email"],PDO::PARAM_STR);
      $stmt->bindParam(11, $_POST["telefone"],PDO::PARAM_STR);

      $stmt->execute();

      if($stmt->errorCode() != "00000"){
        $erro = "Erro código " . $stmt->errorCode() . ": ";
        $erro .= implode(", ", $stmt->errorInfo());
        echo $erro;
      }

      else{
        echo "<script type='text/javascript'>";
        echo "alert('Instituição cadastrada com sucesso.');";
        echo "</script>";
        header("Location:login.php");
        exit();
      }

    }
  }
    else{
      if (isset($erro)) {
        echo "<center><div class='erro'>Por gentileza, ".$erro.".</div></center><br>";
      }
    }
    ?>

  <div class="containerform">

    <form name='cadastro_uso' method="POST" action="?validar=true">

      <label><b>Nome da instituição:</b></label>
      <br>
      <input type="text" name="nome" placeholder='Nome'>
      <br>
      <br>

      <label><b>Endereço de e-mail:</b></label>
      <br>
      <input type="text" name="email" placeholder="exemplo@exemplo.com">
      <br>
      <br>

      <label><b>Telefone:</b></label>
      <br>
      <input type="text" name="telefone" maxlength='15' placeholder="(99) 99999-9999" onkeypress="mascara('telefone', window.event.keyCode, 'document.cadastro_uso.telefone')"> <br><small>*(com DDD)</small>
      <br>
      <br>

      <label><b>Login:</b></label>
      <br>
      <input type="text" name="login">
      <br>
      <br>

      <label><b>Senha:</b></label>
      <br>
      <input type="password" name="senha" placeholder="Nova senha"><br><small>*Mínimo 10 caracteres</small>
      <br>
      <br>

      <label><b>Confirmar senha:</b></label>
      <br>
      <input type="password" name="confirmar" placeholder="Repita a senha">
      <br>
      <br>

      <label><b>Endereço:</b></label>
      <br>
      <input type="text" name="endereco" >
      <br>
      <br>

      <label><b>Bairro:</b></label>
      <br>
      <input type="text" name="bairro">
      <br>
      <br>

      <label><b>Cidade:</b></label>
      <br>
      <input type="text" name="cidade">
      <br>
      <br>

      <label><b>Estado:</b></label>
      <br>
      <select name="estado">
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
								<option value="SP" selected>São Paulo</option>
								<option value="SE">Sergipe</option>
								<option value="TO">Tocantins</option>
				</select>
        <br>

      <br>
      <br>

      <label><b>CEP:</b></label>
      <br>
      <input type="text" name="cep">
      <br>
      <br>

      <label><b>CNPJ:</b></label>
      <br>
      <input type="text" name="cnpj">
      <br>
      <br>
      <small class='aindan'>Já está cadastrado?<br> <a href='login.php'>Clique aqui para acessar sua conta!</a></small>
      <br>
      <br><button type='submit' class='cadastrar' name='cadastrar' value='cadastrar'>Cadastrar</button>
      <br>
      <br>
      <br>

    </form>
  </div>
</center>
</body>
</html>
