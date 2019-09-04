<!doctype html>
<html lang="pt-br">
<head>
  <title>Acessar sua conta - FRESHR</title>
  <!-- Required meta tags -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="description" content="Acesse o FRESHR. Uma visão de prosperidade para a sua carreira.">
  <meta name="keywords" content="FRESHR, Eventos, Buscar, Profissão, Login">
  <meta name="robots" content="login, index, follow">
  <meta name="author" content="Iago Pereira, Lucas Campanelli, Renato Melo, Willian Ferreira">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/auth.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="images/icon.png">
  <meta name="viewport" content="width=device-width">
  <meta name="theme-color" content="#121212">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


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
      <form action="login_script.php" method="post">
        <br>
        <label>Login</label>
        <br>
        <input type="text" name="login" placeholder="Login">
        <br>
        <br>
        <label>Senha</label>
        <br>
        <input type="password" name="senha" placeholder="Palavra-passe"><br>
        <br><br> <h1 class='aindan'>Ainda não é cadastrado? <br><a href='cadastro_usuario.php'>Cadastre-se aqui!</a></h1>
        <br>
        <button class='cadastrar' type="submit" value="Logar"> Entrar </button>

      </form>
    </div>
  </center>
</body>
</html>
