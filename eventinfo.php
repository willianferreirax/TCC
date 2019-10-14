<?php
session_start();
if(!isset($_SESSION['instituicao'])){
    header('location:index.php');
    exit();
}
?>
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
	<meta name="viewport" content="width=device-width">
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
				<a href='listar_eventos.php'><div class='b2'>Eventos</div></a>
				<a href='listar_inst.php'><div class='b3'>Instituição</div></a>
				<a href='sobre.php'><div class='b4'>Sobre nós</div></a>
				<a href='index.php'><div class='b5'>Ajuda</div></a>
			</div>
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

		</header>
		</center>
		<div class='elem1'>
			<div class="icontainer">
				<form name='criareventoform' method="POST" action="?validar=true" enctype="multipart/form-data">
					<div class="form-group" id='imageup'>
						<label for="exampleFormControlFile1" style="width: 100%; height: 100%; border: none;">
							<img class="imagevis" id="imagevis" border="0">
						<input type="file" class="form-control-file" id="exampleFormControlFile1" name='arquivo' onchange="loadFile(event)">
						<script>
							var loadFile = function(event) {
								var imagevis = document.getElementById('imagevis');
								imagevis.src = URL.createObjectURL(event.target.files[0]);
							};
						</script>
					</div>
						</label>
					<div class="nomeev">
						<label class='labelint'>Dê um <b>nome</b> ao seu evento:</label><br>
						<input class='inputcreate' id='createnome' type='text' name='nome' placeholder='Feira Tecnológica 2019'><center><hr></center><br>
					</div>

					<div class="info1">
						<div class="infos">

							<label class='labelint'>Nos conte um pouco sobre o seu evento:</label>
							<textarea draggable="false" placeholder="Venha e participe do evento mais esperado do ano!" name='desc' maxlength="149"></textarea>

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

						</div>
						<div class="endereco">
							<label class='labelint'>Informe o <b>logradouro</b> do evento:</label>
							<input class='inputcreate' type='text' name='endereco' placeholder='Rua Dr. Almeida Lima, 1233'>

							<label class='labelint'>Qual <b>bairro</b> o evento ocorrerá?</label>
							<input class='inputcreate' type='text' name='bairro' placeholder='Mooca'>

							<label class='labelint'>Qual <b>cidade</b> o evento ocorrerá?</label>
							<input class='inputcreate' type='text' name='cidade' placeholder='São Paulo'>

							<label class='labelint'>Qual <b>estado</b> o evento ocorrerá?</label><br>
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
							</select><br>

							<label class='labelint'>Agora, digite o <b>CEP</b>:</label>
							<input class='inputcreate' type='text' name='cep' placeholder='03103-010'>
						</div>
					</div>
					<center>
					<br>
					<br>
					<hr>
					<br><label class='labelintere'>Selecione quais são as <b>áreas de interesses</b> do seu evento.</label>
					<div class='interesses'>
						<input type="checkbox" id='bti1' class='chkint' value=1  name='intchk[]'>
						<label for='bti1' class='interesse1' id='int1'>

							Informação e Tecnologia
						</label>
						<input type="checkbox" id='bti2' class='chkint' value=2  name='intchk[]'>
						<label for='bti2' class='interesse2' id='int2'>
							Logística
						</label>
						<input type="checkbox" id='bti3' class='chkint' value=3  name='intchk[]'>
						<label for='bti3' class='interesse3' id='int3'>
							Saúde
						</label>
						<input type="checkbox" id='bti4' class='chkint' value=4  name='intchk[]'>
						<label for='bti4' class='interesse4' id='int4'>
							Engenharia
						</label>
						<input type="checkbox" id='bti5' class='chkint' value=5  name='intchk[]'>
						<label for='bti5' class='interesse5' id='int5'>
							Administração e Negócios
						</label>
						<input type="checkbox" id='bti6' class='chkint' value=6  name='intchk[]'>
						<label for='bti6' class='interesse6' id='int6'>
							Comunicação
						</label>
						<input type="checkbox" id='bti7' class='chkint' value=7 onclick='intlimit(6)' name='intchk[]'>
						<label for='bti7' class='interesse7' id='int7'>
							Arte e Design
						</label>
						<input type="checkbox" id='bti8' class='chkint' value=8 onclick='intlimit(7)' name='intchk[]'>
						<label for='bti8' class='interesse8' id='int8'>
							Direito
						</label>
						<input type="checkbox" id='bti9' class='chkint' value=9 onclick='intlimit(8)' name='intchk[]'>
						<label for='bti9' class='interesse9' id='int9'>
							Educação
						</label>
						<input type="checkbox" id='bti10' class='chkint' value=10 onclick='intlimit(9)' name='intchk[]'>
						<label for='bti10' class='interesse10' id='int10'>
							Turismo
						</label>
						<input type="checkbox" id='bti11' class='chkint' value=11 onclick='intlimit(10)' name='intchk[]'>
						<label for='bti11' class='interesse11' id='int11'>
							Gastronomia
						</label>
						<input type="checkbox" id='bti12' class='chkint' value=12 onclick='intlimit(11)' name='intchk[]'>
						<label for='bti12' class='interesse12' id='int12'>
							Ciências Exatas e Biológicas
						</label>
						<input type="checkbox" id='bti13' class='chkint' value=13 onclick='intlimit(12)' name='intchk[]'>
						<label for='bti13' class='interesse13' id='int13'>
							Ciências Sociais e Humanas
						</label>
						<input type="checkbox" id='bti14' class='chkint' value=14 onclick='intlimit(13)' name='intchk[]'>
						<label for='bti14' class='interesse14' id='int14'>
							Música
						</label>
						<input type="checkbox" id='bti15' class='chkint' value=15 onclick='intlimit(14)' name='intchk[]'>
						<label for='bti15' class='interesse15' id='int15'>
							<input type='text' class='outro' name='int15' placeholder="Outro">
						</label>
					</div>
					<div class='btnext'><a href='eventinfo.php'><button class='prox'>Criar</button></a></div>
					</center>
				</form>
			</div>
		</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
<?php
include 'connection.php';
$conn = conexao();
if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true){

	$erro = null;
	$coderro = null;
	$valido = false;

	if(strlen(utf8_decode($_POST["nome"])) < 1 || strlen(utf8_decode($_POST["nome"])) > 255) {
		$erro = " digite um nome válido.";
		$coderro = 1;
	}
	elseif(!isset($_FILES['arquivo'])){
		$erro = "escolha um banner";
		$coderro = 2;
	}


	elseif(strlen(utf8_decode($_POST["dateinic"])) <10 || strlen(utf8_decode($_POST["dateinic"])) > 10) {
		$erro = " selecione uma data de inicio do evento.";
		$coderro = 3;
	}

	elseif(strlen(utf8_decode($_POST["datefinal"])) < 10 || strlen(utf8_decode($_POST["datefinal"])) > 10){
		$erro = "selecione uma data de termino do eventto.";
		$coderro = 4;
	}

	elseif(strtotime($_POST['dateinic']) > strtotime($_POST['datefinal'])){
		$erro = "A data de inicio é posterior à data de termino. Selecione de maneira correta";
		$coderro = 5;
	}


	elseif(strlen(utf8_decode($_POST["timeinic"])) <5 || strlen(utf8_decode($_POST["timeinic"])) > 5) {
		$erro = " digite uma hora para o inicio do evento.";
		$coderro = 6;
	}
	elseif(strlen(utf8_decode($_POST["timefinal"])) < 5 || strlen(utf8_decode($_POST["timefinal"])) > 5){
		$erro = " digite uma hora para o final do evento";
		$coderro = 7;
	}

	elseif(strtotime($_POST['timeinic']) > strtotime($_POST['timefinal']) && strtotime($_POST['datefinal'])<=strtotime($_POST['dateinic'])){
		$erro = "A hora de inicio é posterior à hora de termino. Selecione de maneira correta";
		$coderro = 8;
	}


	elseif(strlen(utf8_decode($_POST["endereco"])) < 5 || strlen(utf8_decode($_POST["endereco"])) > 100){
		$erro = " digite um endereço valido(Minimo 5 caracateres)";
		$coderro = 9;
	}
	elseif(strlen(utf8_decode($_POST["bairro"])) < 3 || strlen(utf8_decode($_POST["bairro"])) > 100){
		$erro = "Digite um bairro válido (Minimo 3 caracteres)";
		$coderro = 10;
	}
	elseif(strlen(utf8_decode($_POST["cidade"])) < 1 || strlen(utf8_decode($_POST["cidade"])) > 100){
		$erro = "Digite uma cidade válida (Minimo 1 caractere) ";
		$coderro = 11;
	}
	elseif(strlen(utf8_decode($_POST["estado"])) < 1 || strlen(utf8_decode($_POST["estado"])) > 2){
		$erro = "Selecione o estado onde acontecerá o evento";
		$coderro = 12;
	}
	elseif(strlen(utf8_decode($_POST["cep"])) != 9) {
		$erro = "Digite um cep válido";
		$coderro = 13;
	}
	elseif(strlen(utf8_decode($_POST["desc"])) < 1 || strlen(utf8_decode($_POST["desc"])) > 200){
		$erro = "Digite uma descrição válida (Minimo de 1 caractere)";
		$coderro = 14;
	}
	elseif(strtotime($_POST['dateinic'])<strtotime(date('Y-m-d'))){
		$erro="A data de inicio já passou";
		$coderro = 15;
	}

	else{


		$ext = strtolower(substr($_FILES['arquivo']['name'], -4));
		$novo_nome = md5(time()).$ext;
		$dir = "upload/";
		move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$novo_nome);

		$valido = true;
	}


}

if(isset($valido) && $valido == true){

	//Verificar se o Evento já está cadastro no banco de dados
	$result = $conn->prepare("select * from evento where nome_evento = ? and data_inicio=? and data_termino=? and hora_inicio=? and endereco_evento=? and bairro_evento=? and cidade_evento=? and estado_evento=? and cep_evento=? and descricao_evento=? and preco_evento=?");
	$result->bindValue(1, $_POST["nome"]);
	$result->bindValue(2, $_POST["dateinic"]);
	$result->bindValue(3, $_POST["datefinal"]);
  $result->bindValue(4, $_POST["timeinic"]);
	$result->bindValue(5, $_POST["endereco"]);
	$result->bindValue(6, $_POST["bairro"]);
	$result->bindValue(7, $_POST["cidade"]);
	$result->bindValue(8, $_POST["estado"]);
	$result->bindValue(9, $_POST["cep"]);
	$result->bindValue(10, $_POST["desc"]);
	$result->bindValue(11, $_POST["preco"]);
	$result->execute();

	if($result->fetchColumn() > 0){ //Se retornar mais de 0 como resultado,existe esse evento cadastrado
		$script = "
		<script type='text/javascript'>
		alert('Esse evento já está cadastrado.');
		</script>";
    	echo $script;
	}
	else{

	$sql = "INSERT INTO evento
	(nome_evento, banner_evento, data_inicio, data_termino,hora_inicio, hora_termino, endereco_evento, bairro_evento, cidade_evento, estado_evento, cep_evento, visibilidade_evento, descricao_evento,preco_evento, CNPJ)
	VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?)";
	$stmt = $conn->prepare($sql);

	//Atrelando os dados às tabelas
	$stmt->bindValue(1, $_POST["nome"]);
	$stmt->bindValue(2, $novo_nome);
	$stmt->bindValue(3, $_POST["dateinic"]);
	$stmt->bindValue(4, $_POST["datefinal"]);
	$stmt->bindValue(5,$_POST["timeinic"]);
	$stmt->bindValue(6,$_POST["timefinal"]);
	$stmt->bindValue(7,$_POST["endereco"]);
	$stmt->bindValue(8,$_POST["bairro"]);
	$stmt->bindValue(9,$_POST["cidade"]);
	$stmt->bindValue(10,$_POST["estado"]);
	$stmt->bindValue(11,$_POST["cep"]);
	$stmt->bindValue(12,1);
	$stmt->bindValue(13,$_POST["desc"]);
	$stmt->bindValue(14,$_POST["preco"]);
	$stmt->bindValue(15,$_SESSION["instituicao"][3]);

	$stmt->execute();

	if($stmt->errorCode() != "00000"){
		$erro = "Erro código " . $stmt->errorCode() . ": ";
		$erro .= implode(", ", $stmt->errorInfo());
		echo $erro;
	} //Exibir erro de comunicação com o banco de dados
	else{

		$cod_evento1="select cod_evento from evento where CNPJ = '{$_SESSION['instituicao'][3]}'";
		$stmt = $conn->prepare($cod_evento1);
		$stmt->execute();
		$cod_evento=$stmt->fetchAll();
		$cod_evento2=max($cod_evento);

		$count=0;
		$sql = "INSERT INTO interesses_evento
		(interesseeve1, interesseeve2, interesseeve3, interesseeve4, interesseeve5,interesseeve6,interesseeve7,interesseeve8,interesseeve9,interesseeve10,interesseeve11,interesseeve12,interesseeve13,interesseeve14,interesseeve15,cod_evento)
		VALUES (?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?,?,?,$cod_evento2[cod_evento])";
		$_interesse = $_POST['intchk'];
		//RECOLHENDO O INTERESSE1
		for($i =0;$i<16;$i++){
			$count++;
			if(isset($_interesse[$i]) && $_interesse[$i] == 1){
				$interesse[$i] = "Informação e Tecnologia";
			}
			else if(isset($_interesse[$i]) && $_interesse[$i] == 2){
				$interesse[$i] = "Logística";
			}
			else if(isset($_interesse[$i]) && $_interesse[$i] == 3){
				$interesse[$i] = "Saúde";
			}
			else if(isset($_interesse[$i]) && $_interesse[$i] == 4){
				$interesse[$i] = "Engenharia";
			}
			else if(isset($_interesse[$i]) && $_interesse[$i] == 5){
				$interesse[$i] = "Administração e Negócios";
			}
			else if(isset($_interesse[$i]) && $_interesse[$i] == 6){
				$interesse[$i] = "Comunicação";
			}
			else if(isset($_interesse[$i]) && $_interesse[$i] == 7){
				$interesse[$i] = "Arte e Design";
			}
			else if(isset($_interesse[$i]) && $_interesse[$i] == 8){
				$interesse[$i] = "Direito";
			}
			else if(isset($_interesse[$i]) && $_interesse[$i] == 9){
				$interesse[$i] = "Educação";
			}
			else if(isset($_interesse[$i]) && $_interesse[$i] == 10){
				$interesse[$i] = "Turismo";
			}
			else if(isset($_interesse[$i]) && $_interesse[$i] == 11){
				$interesse[$i] = "Gastronomia";
			}
			else if(isset($_interesse[$i]) && $_interesse[$i] == 12){
				$interesse[$i] = "Ciências Exatas e Biológicas";
			}
			else if(isset($_interesse[$i]) && $_interesse[$i] == 13){
				$interesse[$i] = "Ciências Sociais e Humanas";
			}
			else if(isset($_interesse[$i]) && $_interesse[$i] == 14){
				$interesse[$i] = "Música";
			}
			else if(isset($_interesse[$i]) && $_interesse[$i] == 15){
				$interesse[$i] = $_POST["int15"];
			}
			else{
				$interesse[$i] = null;
			}
		}

		$stmt=$conn->prepare($sql);

		//criando a quantidade de atrelamentos de acordo com a quantidade de interesses selecionados
		for($i=0;$i<$count-1;$i++){
			$stmt->bindValue($i+1, $interesse[$i]);

		}
		$stmt->execute();
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
		if($coderro == 7){
			echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
		}
		if($coderro == 8){
			echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
		}
		if($coderro == 9){
			echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
		}
		if($coderro == 10){
			echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
		}
		if($coderro == 11){
			echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
		}
		if($coderro == 12){
			echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
		}
		if($coderro == 13){
			echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
		}
		if($coderro == 14){
			echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
		}
		if($coderro == 15){
			echo "<div class='erro'>".$erro."</div><br>";
		}
	}
}


?>
