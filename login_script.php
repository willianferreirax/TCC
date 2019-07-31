<?php
include 'connection.php';
$conn = conexao();
session_start();
$login = $_POST['login'];
$senha = md5($_POST['senha']);

$select = "SELECT nome_usuario from usuario where email_usuario = '$login' and senha_usuario = '$senha'";
$cod = "SELECT cod_usuario from usuario where email_usuario = '$login' and senha_usuario = '$senha'";
$busca = "SELECT email_usuario from usuario where email_usuario = '$login' and senha_usuario = '$senha'";

//Usuário
$res = $conn->prepare($select);//preparando query
$res->execute();//executando

//cod_usuario
$codq = $conn->prepare($cod);//preparando query
$codq->execute();

//Email
$emailq = $conn->prepare($busca);
$emailq->execute();

$result = $res->fetchAll();//pegando todas as linhas da matriz
$codres = $codq->fetchAll(); //recolhendo o id do usuário que está logando
$emailres = $emailq->fetchAll(); //recolhendo o email do usuário que está logando

foreach($result as $row){
	$_SESSION['usuario'] = $row['nome_usuario'];
}

foreach($codres as $cont){
	$_SESSION['codusuario'] = $cont['cod_usuario'];
}

foreach($emailres as $query){
	$_SESSION['email'] = $query['email_usuario'];
}

	if (count($result) == 1 ){//contando quantas linhas tem, só deve haver 1 usuario com cada combinação de email e senha
		$_SESSION['tipo'] = 'usuario';
		header('Location: painel_usuario.php');
	}
	else{
				$select = "SELECT nome_inst from faculdade where email_inst = '$login' and senha_inst = '$senha'";
				$cod = "SELECT CNPJ from faculdade where email_inst = '$login' and senha_inst = '$senha'";
				$busca = "SELECT email_inst from faculdade where email_inst = '$login' and senha_inst = '$senha'";

				$res = $conn->prepare($select);//preparando query
				$res->execute();//executando
				$result = $res->fetchAll();

				//cod_instituicao
				$codq = $conn->prepare($cod);//preparando query
				$codq->execute();

				//Email
				$emailq = $conn->prepare($busca);
				$emailq->execute();

				$codres = $codq->fetchAll(); //recolhendo o id do usuário que está logando
				$emailres = $emailq->fetchAll(); //recolhendo o email do usuário que está logando

				foreach($codres as $cont){
					$_SESSION['cnpj'] = $cont['CNPJ'];
				}

				foreach($emailres as $query){
					$_SESSION['emailinst'] = $query['email_inst'];
				}

				foreach($result as $row){
					$_SESSION['instituicao'] = $row['nome_inst'];
				}
				if (count($result) == 1 ){
					$_SESSION['tipo'] = 'inst';
					header('Location: painel_inst.php');
				}
				else{
					header('location:login.php');
				}

	}

?>
