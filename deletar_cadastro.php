<!doctype html>
<html lang="pt-br">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="description" content="Acesse o FRESHR. Uma visão de prosperidade para a sua carreira.">
    <meta name="keywords" content="FRESHR, Eventos, Buscar, Profissão, Login">
    <meta name="robots" content="login, index, follow">
    <meta name="author" content="Iago Pereira, Lucas Campanelli, Renato Melo, Willian Ferreira">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/deletar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="images/icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#121212">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Abandonar o FRESHR</title>
  </head>
<body>
<?php
session_start();
?>
<center>
  <header class='cabecalho'>
    <a href="index.php" class='homea'>
      <label for='logospace' class='logo'>
        <h1 class='logospace'></h1>
      </label>
    </a>
    <hr>
  </header>
    <div class='containerform'>
    <form name='excluir_conta' method="POST" action="?validar=true">
        <small class='sair'>Para confirmar a exclusão da conta, por favor informe:</small><br><br>

        <label class='infoemail'>Seu endereço de e-mail:</label>
        <br>
        <input type="email" name="email" placeholder='exemplo@exemplo.com'>
        <br>
        <br>

        <label>Senha:</label>
        <br>
        <input type="password" name="senha" placeholder='Nova senha'>
        <br>
        <br>
        <br><br>
    <input type="hidden" name="id" value="<?php echo $_REQUEST["id"]; ?>">

    <button class='cadastraraltinst' type="submit" value="validar">Prosseguir</button>

    </form>
  </div>
  </center>
</body>
</html>

<?php
if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true){
    include 'connection.php';
    $conn = conexao();
    $email=$_POST['email'];
    $senha=md5($_POST['senha']);

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
