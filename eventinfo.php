<!doctype html>
<html lang="pt-br">
<head>
	<title>Criando um evento - FRESHR</title>
	<!-- Required meta tags -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="description" content="Junte-se ao FRESHR. Uma visão de prosperidade para a sua carreira.">
	<meta name="keywords" content="FRESHR, Eventos, Buscar, Profissão, Criar evento">
	<meta name="robots" content="Criar evento, follow">
	<meta name="author" content="Iago Pereira, Lucas Campanelli, Renato Melo, Willian Ferreira">
	<link rel="stylesheet" href="css/eventoinfo.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/337796870f.js"></script>
	<link rel="icon" href="images/icon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#162573">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="bgindex">
	<center>
		<input type='checkbox' id='dropcheck'>
		<input type='checkbox' id='chec'>
		<label for='chec' class='backdiv'></label>
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
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<?php
			session_start();
			if(isset($_SESSION['instituicao']))
			{
				echo "<h1 class='nome'>".$_SESSION['instituicao'][0]."</h1>";
			}
			?>
			<br>
			<br>
			<?php
				if(isset($_SESSION['instituicao'][0])){
					echo "<a href='painel_inst.php'><i class='fas fa-users-cog'></i> Minha Conta</a>";
				}
				else{
					echo "<a href='painel_usuario.php'><i class='fas fa-user-cog'></i> Minha Conta</a>";
				}
			?>
			<br>
			<i class="fas fa-cog"></i> Configurações
			<br>
			<i class="fas fa-question"></i> Ajuda
			<br>
			<a href='logout_script.php'><i class="fas fa-sign-out-alt"></i> Sair</a>
		</div>
		<header class='cabecalhoindex' id='grid'>
			<div class='menudiv'>
				<div class='menubtn'>
					<label for='chec' class='labelchec'><i class="fas fa-bars fa-2x"></i></i></label>
				</div>
					<a href='index.php'><h1 class='logoeheader'>FRESHR</h1></a>
			</div>
			<div class='pesquisarbtn'>

			</div>
			<div class='userdiv'>
				<?php
					if(isset($_SESSION['instituicao'])){
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

		<div class='elem1'>
      <div class='cabcont'>
        <div class='plusicon'><i class="fas fa-plus-circle"></i></div>
        <div class='createtitle'><b>Criar evento</b></div>
      </div>
      <br>
		    <div class='formeve'>
          <form name='criareventoform' method="POST" action="?validar=true">

						<label class='labelint'>Dê um <b>nome</b> ao seu evento:</label><br>
						<input class='inputcreate' id='createnome' type='text' name='nome' placeholder='Feira Tecnológica 2019'>

						<div class="form-group" id='imageup'>
							<center><label for="exampleFormControlFile1" class='labelint'>Envie um <b>banner</b> para o seu evento</label></center>
    					<label for="exampleFormControlFile1" class='imagevis'>Banner do Evento</label>
    					<input type="file" class="form-control-file" id="exampleFormControlFile1">
  					</div>

            <label class='labelint'>Informe o <b>logradouro</b> do evento:</label>
            <input class='inputcreate' type='text' name='endereco' placeholder='Rua Dr. Almeida Lima, 1233'>
            <label class='labelint'>Qual <b>bairro</b> o evento ocorrerá?</label>
            <input class='inputcreate' type='text' name='bairro' placeholder='Mooca'>
            <label class='labelint'>Qual <b>cidade</b> o evento ocorrerá?</label>
            <input class='inputcreate' type='text' name='cidade' placeholder='São Paulo'>
            <label class='labelint'>Qual <b>estado</b> o evento ocorrerá?</label>
            <input class='inputcreate' type='text' name='estado' placeholder='São Paulo'>
            <label class='labelint'>Agora, digite o <b>CEP</b>:</label>
            <input class='inputcreate' type='text' name='cep' placeholder='03103-010'>
            <label class='labelint'>Quando o evento irá <b>começar</b>?</label>
            <input class='inputcreate' type='date' name='dateinic' placeholder='03103-010'>
            <label class='labelint'>Quando o evento irá <b>acabar</b>?</label>
            <input class='inputcreate' type='date' name='datefinal' placeholder='03103-010'>
            <label class='labelint'>Informe o horário que o evento <b>inciará</b>:</label>
            <input class='inputcreate' type='time' name='timeinic'>
            <label class='labelint'>Informe o horário que o evento <b>encerrará</b>:</label>
            <input class='inputcreate' type='time' name='timefinal'>
            <label class='labelint'>Qual o <b>preço</b> do evento?</label>
            <input class='inputcreate' type='number' name='preco' placeholder="12,00">
            <label class='labelint'>Por fim, conta pra gente sobre o seu evento:</label>
            <textarea draggable="false" placeholder="O evento mais esperado do ano!" name='desc' maxlength="149"></textarea>
						<br>
						<br>
						<hr>
						<br>
						<label class='labelintere'>Selecione quais são as <b>áreas de interesses</b> do seu evento.</label>
			      <center><div class='interesses'>
							<input type="checkbox" id='bti1' name='chkinteresse1'>
			        <label for='bti1' class='interesse1'>
			          Informação e Tecnologia
			        </label>
							<input type="checkbox" id='bti2' name='chkinteresse2'>
			        <label for='bti2' class='interesse2'>
			          Logística
			        </label>
							<input type="checkbox" id='bti3' name='chkinteresse3'>
			        <label for='bti3' class='interesse3'>
			          Saúde
			        </label>
							<input type="checkbox" id='bti4' name='chkinteresse4'>
			        <label for='bti4' class='interesse4'>
			          Engenharia
			        </label>
							<input type="checkbox" id='bti5' name='chkinteresse5'>
			        <label for='bti5' class='interesse5'>
			          Administração e Negócios
			        </label>
							<input type="checkbox" id='bti6' name='chkinteresse6'>
			        <label for='bti6' class='interesse6'>
			          Comunicação
			        </label>
							<input type="checkbox" id='bti7' name='chkinteresse7'>
			        <label for='bti7' class='interesse7'>
			          Arte e Design
			        </label>
							<input type="checkbox" id='bti8' name='chkinteresse8'>
			        <label for='bti8' class='interesse8'>
			          Direito
			        </label>
							<input type="checkbox" id='bti9' name='chkinteresse9'>
			        <label for='bti9' class='interesse9'>
			          Educação
			        </label>
							<input type="checkbox" id='bti10' name='chkinteresse10'>
			        <label for='bti10' class='interesse10'>
			          Turismo
			        </label>
							<input type="checkbox" id='bti11' name='chkinteresse11'>
			        <label for='bti11' class='interesse11'>
			          Gastronomia
			        </label>
							<input type="checkbox" id='bti12' name='chkinteresse12'>
			        <label for='bti12' class='interesse12'>
			          Ciências Exatas e Biológicas
			        </label>
							<input type="checkbox" id='bti13' name='chkinteresse13'>
			        <label for='bti13' class='interesse13'>
			          Ciências Sociais e Humanas
			        </label>
							<input type="checkbox" id='bti14' name='chkinteresse14'>
			        <label for='bti14' class='interesse14'>
			          Música
			        </label>
							<input type="checkbox" id='bti15' name='chkinteresse15'>
			        <label for='bti15' class='interesse15'>
			          <input type='text' class='outro' name='int15' placeholder="Outro">
			        </label>
			      </div></center>
			      <div class='btnext'><a href='eventinfo.php'><button class='prox'>Continuar</button></a></div>
          </form>
        </div>
		</div>
	</center>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
