<!doctype html>
<html lang="pt-br">
<head>
  <title>
    <?php
    session_start();
    if(isset($_POST['pesquisa']) && $_POST['pesquisa'] != ''){
      $pesquisa = $_POST['pesquisa'];
      echo $pesquisa;
    }
    else{
      echo 'Instituições';
    } ?>
    - FRESHR</title>
    <!-- Required meta tags -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="description" content="Junte-se ao FRESHR. Uma visão de prosperidade para a sua carreira.">
    <meta name="keywords" content="FRESHR, Eventos, Buscar, Profissão, Instituições">
    <meta name="robots" content="Index, follow">
    <meta name="author" content="Iago Pereira, Lucas Campanelli, Nicholas Campanelli, Renato Melo, Willian Ferreira">
    <link rel="stylesheet" href="css/instituicoes.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/337796870f.js"></script>
    <link rel="icon" href="images/icon.png">
    <meta name="viewport" content="width=device-width">
    <meta name="theme-color" content="#11226E">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
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
  <body class="bgindex">
    <center>
      <header class='cabecalhoindex' id='grid'>
        <div class='menudiv'>
          <div class='menubtn'>
            <label for='chec' class='labelchec'><i class="fas fa-bars fa-2x"></i></i></label>
          </div>
          <a href='index.php'><h1 class='logoeheader'>FRESHR</h1></a>
        </div>
        <div class='pesquisarbtn'>
          <form action="listar_eventos.php" id='formsearch' method="post" class='searchform'>
            <input type='checkbox' id='searchcheck'>
            <label for='searchcheck' id='iconmobile' onclick="transform()" class='searchlabel'><i class="fas fa-search"></i></label>
            <div class='search'>
              <input type='text' name='pesquisa' placeholder='Pesquisar eventos...' class='searchbar'>
              <input type='submit' id='enviar'><label for='enviar' id ='iconenviar' class="fas fa-search fa-1x"></label>
            </form>
          </div>
        </div>
        <div class='userdiv'>
          <?php
          if(isset($_SESSION['instituicao'])){
            echo "<div class='creatediv'><a href='eventinfo.php'><button class='cadastrarevent'>Criar evento</button></a>
            </div></label>";
            echo "<div class='criaricon'><a href='eventinfo.php'><i class='fas fa-plus'></i></a>
            </div></label>";
          }
          ?>
          <?php
          if(isset($_SESSION['usuario'])){
            echo "<label for='dropcheck' class='dropcheck'><div class='userbtn'><i class='fas fa-user-circle fa-2x'></i>
            </div></label>";
          }
          else if(isset($_SESSION['instituicao'])){
            echo "<label for='dropcheck' class='dropcheck'><div class='userbtn'><i class='fas fa-user-circle fa-2x'></i>
            </div></label>";
          }
          else{
            echo "<div class='userbtn'><a href='login.php'><i class='fas fa-user-circle fa-2x'></i></a>
            </div>";
          }
          ?>
        </div>
      </div>
    </header>
    <body class="bgindex">
      <input type='checkbox' id='dropcheck'>
      <input type='checkbox' id='chec'>
      <div class='icons'>
        <a href='index.php'><i class="fas fa-home fa-2x"></i></a><br>
        <a href='listar_eventos.php'><i class="fas fa-map-marked fa-2x"></i></a><br>
        <a href='listar_inst.php'><i class="fas fa-users fa-2x"></i></a><br>
        <a href='sobre.php'><i class="fas fa-info fa-2x"></i></a><br>
        <a href='ajuda.php'><i class="fas fa-question fa-2x"></i></a><br>
        <hr>
      </div>
      <nav>
        <div class='menulist'>
          <a href='index.php'><div class='b1'>Página inicial</div></a>
          <a href='listar_eventos.php'><div class='b2'>Eventos</div></a>
          <a href='listar_inst.php'><div class='b3'>Instituição</div></a>
          <a href='sobre.php'><div class='b4'>Sobre nós</div></a>
          <a href='ajuda.php'><div class='b5'>Ajuda</div></a>
        </div>
        <label for='chec' class='backdiv'></label>
      </nav>
      <div class='dropdown'>
        <?php

        if(isset($_SESSION['usuario']))
        {
          echo "<h1 class='imageuser'>".substr($_SESSION['usuario'][0], 0, strlen($_SESSION['usuario'][0]) - (strlen($_SESSION['usuario'][0])-1))."".substr($_SESSION['usuario'][4], 0, strlen($_SESSION['usuario'][4]) - (strlen
          ($_SESSION['usuario'][4])-1))."</h1>";
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
        <a href='logout_script.php'><div class='exit'>Sair</div></a>
      </div>
      <div class='elem1'>
        <?php
        include 'connection.php';
        $conn = conexao();


        $select ="select CNPJ,nome_inst, endereco_inst, cidade_inst, estado_inst, telefone_inst from faculdade order by nome_inst ASC";
        $res=$conn->prepare($select);
        $res->execute();

        $result = $res->fetchAll();
        foreach ($result as $row) {
          echo "
          <a href='exibir_inst.php?id= $row[CNPJ]'>
          <div class='searchinst'>
          <div class='nomeinst'>$row[nome_inst]<br><h2 class='enderecoinst'>$row[endereco_inst] | $row[cidade_inst], $row[estado_inst]</h2>
          <h2 class='telefoneinst'>$row[telefone_inst]</h2></div>
          </div>
          </a>
          ";

        }
        ?>
      </div>
    </center>
  </body>
  </html>
