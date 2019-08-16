<!DOCTYPE html>
<html>
<head>
	<title>Configurações</title>
</head>
<body>

<?php
session_start();
?>
    <form name='config' method="POST" action="alterar_inst.php">
        <h5>Configurações</h5><br>

        <label><b>Login:</b></label>
        <br>
        <input type="submit" name="login_inst" value="Alterar">
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