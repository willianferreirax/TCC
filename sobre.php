<!doctype html>
<html lang="pt-br">
<head>
  <title>FRESHR</title>
  <!-- Required meta tags -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="description" content="Junte-se ao FRESHR. Uma visão de prosperidade para a sua carreira.">
  <meta name="keywords" content="FRESHR, Eventos, Buscar, Profissão, Sobre">
  <meta name="robots" content="Sobre, follow">
  <meta name="author" content="Iago Pereira, Lucas Campanelli, Renato Melo, Willian Ferreira">
  <link rel="stylesheet" href="css/sobre.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/337796870f.js"></script>
  <link rel="icon" href="images/icon.png">
  <meta name="viewport" content="width=device-width">
  <meta name="theme-color" content="#121212">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="bgindex">
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
    <nav>
      <div class='menulist'>
        <a href='index.php'><div class='b1'>Página inicial</div></a>
        <a href='index.php'><div class='b2'>Eventos</div></a>
        <a href='index.php'><div class='b3'>Instituição</div></a>
        <a href='sobre.php'><div class='b4'>Sobre nós</div></a>
        <a href='index.php'><div class='b5'>Ajuda</div></a>
      </div>
    </nav>
    <div class='dropdown'>
			<?php
			session_start();
			if(isset($_SESSION['usuario']))
			{
				echo "<h1 class='imageuser'>".substr($_SESSION['usuario'][0], 0, strlen($_SESSION['usuario'][0]) - (strlen($_SESSION['usuario'][0])-1))."".substr($_SESSION['usuario'][4], 0, strlen($_SESSION['usuario'][4]) - (strlen($_SESSION['usuario'][4])-1))."</h1>";
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
			<a href='painel_usuario.php' class='account'>Configurações</a>
			<br>
			<a href='painel_usuario.php' class='account'>Ajuda</a>
			<br>
			<br>
			<a href='logout_script.php' class='exit'>Sair</a>
		</div>
    <header class='cabecalhoindex' id='grid'>
      <div class='menudiv'>
        <div class='menubtn'>
          <label for='chec' class='labelchec'><i class="fas fa-bars fa-2x"></i></i></label>
        </div>
					<a href='index.php'><h1 class='logoeheader'>FRESHR</h1></a>
      </div>
      <div class='pesquisarbtn'>
        <div class='search'>
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
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <div class='content' id='gridcont'>
    <div class='sobre'>
      <h1 class='descricao'>
        FRESHR é a tecnologia a favor do conhecimento profissional. Busque eventos, palestras e feiras que promovam informações.
      </h1>
      <div class='desc1'>
      </div>
    </div>
    <div class='sobrefoto'>
      <h1 class='descricao'>
        Tenha maior alcance para seus eventos profissionais.
      </h1>
    </div>
    <div class='anycontent'>
      <h1 class='creators'>
        Conheça os criadores do projeto
        <div class='images'>
          <h1 class='iago'>EM BREVE</h1>
          <h1 class='iagon'>Iago Pereira</h1>
          <h1 class='campa'>EM BREVE</h1>
          <h1 class='campan'>Lucas Campanelli</h1>
          <h1 class='renato'>EM BREVE</h1>
          <h1 class='renaton'>Renato Melo</h1>
          <h1 class='will'>EM BREVE</h1>
          <h1 class='willn'>Willian Ferreira</h1>
        </div>
        <!-- <div class='nomes'> -->
          <!-- <h1 class='iagon'>Iago Pereira</h1> -->
          <!-- <h1 class='campan'>Lucas Campanelli</h1> -->
          <!-- <h1 class='willn'>Willian Ferreira</h1> -->
          <!-- <h1 class='renaton'>Renato Melo</h1> -->
        <!-- </div> -->
      </h1>
    </div>
  </div>
</center>
</body>
</html>
