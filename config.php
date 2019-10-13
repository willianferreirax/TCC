<!DOCTYPE html>
<html>
<head>
	<title>Configurações</title>
</head>
<body>

<?php
session_start();
if(isset($_SESSION['instituicao'])) {
    echo '<form name="config" method="POST" action="alterar_inst.php">
    <h5>Configurações</h5><br>

    <label><b>Senha:</b></label>
    <br>
    <input type="submit" name="senha_inst" value="Alterar">
    <br>
    <br>
    
    <label><b>Nome:</b></label>
    <br>
    <input type="submit" name="nome_inst" value="Alterar">
    <br>
    <br>
    
    <label><b>Endereço:</b></label>
    <br>
    <input type="submit" name="endereco_inst" value="Alterar">
    <br>
    <br>
    
    <label><b>Bairro:</b></label>
    <br>
    <input type="submit" name="bairro_inst" value="Alterar">
    <br>
    <br>

    <label><b>Cidade:</b></label>
    <br>
    <input type="submit" name="cidade_inst" value="Alterar">
    <br>
    <br>

    <label><b>Estado:</b></label>
    <br>
    <input type="submit" name="estado_inst" value="Alterar">
    <br>
    <br>
    
    <label><b>CEP:</b></label>
    <br>
    <input type="submit" name="cep_inst" value="Alterar">
    <br>
    <br>
    
    <label><b>Email:</b></label>
    <br>
    <input type="submit" name="email_inst" value="Alterar">
    <br>
    <br>

    <label><b>Telefone:</b></label>
    <br>
    <input type="submit" name="telefone_inst" value="Alterar">
    <br>
    <br>

<br><br>


<a href="painel_inst.php">voltar</a>

</form>';
}
elseif(isset($_SESSION['usuario'])){
    echo'
        <form name="config" method="POST" action="alterar_usu.php">
        <h5>Configurações</h5><br>

        <label><b>Nome:</b></label>
        <br>
        <input type="submit" name="nome_usu" value="Alterar">
        <br>
        <br>

        <label><b>Email:</b></label>
        <br>
        <input type="submit" name="email_usu" value="Alterar">
        <br>
        <br>

        <label><b>Senha:</b></label>
        <br>
        <input type="submit" name="senha_usu" value="Alterar">
        <br>
        <br>

        

        <input class="btn btn-info" type="submit" name="alterar" value="Alterar">
        <br><br>
        <input class="btn btn-danger" type="reset" value="Limpar">

        <a href="painel_usuario.php">voltar</a>
    ';
}
else{
    header('Location: index.php');
    exit();
}
?>

</body>
</html>
