<!doctype html>
<html lang="pt-br">
<head>
  <title>Junte-se ao FRESHR</title>
  <!-- Required meta tags -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="description" content="Junte-se ao FRESHR. Uma visão de prosperidade para a sua carreira.">
  <meta name="keywords" content="FRESHR, Eventos, Buscar, Profissão, Cadastro">
  <meta name="robots" content="cadastro_usuario, index, follow">
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
  <center>
  <script language='JavaScript'>
  function blockNumber(objEvent){
    var keycode;
    keycode = objEvent.keyCode;
    if(keycode >= 97 && keycode <= 122){ //Permitir letras
      return true;
    }
    else if(keycode >= 65 && keycode <= 90){ //Permitir letras maiúsculas
      return true;
    }
    else if(keycode == 39 || keycode == 180 || keycode == 94 || keycode == 126|| keycode == 225 || keycode == 233 || keycode == 237 || keycode == 243 || keycode == 250 || keycode == 226 || keycode == 227 || keycode == 234 || keycode == 212 || keycode == 32 || keycode == 231 || keycode == 199){ //Permitir acentuação gráfica
      return true;
    }
    else{
      return false;
    }
  }
  </script>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <header class='cabecalho'>
      <a href="index.php" class='homea'>
          <label for='logospace' class='logo'>
            <h1 class='logospace'></h1>
          </label>
          </a>
          <hr>
    </header>

  <div class="containerform">

    <?php

    if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true){
      include 'connection.php';
      $conn = conexao();

      $erro = null;
      $coderro = null;
      $valido = false;


      if (strlen(utf8_decode($_POST["nome"])) < 1 || strlen(utf8_decode($_POST["nome"])) > 255) {
        $erro = " digite um nome válido.";
        $coderro = 1;
      }else{
        if(strlen(utf8_decode($_POST["sobrenome"])) < 2 || strlen(utf8_decode($_POST["sobrenome"])) > 255){
          $erro = " digite um sobrenome válido.";
          $coderro = 2;
        }
        else{
          if(strlen(utf8_decode($_POST["email"])) <10 || strlen(utf8_decode($_POST["email"])) > 255) {
            $erro = " digite um email valido.";
            $coderro = 3;
          }
          else{
            if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
              $erro = " digite um email valido.";
              $coderro = 4;
            }
            else{
              if(strlen(utf8_decode($_POST["senha"])) < 8 || strlen(utf8_decode($_POST["senha"])) > 100){
                $erro = " digite uma senha válida (use entre 8 e 100 caracteres).";
                $coderro = 5;
              }
              else{
                if($_POST["senha"] != $_POST["confirmar"]){
                  $erro = "Confirmação de senha inválida. Por favor, digite novamente.";
                  $coderro = 6;
                }
                else{
					if(strlen(utf8_decode($_POST["login_usuario"])) < 3 || strlen(utf8_decode($_POST["login_usuario"])) > 100){
						$erro = "Digite um login válido (minimo 3 caracteres)";
						$coderro = 7;
					}
					else{
						$valido = true;
					}
                }
              }
            }
          }
        }
      }

      if(isset($valido) && $valido == true){

        $email = $_POST['email'];
        //Verificar se o usuário já está cadastro no banco de dados
        $result = $conn->prepare("select * from usuario where email_usuario = '{$email}'"); //Comando de seleção que verifica se há um email igual no banco de dados
        $result->execute(); //Executa o comando

        if($result->fetchColumn() > 0){ //Se retornar mais de 0 resultado, existe um email igual cadastrado
          header('Location: login.php'); //Direciona o usuário para a página de login
        }
        else{ //Se não há um email cadastrado, realiza o cadastro
          $nome1 = $_POST["nome"];
          $nome2 = $_POST["sobrenome"];


          $sql = "INSERT INTO usuario
          (nome_usuario, sobrenome_usuario, email_usuario, senha_usuario,login_usuario)
          VALUES (?, ?, ?, ?, ?)";
          $stmt = $conn->prepare($sql);



          //Atrelando os dados às tabelas
          $stmt->bindValue(1, $nome1);
		  $stmt->bindValue(2, $nome2);
          $stmt->bindValue(3, $_POST["email"]);
          $senhaHash = md5($_POST["senha"]);
          $stmt->bindValue(4, $senhaHash);
		  $stmt->bindValue(5,$_POST["login_usuario"]);
          $stmt->execute();

          if($stmt->errorCode() != "00000"){
            $erro = "Erro código " . $stmt->errorCode() . ": ";
            $erro .= implode(", ", $stmt->errorInfo());
            echo $erro;
          } //Exibir erro de comunicação com o banco de dados
          else{
            header('Location: login.php');
          }
        }
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
            echo "<div class='erro'>".$erro."</div><br>";
          }
        }
      }
    }

    ?>

    <form name='cadastro_uso' method="POST" action="?validar=true">
      <label><b>Nome:</b></label>
      <br>
      <input type="text" name="nome" placeholder='Nome' onkeypress="return blockNumber(event)">
      <br>
      <input type="text" name="sobrenome" placeholder='Sobrenome' onkeypress="return blockNumber(event)">
      <br>
      <br>

      <label><b>Endereço de e-mail:</b></label>
      <br>
      <input type="email" name="email" placeholder='exemplo@exemplo.com'>
      <br>
      <br>

	  <label><b>Login:</b></label>
      <br>
      <input type="text" name="login_usuario" placeholder='Login'>
      <br>
      <br>

      <label><b>Senha:</b></label>
      <br>
      <input type="password" name="senha" placeholder='Nova senha'>
      <br>
      <br>

      <label><b>Confirmar senha:</b></label>
      <br>
      <input type="password" name="confirmar" placeholder='Repita a senha'>
      <br>
      <br>
      <input type="hidden" name="id" value="<?php echo $_REQUEST["id"]; ?>">
      <small class='aindan'>Já está cadastrado? <br><a href='login.php'>Clique aqui para acessar sua conta!</a></small>
      <br>
      <br>
      <button type='submit' class='cadastrar' name='cadastrar' value='cadastrar'>Cadastrar</button>
      <br><br>
    </form>
  </div>

</center>
</body>
</html>
