<!doctype html>
<html lang="pt-br">
  <head>
    <title>Exclusão de conta</title>
  </head>
<body>
<?php
session_start();
?>
    <form name='excluir_conta' method="POST" action="?validar=true">
        <h5>Para confirmar a exclusão da conta, por favor informe:</h5><br>

        <label><b>Endereço de e-mail associado a esta conta:</b></label>
        <br>
        <input type="email" name="email" placeholder='exemplo@exemplo.com'>
        <br>
        <br>

        <label><b>Senha:</b></label>
        <br>
        <input type="password" name="senha" placeholder='Nova senha'>
        <br>
        <br>

    <input type="hidden" name="id" value="<?php echo $_REQUEST["id"]; ?>">

    <input class="btn btn-info" type="submit" name='excluir' value="Excluir conta">
    <br><br>
    <input class="btn btn-danger" type="reset" value="Limpar">

    </form>
</body>
</html>

<?php
if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true){
    include 'connection.php';
    $conn = conexao();
    $email=$_POST['email'];
    $senha=$_POST['senha'];

    if($_SESSION['usuario'][1]==$email && $_SESSION['usuario'][2]==$senha){
        $delete="delete from usuario where email_usuario = '$email'";
        $res = $conn->prepare($delete);
        $res->execute();
         echo "<script language='javascript'>";
         echo "alert('Sua conta foi PERMANENTEMENTE excluida.');";
         echo "</script>";
         unset($_SESSION['usuario']);
        header("Location: index.php");
    }
    else{
        if($_SESSION['instituicao'][1]==$email && $_SESSION['instituicao'][2]==$senha){
            $delete="delete from faculdade where email_inst = '$email'";
            $res = $conn->prepare($delete);
            $res->execute();
            echo "<script language='javascript'>";
			echo "alert('Sua conta foi PERMANTEMENTE excluida.');";
            echo "</script>";
            unset($_SESSION['instituicao']);
            header("Location: index.php");
        }
        else{
            echo "<script language='javascript'>";
				echo "alert('Não foi possivel deletar a conta. Email ou senha incorretos');";
			echo "</script>";
				
        }
    }
}
?>            