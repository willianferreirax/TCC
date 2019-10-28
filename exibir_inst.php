<?php
if(isset($_GET['id'])){
  session_start();
  include "connection.php";
  $conn = conexao();
  $id = $_GET['id'];

  $select= "select nome_inst,endereco_inst,bairro_inst,cidade_inst,estado_inst,cep_inst,email_inst,telefone_inst from faculdade where CNPJ = $id";
  $res = $conn->prepare($select);
  $res->execute();
  $result=$res->fetchAll();

  $faculdade = array();
  foreach ($result as $row) {
    array_push($faculdade,$row['nome_inst']);
    array_push($faculdade,$row['endereco_inst']);
    array_push($faculdade,$row['bairro_inst']);
    array_push($faculdade,$row['cidade_inst']);
    array_push($faculdade,$row['estado_inst']);
    array_push($faculdade,$row['cep_inst']);
    array_push($faculdade,$row['email_inst']);
    array_push($faculdade,$row['telefone_inst']);
  }
}
else{
  header('Location:index.php');
}


?>

<!doctype html>
<html lang="pt-br">
<head>
  <title><?php echo $faculdade[0]?> - FRESHR</title>
  <!-- Required meta tags -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="description" content="Junte-se ao FRESHR. Uma visão de prosperidade para a sua carreira.">
  <meta name="keywords" content="FRESHR, Eventos, Buscar, Profissão, Página Inicial">
  <meta name="robots" content="Index, follow">
  <meta name="author" content="Iago Pereira, Lucas Campanelli, Nicholas Campanelli, Renato Melo, Willian Ferreira">
  <link rel="stylesheet" href="css/panel_inst.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/exibir_inst.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/337796870f.js"></script>
  <link rel="shortcut icon" href="images/icon.png">
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
    <input type='checkbox' id='dropcheck'>
    <input type='checkbox' id='chec'>
    <div class='icons'>
      <a href='index.php'><i class="fas fa-home fa-2x"></i></a><br>
      <a href='listar_eventos.php'><i class="fas fa-map-marked fa-2x"></i></a><br>
      <a href='listar_inst.php'><i class="fas fa-users fa-2x"></i></a><br>
      <a href='sobre.php'><i class="fas fa-info fa-2x"></i></a><br>
      <i class="fas fa-question fa-2x"></i><br>
      <hr>
    </div>
    <a href='index.php'><h1 class='logoeheader'>FRESHR</h1></a>
    <nav>
      <div class='menulist'>
        <a href='index.php'><div class='b1'>Página inicial</div></a>
        <a href='listar_eventos.php'><div class='b2'>Eventos</div></a>
        <a href='listar_inst.php'><div class='b3'>Instituição</div></a>
        <a href='sobre.php'><div class='b4'>Sobre nós</div></a>
        <a href='index.php'><div class='b5'>Ajuda</div></a>
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
          </div>
        </form>
      </div>
      <div class='userdiv'>
				<?php
				if(isset($_SESSION['instituicao'])){
					echo "<div class='creatediv'><a href='eventinfo.php'><button class='cadastrarevent'>Criar evento</button></a>
					</div></label>";
					echo "<div class='criaricon'><a href='eventinfo.php'><i class='fas fa-plus-circle'></i></a>
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

    <div class='statsdiv'>
      <?php
      echo "<h1 class='imageuser'>".substr($faculdade[0], 0, strlen($faculdade[0]) - (strlen($faculdade[0])-4))."</h1>";
      ?>
      <?php
      echo"<div class='username'>".$faculdade[0]."</div>";
      echo"<div class='useremail'>".$faculdade[6]."</div><br>";
      echo"<div class='useremail'>Telefone: ".$faculdade[7]."</div>";
      echo"<div class='useremail'>Endereço: ".$faculdade[1].", ".$faculdade[2].", ".$faculdade[3]." - ".$faculdade[4]."</div>";
      echo"<div class='useremail'>CEP: ".$faculdade[5]."</div>";

      echo "<div class='title'>Eventos atuais</div>";
      echo "<div class='title'>Eventos passados</div>";
      ?>
    </div>

  </center>

</body>
</html>
