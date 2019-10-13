<?php
session_start();
if(isset($_SESSION['usuario'])){
  header('Location: painel_usuario.php');
  exit();
}
elseif(isset($_SESSION['instituicao'])){
  header('Location: painel_inst.php');
  exit();
}

?>
<!doctype html>
<html lang="pt-br">
<head>
  <title>Acessar sua conta - FRESHR</title>
  <!-- Required meta tags -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="description" content="Acesse o FRESHR. Uma visão de prosperidade para a sua carreira.">
  <meta name="keywords" content="FRESHR, Eventos, Buscar, Profissão, Login">
  <meta name="robots" content="login, index, follow">
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


  <center>
    <header class='cabecalho'>
      <a href="index.php" class='homea'>
        <label for='logospace' class='logo'>
          <h1 class='logospace'></h1>
        </label>
      </a>
      <hr>
    </header>
    <div class='containerform'>
      <?php

        if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true){

      		include 'connection.php';
      		$conn = conexao();
              session_start();
              $login = $_POST['login'];
              $senha = md5($_POST['senha']);


      		$select = "SELECT cod_usuario,nome_usuario,email_usuario,senha_usuario, sobrenome_usuario from usuario where login_usuario = '$login' and senha_usuario = '$senha'";

      		$res = $conn->prepare($select);//preparando query
              $res->execute();//executando

              $result = $res->fetchAll();//pegando todas as linhas da matriz

              if (count($result) == 1 ){//contando quantas linhas tem, só deve haver 1 usuario com cada combinação de email e senha
                  $session=array();
                  foreach($result as $row){
                    array_push($session,$row['nome_usuario']);//o array do SESSION terá na posição 0, o nome do usuario
                    array_push($session,$row['email_usuario']);//o array do SESSION terá na posição 1, o email do usuario
                    array_push($session,$row['senha_usuario']);//o array do SESSION terá na posição 2, a senha do usuario
      			  			array_push($session,$row['cod_usuario']);//o array do SESSION terá na posição 3, o codigo do usuario
      							array_push($session,$row['sobrenome_usuario']);//o array do SESSION terá na posição , o sobrenome do usuario
                  }
                  header('Location: select_interesse.php');
                  $_SESSION['usuario']=$session;//inserindo o array na variavel global _SESSION
              }
      		else{

                  $select = "SELECT CNPJ,nome_inst,email_inst,senha_inst from faculdade where login_inst = '$login' and senha_inst = '$senha'";
                  $res = $conn->prepare($select);//preparando query
                  $res->execute();//executando
                  $result = $res->fetchAll();

                  if (count($result) == 1 ){
                      $session=array();
                      foreach($result as $row){
                          array_push($session,$row['nome_inst']);//o array do SESSION terá na posição 0, o nome da instituição
                          array_push($session,$row['email_inst']);//o array do SESSION terá na posição 1, o email da instituição
                          array_push($session,$row['senha_inst']);//o array do SESSION terá na posição 2, a senha da instituição
      					array_push($session,$row['CNPJ']);//o array do SESSION terá na posição 3, o CNPJ da instituicao
                      }
                      header('Location: painel_inst.php');
                      $_SESSION['instituicao']=$session;
                  }
                  else{
                    echo "<div class='erro'>Usuário e/ou senha digitados estão incorretos.</div>";
                  }

      		}
      }
      	?>
      <form action="?validar=true" method="post">
        <br>
        <label>Login</label>
        <br>
        <input type="text" name="login" placeholder="Login">
        <br>
        <br>
        <label>Senha</label>
        <br>
        <input type="password" name="senha" placeholder="Palavra-passe"><br>
        <br><br> <h1 class='aindan'>Ainda não é cadastrado? <br><a href='cadastro_usuario.php'>Cadastre-se aqui!</a></h1>
        <br>
        <button class='cadastrar' type="submit" value="Logar"> Entrar </button>

      </form>
    </div>
  </center>
</body>
</html>
