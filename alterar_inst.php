<!doctype html>
<html lang="pt-br">
  <head>
    <title>Alteração de credenciais da instituição</title>
  </head>
<body>
<?php
session_start();
?>
    <form name='alterar_f' method="POST" action="?validar=true">
        <h5>Escreva nos campos abaixo as novas credenciais da instituição</h5><br>

        <label><b>Login:</b></label>
        <br>
        <input type="login" name="login_inst" placeholder='Novo login'>
        <br>
        <br>

        <label><b>Senha:</b></label>
        <br>
        <input type="password" name="senha_inst" placeholder='Nova senha'>
        <br>
        <br>
		
		<label><b>Nome:</b></label>
        <br>
        <input type="nome" name="nome_inst" placeholder='Novo nome'>
        <br>
        <br>
		
		<label><b>Endereço:</b></label>
        <br>
        <input type="endereco" name="endereco_inst" placeholder='Novo endereco'>
        <br>
        <br>
		
		<label><b>Bairro:</b></label>
        <br>
        <input type="bairro" name="bairro_inst" placeholder='Novo bairro'>
        <br>
        <br>
		
		<label><b>CEP:</b></label>
        <br>
        <input type="CEP" name="cep_inst" placeholder='Novo cep'>
        <br>
        <br>
		
		<label><b>Email:</b></label>
        <br>
        <input type="email" name="email_inst" placeholder='Novo email'>
        <br>
        <br>
    <input type="hidden" name="id" value="<?php echo $_REQUEST["id"]; ?>">

    <input class="btn btn-info" type="submit" name='alterar' value="Alterar">
    <br><br>
    <input class="btn btn-danger" type="reset" value="Limpar">

    </form>
</body>
</html>


<?php
if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true){
	 $conn = conexao();
include "conexao.php";
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
	
	if ($_SESSION ['instituicao'][1] == $email_inst ){
		//prepara a variável para receber o comando de sql
		$sql = "update faculdade set login_inst = '$login_inst',senha_inst = '$senha_inst',nome_inst = '$nome_inst', endereco_inst = '$endereco_inst', bairro_inst='$bairro_inst', cidade_inst='$cidade_inst',cep_inst='$cep_inst, email_inst='$email_inst, telefone_inst='$telefone_inst'";
		$res = $conn->prepare($sql);
		$res->execute();
		echo "<script language='javascript'>";
			echo "alert('Credenciais alteradas com sucesso');";
            echo "</script>";
            unset($_SESSION['instituicao']);
            header("Location: index.php");
}

		
		else{
            echo "<script language='javascript'>";
				echo "alert('Instituição não encontrada, por favor, verifique se o email informado é valido');";
			echo "</script>";
				
        }
		//prepara o comando sql para aceitar caracteres especiais
		mysql_query("SET NAMES 'windows-1252'");
		mysql_query('SET character_set_connection=windows-1252');
		mysql_query('SET character_set_client=windows-1252');
		mysql_query('SET character_set_results=windows-1252');
		$resultado = mysql_query($sql) or die(mysql_error());
		//verifica se o comando foi executado com sucesso
		
	
	
?>
