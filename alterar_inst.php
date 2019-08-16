<!doctype html>
<html lang="pt-br">
  <head>
    <title>Alteração de credenciais da instituição</title>
  </head>
<body>
<?php
session_start();

if (isset($_POST['login_inst'])) {
	

 echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva o novo login</h5><br>

        <label><b>Login:</b></label>
        <br>
        <input type='login' name='login_inst' placeholder='Novo login'>
        <br>
        <br>
    

    <input class='btn btn-info' type='submit' name='alterar' value='Alterar'>

    <br><br>

    <input class='btn btn-danger' type='reset' value='Limpar'>

    </form>";
}
else{
	if (isset($_POST['senha_inst'])) {
	

 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva o novo login</h5><br>

        <label><b>Login:</b></label>
        <br>
        <input type='login' name='login_inst' placeholder='Novo login'>
        <br>
        <br>
    

	    <input class='btn btn-info' type='submit' name='alterar' value='Alterar'>

	    <br><br>

	    <input class='btn btn-danger' type='reset' value='Limpar'>

	    </form>";
	}
}

?>

<?php
if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true){
	
	include "connection.php";
	$conn = conexao();
	//declaramos as variáveis
	
	$login_inst = $_POST["login_inst"]; 
	$senha_inst = $_POST["senha_inst"];
	$nome_inst = $_POST["nome_inst"];
	$endereco_inst = $_POST["endereco_inst"];
	$bairro_inst = $_POST["bairro_inst"];
	$cidade_inst = $_POST["cidade_inst"];
	$cep_inst = $_POST["cep_inst"];
	$email_inst = $_POST["email_inst"];
	$telefone_inst = $_POST["telefone_inst"];

	if(isset($_POST['login_inst'])){
		$sql = "update faculdade set login_inst = '$login_inst'";
	}
	else{
		if(isset($_POST['senha_inst'])){
			$sql = "update faculdade set senha_inst = '$senha_inst'";
		}
	}

		$res = $conn->prepare($sql);
		$res->execute();
}
?>