<?php
include 'connection.php';
session_start();
if(!$_SESSION['usuario']){
  header('location:login.php');
  exit();
}
//

?>
<!doctype html>
<html lang="pt-br">
<head>
  <title>Sua conta - FRESHR</title>
  <!-- Required meta tags -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="description" content="Junte-se ao FRESHR. Uma visão de prosperidade para a sua carreira.">
  <meta name="keywords" content="FRESHR, Eventos, Buscar, Profissão, Página Inicial">
  <meta name="robots" content="Index, follow">
  <meta name="author" content="Iago Pereira, Lucas Campanelli, Renato Melo, Willian Ferreira">
  <link rel="stylesheet" href="css/panel_user.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/337796870f.js"></script>
  <link rel="shortcut icon" href="images/icon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#121212">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="background">

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <center>
    <input type='checkbox' id='dropcheck'>
    <input type='checkbox' id='chec'>
    <div class='icons'>
      <a href='index.php'><i class="fas fa-home fa-2x"></i></a><br>
      <i class="fas fa-map-marked fa-2x"></i><br>
      <i class="fas fa-users fa-2x"></i><br>
      <a href='sobre.php'><i class="fas fa-info fa-2x"></i></a><br>
      <i class="fas fa-question fa-2x"></i><br>
      <hr>
    </div>
    <div class='statsdiv'>
      <i class="fas fa-user-circle fa-2x"></i><br>
      <?php
      echo"<div class='username'>Olá, ".$_SESSION['usuario'][0]."</div>";
      echo"<div class='useremail'>".$_SESSION['usuario'][1]."</div>";
      ?>
      <br>
      <br>
      <a href="javascript: if(confirm('Deseja realmente excluir sua conta? Essa ação é irreversivel!')) location.href='deletar_cadastro.php';" style="color:red;"><div class='excluircad'><i class="far fa-trash-alt"></i>Excluir cadastro<a></div>
      </div>

      <a href='index.php'><h1 class='logoeheader'>FRESHR</h1></a>

      <nav>
        <div class='menulist'>
          <a href='index.php'><div class='b1'><div>Página inicial</div></div></a>
          <a href='index.php'><div class='b2'><div>Eventos</div></div></a>
          <a href='index.php'><div class='b3'><div>Instituição</div></div></a>
          <a href='sobre.php'><div class='b4'><div>Sobre nós</div></div></a>
          <a href='index.php'><div class='b5'><div>Ajuda</div></div></a>
        </div>
        <label for='chec' class='backdiv'></label>
      </nav>
      <div class='dropdown'>
        <?php
        echo $_SESSION['usuario'][0];
        ?>
        <br>
        <br>
        <a href='painel_usuario.php'>Minha Conta</a>
        <br>
        Configurações
        <br>
        Ajuda
        <br>
        <br>
        <a class='exit' href='logout_script.php'>Sair</a>
      </div>
      <header class='cabecalhoindex' id='grid'>
        <div class='menudiv'>
          <div class='menubtn'>
            <label for='chec' class='labelchec'><i class="fas fa-bars fa-2x"></i></label>
          </div>
        </div>
        <div class='pesquisarbtn'>
  				<input type='checkbox' id='searchcheck'>
  				<label for='searchcheck' class='searchlabel'><i class="fas fa-search"></i></label>
  				<div class='search'>
  					<input type='text' placeholder='Pesquisar eventos...' class='searchbar'>
  					<i class="fas fa-search fa-1x"></i>
  				</div>
  			</div>
        <div class='userdiv'>
          <label for='dropcheck' class='dropcheck'><div class='userbtn'><i class="fas fa-user-circle fa-2x"></i>
          </div></label>
        </div>
      </header>
    </center>
  </body>
  </html>
