<!doctype html>
<html lang="pt-br">
  <head>
    <title>Alteração de credenciais da instituição</title>
  </head>
<body>
<?php
session_start();
if(!$_SESSION['instituicao']){
    header('location:login.php');
    exit();
}
$cnpj = $_SESSION['instituicao'][3];
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

else if (isset($_POST['senha_inst'])) {
	

 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva a nova senha</h5><br>

        <label><b>Senha:</b></label>
        <br>
        <input type='senha' name='senha_inst' placeholder='Nova senha'>
        <br>
        <br>
    

	    <input class='btn btn-info' type='submit' name='alterar' value='Alterar'>

	    <br><br>

	    <input class='btn btn-danger' type='reset' value='Limpar'>

	    </form>";
	}
	
	
else if (isset($_POST['nome_inst'])) {
	

 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva o novo nome</h5><br>

        <label><b>Nome:</b></label>
        <br>
        <input type='text' name='nome_inst' placeholder='Novo nome'>
        <br>
        <br>
    

	    <input class='btn btn-info' type='submit' name='alterar' value='Alterar'>

	    <br><br>

	    <input class='btn btn-danger' type='reset' value='Limpar'>

	    </form>";
	}
		

		
else if (isset($_POST['endereco_inst'])) {
	

 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva o novo endereço</h5><br>

        <label><b>Endereço:</b></label>
        <br>
        <input type='text' name='endereço_inst' placeholder='Novo endereço'>
        <br>
        <br>
    

	    <input class='btn btn-info' type='submit' name='alterar' value='Alterar'>

	    <br><br>

	    <input class='btn btn-danger' type='reset' value='Limpar'>

	    </form>";
	}
			
		
	

		
else if (isset($_POST['bairro_inst'])) {
	

 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva o novo bairro</h5><br>

        <label><b>Bairro:</b></label>
        <br>
        <input type='text' name='bairro_inst' placeholder='Novo bairro'>
        <br>
        <br>
    

	    <input class='btn btn-info' type='submit' name='alterar' value='Alterar'>

	    <br><br>

	    <input class='btn btn-danger' type='reset' value='Limpar'>

	    </form>";
	}
		
		

		
else if (isset($_POST['cidade_inst'])) {
	

 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva a nova cidade</h5><br>

        <label><b>Cidade:</b></label>
        <br>
        <input type='text' name='cidade_inst' placeholder='Nova cidade'>
        <br>
        <br>
    

	    <input class='btn btn-info' type='submit' name='alterar' value='Alterar'>

	    <br><br>

	    <input class='btn btn-danger' type='reset' value='Limpar'>

	    </form>";
	}
			

				
else if (isset($_POST['cep_inst'])) {
	

 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva o novo CEP</h5><br>

        <label><b>CEP:</b></label>
        <br>
        <input type='text' name='cep_inst' placeholder='Novo CEP'>
        <br>
        <br>
    

	    <input class='btn btn-info' type='submit' name='alterar' value='Alterar'>

	    <br><br>

	    <input class='btn btn-danger' type='reset' value='Limpar'>

	    </form>";
	}
		
	
else if (isset($_POST['email_inst'])) {
	

 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva o novo CEP</h5><br>

        <label><b>CEP:</b></label>
        <br>
        <input type='text' name='cep_inst' placeholder='Novo CEP'>
        <br>
        <br>
    

	    <input class='btn btn-info' type='submit' name='alterar' value='Alterar'>

	    <br><br>

	    <input class='btn btn-danger' type='reset' value='Limpar'>

	    </form>";
	}
				

				
else if (isset($_POST['telefone_inst'])) {
	

 	echo"<form name='alterar_f' method='POST' action='?validar=true'>

        <h5>Escreva novo telefone</h5><br>

        <label><b>Telefone:</b></label>
        <br>
        <input type='text' name='telefone_inst' placeholder='Novo CEP'>
        <br>
        <br>
    

	    <input class='btn btn-info' type='submit' name='alterar' value='Alterar'>

	    <br><br>

	    <input class='btn btn-danger' type='reset' value='Limpar'>

	    </form>";
	}


?>

<?php
if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true){
	
	include "connection.php";
	$conn = conexao();
	
	//declaramos as variáveis se o post correspondente existir (isset) e alteramos o comando sql de acordo com o item que foi escolhido para ser alterado
	

	if(isset($_POST['login_inst'])){
		$login_inst = $_POST["login_inst"]; 
		$sql = "update faculdade set login_inst = '$login_inst' where CNPJ = '$cnpj' ";
	}
	
	else if(isset($_POST['senha_inst'])){
			$senha_inst = $_POST["senha_inst"];
			$sql = "update faculdade set senha_inst = '$senha_inst' where CNPJ = '$cnpj'";
		}
	
	else if(isset($_POST['nome_inst'])){
			$nome_inst = $_POST["nome_inst"];
			$sql = "update faculdade set nome_inst = '$nome_inst' where CNPJ = '$cnpj'";
		}
	
	else if(isset($_POST['endereco_inst'])){
		$endereco_inst = $_POST["endereco_inst"];
			$sql = "update faculdade set endereco_inst = '$endereco_inst' where CNPJ = '$cnpj'";
		}
	
	else if(isset($_POST['bairro_inst'])){
		$bairro_inst = $_POST["bairro_inst"];
			$sql = "update faculdade set bairro_inst = '$bairro_inst' where CNPJ = '$cnpj'";
		}
	
	else if(isset($_POST['cidade_inst'])){
		$cidade_inst = $_POST["cidade_inst"];
			$sql = "update faculdade set cidade_inst = '$cidade_inst' where CNPJ = '$cnpj'";
		}
	
	else if(isset($_POST['cep_inst'])){
		$cep_inst = $_POST["cep_inst"];
			$sql = "update faculdade set cep_inst = '$cep_inst' where CNPJ = '$cnpj'";
		}
	
	else if(isset($_POST['email_inst'])){
		$email_inst = $_POST["email_inst"];
			$sql = "update faculdade set email_inst = '$email_inst' where CNPJ = '$cnpj'";
		}
	
	else if(isset($_POST['telefone_inst'])){
		$telefone_inst = $_POST["telefone_inst"];
			$sql = "update faculdade set telefone_inst = '$telefone_inst' where CNPJ = '$cnpj'";
		}
		$res = $conn->prepare($sql);
		$res->execute();
}

		

?>
