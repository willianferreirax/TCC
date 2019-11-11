<?php
if(isset($_GET['id'])){
  include "connection.php";
  $conn = conexao();
  $id = $_GET['id'];

  $select= "select * from evento where cod_evento = ?";
  $res = $conn->prepare($select);
  $res->bindParam(1, $id);
  $res->execute();
  $result=$res->fetchAll();

  $evento = array();
  foreach ($result as $row) {
    array_push($evento,$row['nome_evento']);
    array_push($evento,$row['banner_evento']);
    array_push($evento,$row['data_inicio']);
    array_push($evento,$row['data_termino']);
    array_push($evento,$row['hora_inicio']);
    array_push($evento,$row['hora_termino']);
    array_push($evento,$row['endereco_evento']);
    array_push($evento,$row['bairro_evento']);
    array_push($evento,$row['cidade_evento']);
    array_push($evento,$row['estado_evento']);
    array_push($evento,$row['cep_evento']);
    array_push($evento,$row['descricao_evento']);
    array_push($evento,$row['preco_evento']);
    array_push($evento,$row['comp_qnt']);
    array_push($evento,$row['interesse_qnt']);
    array_push($evento,$row['avaliacoes_qnt']);
  }
}
else{
  header('Location:index.php');
}


?>

<!doctype html>
<html lang="pt-br">
<head>
  <title><?php echo $evento[0];?> - FRESHR</title>
  <!-- Required meta tags -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="description" content="Junte-se ao FRESHR. Uma visão de prosperidade para a sua carreira.">
  <meta name="keywords" content="FRESHR, Eventos, Buscar, Profissão, Página Inicial">
  <meta name="robots" content="Index, follow">
  <meta name="author" content="Iago Pereira, Lucas Campanelli, Nicholas Campanelli, Renato Melo, Willian Ferreira">
  <link rel="stylesheet" href="css/exibir.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/337796870f.js"></script>
  <link rel="icon" href="images/icon.png">
  <meta name="viewport" content="width=device-width">
  <meta name="theme-color" content="#121212">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script type='text/javascript'>
  var i = 0;
  function transform(){
    i++;
    if(i == 2){
      document.getElementById('formsearch').submit();
    }
  }
  </script>
</head>
<body>
  <body class="bgindex">

    <center>
      <input type='checkbox' id='dropcheck'>
      <input type='checkbox' id='chec'>
      <div class='icons'>
        <a href='index.php'><i class="fas fa-home fa-2x"></i></a><br>
        <a href='listar_eventos.php'><i class="fas fa-map-marked fa-2x"></i></a><br>
        <a href='listar_inst.php'><i class="fas fa-users fa-2x"></i></a><br>
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
        <label for='chec' class='backdiv'></label>
      </nav>
      <div class='dropdown'>
        <?php
        session_start();
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
        <a href='logout_script.php'><div class='exit'>Sair</div></a>
      </div>
      <header class='cabecalhoindex' id='grid'>
        <div class='menudiv'>
          <div class='menubtn'>
            <label for='chec' class='labelchec'><i class="fas fa-bars fa-2x"></i></i></label>
          </div>
          <a href='index.php'><h1 class='logoeheader'>FRESHR</h1></a>
        </div>
        <div class='pesquisarbtn'>
          <form action="listar_eventos.php" id='formsearch' method="post" class='searchform'>
            <input type='checkbox' id='searchcheck'>
            <label for='searchcheck' id='iconmobile' onclick="transform()" class='searchlabel'><i class="fas fa-search"></i></label>
            <div class='search'>

              <input type='text' name='pesquisa' placeholder='Pesquisar eventos...' class='searchbar'>
              <input type='submit' id='enviar'><label for='enviar' id ='iconenviar' class="fas fa-search fa-1x"></label>
            </form>
          </div>
        </div>
        <div class='userdiv'>
          <?php
          if(isset($_SESSION['instituicao'])){
            echo "<div class='creatediv'><a href='eventinfo.php'><button class='cadastrarevent'>Criar evento</button></a>
            </div></label>";
            echo "<div class='criaricon'><a href='eventinfo.php'><i class='fas fa-plus-circle'></i></a>
            </div></label>";
          }
          ?>
          <?php
          if(isset($_SESSION['usuario'])){
            echo "<label for='dropcheck' class='dropcheck'><div class='userbtn'><i class='fas fa-user-circle fa-2x'></i>
            </div></label>";
          }
          else if(isset($_SESSION['instituicao'])){
            echo "<label for='dropcheck' class='dropcheck'><div class='userbtn'><i class='fas fa-user-circle fa-2x'></i>
            </div></label>";
          }
          else{
            echo "<div class='userbtn'><a href='login.php'><i class='fas fa-user-circle fa-2x'></i></a>
            </div>";
          }
          ?>
        </div>
      </div>
    </header>
    <div class='elem1'>
      <div class="infocontainer">
        <img class="banner" src="<?php echo 'upload/'.$evento[1]?>" draggable="false">
        <div class="info1">
          <?php
          if(isset($_SESSION['usuario'])){
            $result = $conn->prepare("select * from avaliacao where cod_usuario = {$_SESSION['usuario'][3]} and cod_evento = $id");
            $result->execute();

            if($result->fetchColumn() > 0){
              echo "<div class='eventact'>";
              echo "<a href= 'exibir_evento.php?id={$_GET['id']}&avaliado=true';><i class='fas fa-thumbs-up' id='like' style='color: #006de2'></i><small class='avalqnt'>{$evento[15]}</small>
              </a>";
            }
            elseif($result->fetchColumn() == 0){
              echo "<div class='eventact'>";
              echo "<a href= 'exibir_evento.php?id={$_GET['id']}&avaliado=true';><i class='fas fa-thumbs-up' id='like'></i><small class='avalqnt'>{$evento[15]}</small>
              </a>";
            }
          }
          else{
            echo "<div class='eventactwit'>";
            echo "<label for='btnconfirm' id='likeqnt' class='avaliado'>
            {$evento[15]} pessoas gostaram <i class='fas fa-thumbs-up' id='likewit'></i>
            </label>";
          }
          ?>
          <?php
          if(isset($_SESSION['usuario'])){
            $result = $conn->prepare("select * from interessado where cod_usuario = {$_SESSION['usuario'][3]} and cod_evento = $id");
            $result->execute();

            if($result->fetchColumn() > 0){
              echo "<a href= 'exibir_evento.php?id={$_GET['id']}&interessado=true';><i class='fas fa-heart' id='star' style='color: red'></i>
              </a>";
            }
            elseif($result->fetchColumn() == 0){
              echo "<a href= 'exibir_evento.php?id={$_GET['id']}&interessado=true';><label for='btnstar' class='interessado'><i class='fas fa-heart' id='star'></i>
              </label></a>";
            }
          }
          else{
            echo "
            <label for='btnconfirm' id='intqnt' class='interessado'>
            {$evento[14]} pessoas interessadas <i class='fas fa-heart' id='starwit';></i>
            </label>";
          }
          ?>
          <?php
          if(isset($_SESSION['usuario'])){
            $result = $conn->prepare("select * from comparecimento where cod_usuario = {$_SESSION['usuario'][3]} and cod_evento = $id");
            $result->execute();

            if($result->fetchColumn() > 0){
              echo "
              <label for='btnconfirm' id='confirmqnt' class='confirmado' style='background: -webkit-linear-gradient(#C40EFA, #0096C4);
              -webkit-background-clip: text;
              -webkit-text-fill-color: transparent;'><a href= 'exibir_evento.php?id={$_GET['id']}&validar=true';>
              {$evento[13]} pessoas confirmadas <i class='fas fa-check' id='confirmicon' style='background: -webkit-linear-gradient(#C40EFA, #0096C4);
              -webkit-background-clip: text;
              -webkit-text-fill-color: transparent;'></i>
              </label></a></div><br>";
            }
            elseif($result->fetchColumn() == 0){
              echo "<label for='btnconfirm' id='confirmqnt' class='confirmado'>
              <a href= 'exibir_evento.php?id={$_GET['id']}&validar=true';>
              {$evento[13]} pessoas confirmadas <i class='fas fa-check' id='confirmicon'></i>
              </label>
              </a></div><br>";
            }
          }
          else{
            echo "
            <label for='btn
            ' id='confirmqnt' class='confirmado' style='background: -webkit-linear-gradient(#C40EFA, #0096C4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;'>
            {$evento[13]} pessoas confirmadas <i class='fas fa-check' id='confirmicon' style='background: -webkit-linear-gradient(#C40EFA, #0096C4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;'></i>
            </label></div><br>";
          }
          ?>

          <h1 class="nome"> <?php echo $evento[0];?></h1><br>
          <h1 class='desceve'> <?php echo $evento[11];?></h1></br>
          <h1 class='dataeve'> Período: <?php echo $evento[2] . ", ". $evento[4] . " até " . $evento[2] . ", ".$evento[5];?></h1></br>
          <h1 class='preco'> Preço: <?php echo $evento[12]; ?></h1><br>
          <h1 class='endereeve'> <?php echo $evento[6] . " - " . $evento[8] . ", " . $evento[9]; ?> </h1><br>
          <a href="listar_eventos.php"><button class='voltar'>Voltar</button></a>
		  <h1 class='comenttitle'>Comentários</h1><br>
		  <form action="listar_eventos.php" id='formsearch' method="post" class='searchform'>
		  <textarea name='comentariotxt' placeholder='aaaa'></textarea><br>
			<button class='enviarcoment'>Comentar</button>
		  </form>
        </div>
      </div>
    </div>
  </center>
</body>

<?php
if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true) {
  $result = $conn->prepare("select * from comparecimento where cod_usuario = {$_SESSION['usuario'][3]} and cod_evento = $id");
  $result->execute();

  if($result->fetchColumn() > 0){
    $rs = $conn->prepare("DELETE FROM comparecimento WHERE cod_usuario={$_SESSION['usuario'][3]} AND cod_evento=$id");
    $rs->execute();
    $rs = $conn->prepare("UPDATE evento SET comp_qnt=comp_qnt-1 WHERE cod_evento=$id");
    $rs->execute();
    $script = "<script language=javascript>
    location.href='exibir_evento.php?id=".$id."';
    alert('Presença retirada.');
    </script>";
    echo $script;
  }
  elseif($result->fetchColumn() == 0){
    $sql = "INSERT INTO comparecimento (cod_usuario, cod_evento) VALUES ({$_SESSION['usuario'][3]}, $id)";
    $rs = $conn->prepare($sql);
    $rs->execute();
    $rs = $conn->prepare("UPDATE evento SET comp_qnt=comp_qnt+1 WHERE cod_evento=$id");
    $rs->execute();
    $script = "<script language=javascript>
    location.href='exibir_evento.php?id=".$id."';
    alert('Presença confirmada!');
    </script>";
    echo $script;
  }
}
if(isset($_REQUEST["interessado"]) && $_REQUEST["interessado"] == true) {
  $result = $conn->prepare("select * from interessado where cod_usuario = {$_SESSION['usuario'][3]} and cod_evento = $id");
  $result->execute();

  if($result->fetchColumn() > 0){
    $rs = $conn->prepare("DELETE FROM interessado WHERE cod_usuario={$_SESSION['usuario'][3]} AND cod_evento=$id");
    $rs->execute();
    $rs = $conn->prepare("UPDATE evento SET interesse_qnt=interesse_qnt-1 WHERE cod_evento=$id");
    $rs->execute();
    $script = "<script language=javascript>
    location.href='exibir_evento.php?id=".$id."';
    alert('Interesse desmarcado.');
    </script>";
    echo $script;
  }
  elseif($result->fetchColumn() == 0){
    $sql = "INSERT INTO interessado (cod_usuario, cod_evento) VALUES ({$_SESSION['usuario'][3]}, $id)";
    $rs = $conn->prepare($sql);
    $rs->execute();
    $rs = $conn->prepare("UPDATE evento SET interesse_qnt=interesse_qnt+1 WHERE cod_evento=$id");
    $rs->execute();
    $script = "<script language=javascript>
    location.href='exibir_evento.php?id=".$id."';
    alert('Interesse marcado!');
    </script>";
    echo $script;
  }
}
if(isset($_REQUEST["avaliado"]) && $_REQUEST["avaliado"] == true) {
  $result = $conn->prepare("select * from avaliacao where cod_usuario = {$_SESSION['usuario'][3]} and cod_evento = $id");
  $result->execute();

  if($result->fetchColumn() > 0){
    $rs = $conn->prepare("DELETE FROM avaliacao WHERE cod_usuario={$_SESSION['usuario'][3]} AND cod_evento=$id");
    $rs->execute();
    $rs = $conn->prepare("UPDATE evento SET avaliacoes_qnt=avaliacoes_qnt-1 WHERE cod_evento=$id");
    $rs->execute();
    $script = "<script language=javascript>
    location.href='exibir_evento.php?id=".$id."';
    alert('Avaliação retirada.');
    </script>";
    echo $script;
  }
  elseif($result->fetchColumn() == 0){
    $sql = "INSERT INTO avaliacao (cod_usuario, cod_evento) VALUES ({$_SESSION['usuario'][3]}, $id)";
    $rs = $conn->prepare($sql);
    $rs->execute();
    $rs = $conn->prepare("UPDATE evento SET avaliacoes_qnt=avaliacoes_qnt+1 WHERE cod_evento=$id");
    $rs->execute();
    $script = "<script language=javascript>
    location.href='exibir_evento.php?id=".$id."';
    alert('Agradecemos a sua avaliação!');
    </script>";
    echo $script;
  }
}
?>

</html>
