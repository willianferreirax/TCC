<?php
include 'connection.php';
session_start();
if(!$_SESSION['usuario']){
  header('location:login.php');
  exit();
}
$conn = conexao();
$comparecimento="select cod_evento from comparecimento where cod_usuario = ?";
$res=$conn->prepare($comparecimento);
$res->bindParam(1,$_SESSION['usuario'][3]);
$res->execute();
$result=$res->fetchAll();
$comp=array();
foreach($result as $row){

  $select='select * from evento where cod_evento = ?';
  $res1=$conn->prepare($select);
  $res1->bindParam(1,$row['cod_evento']);
  $res1->execute();
  $eventos=$res1->fetchAll();
  array_push($comp,$eventos);
}

$interessado="select cod_evento from interessado where cod_usuario = ?";
$res=$conn->prepare($interessado);
$res->bindParam(1,$_SESSION['usuario'][3]);
$res->execute();
$result1=$res->fetchAll();
$interes=array();

foreach($result1 as $row){

  $select='select * from evento where cod_evento=?';
  $res1=$conn->prepare($select);
  $res1->bindParam(1,$row['cod_evento']);
  $res1->execute();
  $eventos2=$res1->fetchAll();
  array_push($interes,$eventos2);
}


?>
<!doctype html>
<html lang="pt-br">
<head>
  <title><?php if(isset($_SESSION['usuario'][0]) && $_SESSION['usuario'][0] != ""){echo $_SESSION['usuario'][0]." ".$_SESSION['usuario'][4];} ?> - FRESHR</title>
  <!-- Required meta tags -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="description" content="Junte-se ao FRESHR. Uma visão de prosperidade para a sua carreira.">
  <meta name="keywords" content="FRESHR, Eventos, Buscar, Profissão, Página Inicial">
  <meta name="robots" content="Index, follow">
  <meta name="author" content="Iago Pereira, Lucas Campanelli, Nicholas Campanelli, Renato Melo, Willian Ferreira">
  <link rel="stylesheet" href="css/panel_user.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/337796870f.js"></script>
  <link rel="shortcut icon" href="images/icon.png">
  <meta name="viewport" content="width=device-width">
  <meta name="theme-color" content="#121212">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script type='text/javascript'>
  var i = 0;
  function transform(){
    i++;
    if(i == 2){
      document.getElementById('formsearch').submit();
    }
  }
  </script>
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

    <header class='cabecalhoindex' id='grid'>
      <div class='menudiv'>
        <div class='menubtn'>
          <label for='chec' class='labelchec'><i class="fas fa-bars fa-2x"></i></label>
        </div>
      </div>
      <div class='pesquisarbtn'>
        <form action="listar_eventos.php" id='formsearch' method="post" class='searchform'>
          <input type='checkbox' id='searchcheck'>
          <label for='searchcheck' id='iconmobile' onclick="transform()" class='searchlabel'><i class="fas fa-search"></i></label>
          <div class='search'>

            <input type='text' placeholder='Pesquisar eventos...' class='searchbar'>
            <input type='submit' id='enviar'><label for='enviar' id ='iconenviar' class="fas fa-search fa-1x"></label>
          </form>
        </div>
      </div>
      <div class='userdiv'>
        <label for='dropcheck' class='dropcheck'><div class='userbtn'><i class="fas fa-user-circle fa-2x"></i>
        </div></label>
      </div>
    </header>

    <div class='icons'>
      <a href='index.php'><i class="fas fa-home fa-2x"></i></a><br>
      <a href='listar_eventos.php'><i class="fas fa-map-marked fa-2x"></i></a><br>
      <a href='listar_inst.php'><i class="fas fa-users fa-2x"></i></a><br>
      <a href='sobre.php'><i class="fas fa-info fa-2x"></i></a><br>
      <a href='ajuda.php'><i class="fas fa-question fa-2x"></i></a><br>
      <hr>
    </div>

    <a href='index.php'><h1 class='logoeheader'>FRESHR</h1></a>

    <nav>
      <div class='menulist'>
        <a href='index.php'><div class='b1'><div>Página inicial</div></div></a>
        <a href='listar_eventos.php'><div class='b2'><div>Eventos</div></div></a>
        <a href='listar_inst.php'><div class='b3'><div>Instituição</div></div></a>
        <a href='sobre.php'><div class='b4'><div>Sobre nós</div></div></a>
        <a href='ajuda.php'><div class='b5'><div>Ajuda</div></div></a>
      </div>
      <label for='chec' class='backdiv'></label>
    </nav>
    <div class='dropdown'>
      <?php
      if(isset($_SESSION['usuario']))
      {
        echo "<h1 class='imageuser'>".substr($_SESSION['usuario'][0], 0, strlen($_SESSION['usuario'][0]) - (strlen($_SESSION['usuario'][0])-1))."".substr($_SESSION['usuario'][4], 0, (strlen($_SESSION['usuario'][4]) - (strlen($_SESSION['usuario'][4])-1)))."</h1>";
      }
      if(isset($_SESSION['instituicao']))
      {
        echo "<h1 class='imageuser'>".substr($_SESSION['instituicao'][0], 0, strlen($_SESSION['instituicao'][0]) - (strlen($_SESSION['instituicao'][0])-4))."</h1>";
      }
      ?>
      <br>
      <?php
      if(isset($_SESSION['instituicao'][0])){
        echo "<a href='painel_inst.php' class='account'>Minha Conta</a>";
      }
      else{
        echo "<a href='painel_usuario.php' class='account'>Minha Conta</a>";
      }
      ?>
      <br>
      <a href='config.php' class='account'>Configurações</a>
      <br>
      <a href='ajuda.php' class='account'>Ajuda</a>
      <br>
      <br>
      <a href='logout_script.php' class='exit'>Sair</a>
    </div>

    <div class='statsdiv'>
      <i class="fas fa-user-circle fa-2x"></i><br>
      <?php
      echo"<div class='username'>Olá, ".$_SESSION['usuario'][0]."</div>";
      echo"<div class='useremail'>".$_SESSION['usuario'][1]."</div>";
      echo "<br>";
      echo "<div class='title'> Meus eventos favoritos </div>";

      if(isset($eventos2)){
        foreach($interes as $row){
          foreach($row as $row1){
            $imagem ='upload/'.$row1['banner_evento'];
            echo "
            <div>
            <a href='exibir_evento.php?id= $row1[cod_evento]'>
            <div class='searchinfo'>
            <img class='imagemres' src='$imagem'>
            <div class=nomeres>
            <h1 class='nomeres'>$row1[nome_evento]</h1>
            <div class=descres>
            <h2 class='descres'>$row1[descricao_evento]</h2>
            <div class='enderes'>
            <h2 class='enderes'>$row1[endereco_evento] | $row1[cidade_evento], $row1[estado_evento]</div></div></div>
            <div>
            <h2 class='precores'>";
            if(isset($row1['preco_evento'])){
              echo "R$ $row1[preco_evento]";
            }
            else if($row1['preco_evento'] == "" || $row1['preco_evento'] == "0" || $row1['preco_evento'] == null){
              echo "Grátis";
            }
            echo"
            </h2>
            </div>
            </div>
            </a>
            </div>";
          }
        }
      }


      ?>

      <?php
      echo "<div class='title'> Eventos que comparecerei </div>";

      if(isset($eventos)){
        foreach($comp as $row){
          foreach($row as $row1){
            $imagem ='upload/'.$row1['banner_evento'];
            echo "
            <div>
            <a href='exibir_evento.php?id= $row1[cod_evento]'>
            <div class='searchinfo'>
            <img class='imagemres' src='$imagem'>
            <div class=nomeres>
            <h1 class='nomeres'>$row1[nome_evento]</h1>
            <div class=descres>
            <h2 class='descres'>$row1[descricao_evento]</h2>
            <div class='enderes'>
            <h2 class='enderes'>$row1[endereco_evento] | $row1[cidade_evento], $row1[estado_evento]</div></div></div>
            <div>
            <h2 class='precores'>";
            if(isset($row1['preco_evento'])){
              echo "R$ $row1[preco_evento]";
            }
            else if($row1['preco_evento'] == "" || $row1['preco_evento'] == "0" || $row1['preco_evento'] == null){
              echo "Grátis";
            }
            echo"
            </h2>
            </div>
            </div>
            </a>
            </div>";
          }
        }
      }
      ?>
      <br>
      <br>
    </div>

  </center>
</body>
</html>
