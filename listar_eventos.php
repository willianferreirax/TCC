<!doctype html>
  <html lang="pt-br">
  <head>
    <title>
      <?php
                  if(isset($_POST['pesquisa'])){
                      $pesquisa = $_POST['pesquisa'];
                      echo $pesquisa;
                    }
                    else{
                      echo 'Eventos';
                    } ?>
                    - FRESHR</title>
    <!-- Required meta tags -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="description" content="Junte-se ao FRESHR. Uma visão de prosperidade para a sua carreira.">
    <meta name="keywords" content="FRESHR, Eventos, Buscar, Profissão, Página Inicial">
    <meta name="robots" content="Index, follow">
    <meta name="author" content="Iago Pereira, Lucas Campanelli, Nicholas Campanelli, Renato Melo, Willian Ferreira">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/337796870f.js"></script>
    <link rel="icon" href="images/icon.png">
    <meta name="viewport" content="width=device-width">
    <meta name="theme-color" content="#11226E">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  </head>

  <body class="bgindex">
    <center>
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
          session_start();
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
    <?php
    include 'connection.php';
    $conn = conexao();
    $result1=array();
    $result2=array();

    if(isset($_POST['pesquisa'])){
      $pesquisa = $_POST['pesquisa'];//coisas que a pessoa pode buscar
	  $pesquisa = strtoupper($pesquisa);
      $pesquisa = '%'.$pesquisa.'%';
      //informações do evento, interesses do evento,instituições especificas

      //procurando um evento a partir de suas informações
      $select ="select * from evento where upper(nome_evento) like ? or data_inicio like ? or data_termino like ? or hora_inicio like ? or hora_termino like ? or upper(endereco_evento) like ? or upper(bairro_evento) like ? or upper(cidade_evento) like ? or upper(estado_evento) like ? or cep_evento like ? or upper(descricao_evento) like ?";

      $res=$conn->prepare($select);
      $res->bindParam(1,$pesquisa);
      $res->bindParam(2,$pesquisa);
      $res->bindParam(3,$pesquisa);
      $res->bindParam(4,$pesquisa);
      $res->bindParam(5,$pesquisa);
      $res->bindParam(6,$pesquisa);
      $res->bindParam(7,$pesquisa);
      $res->bindParam(8,$pesquisa);
      $res->bindParam(9,$pesquisa);
      $res->bindParam(10,$pesquisa);
      $res->bindParam(11,$pesquisa);

      $res->execute();

      //procurando um evento a partir de seus interesses
      $cod_evento="select cod_evento from interesses_evento where upper(interesseeve1) like ? or upper(interesseeve2) like ? or upper(interesseeve3) like ? or upper(interesseeve4) like ? or upper(interesseeve5) like ? or upper(interesseeve6) like ? or upper(interesseeve7) like ? or upper(interesseeve8) like ? or upper(interesseeve9) like ? or upper(interesseeve10) like ? or upper(interesseeve11) like ? or upper(interesseeve12) like ? or upper(interesseeve13) like ? or upper(interesseeve14) like ? or upper(interesseeve15) like ?";

      $res1=$conn->prepare($cod_evento);
      $res1->bindParam(1,$pesquisa);
      $res1->bindParam(2,$pesquisa);
      $res1->bindParam(3,$pesquisa);
      $res1->bindParam(4,$pesquisa);
      $res1->bindParam(5,$pesquisa);
      $res1->bindParam(6,$pesquisa);
      $res1->bindParam(7,$pesquisa);
      $res1->bindParam(8,$pesquisa);
      $res1->bindParam(9,$pesquisa);
      $res1->bindParam(10,$pesquisa);
      $res1->bindParam(11,$pesquisa);
      $res1->bindParam(12,$pesquisa);
      $res1->bindParam(13,$pesquisa);
      $res1->bindParam(14,$pesquisa);
      $res1->bindParam(15,$pesquisa);

      $res1->execute();

      $result1=$res1->fetchAll();

      foreach($result1 as $row){
        $select2='select * from evento where cod_evento=? order by cod_evento desc';
        $res1=$conn->prepare($select2);
        $res1->bindParam(1,$row['cod_evento']);
        $res1->execute();
        $result1=$res1->fetchAll();//substitui oq está dentro ou adiciona??
      }

      //procurando um evento a partir da instituição que o cadastrou

      $CNPJ="select CNPJ from faculdade where upper(nome_inst) like ?";
      $res2=$conn->prepare($CNPJ);
      $res2->bindParam(1,$pesquisa);
      $res2->execute();
      $result2=$res2->fetchAll();

      foreach($result2 as $row){
        $select3="select * from evento where CNPJ = ? order by cod_evento desc";
        $res2=$conn->prepare($select3);
        $res2->bindParam(1,$row['CNPJ']);
        $res2->execute();
        $result2=$res2->fetchAll();
      }

    }
    else{

      $res=$conn->prepare("select * from evento order by cod_evento desc");
      $res->execute();

    }
    $result = $res->fetchAll();

    ?>

    <body>
      <div class='elem1'>
        <?php

        foreach ($result as $row) {
          if($row['visibilidade_evento']==1){
          $imagem ='upload/'.$row['banner_evento'];
          echo "
                    <a href='exibir_evento.php?id= $row[cod_evento]'>
                      <div class='searchinfo'>
                        <img class='imagemres' src='$imagem'>
                            <div class=nomeres>
                            <h1>$row[nome_evento]</h1>
                            <div class=descres>
                            <h2>$row[descricao_evento]</h2>
                            <div class='enderes'>
                            <h2>$row[endereco_evento] | $row[cidade_evento], $row[estado_evento]</div></div></div>
                            <div class=precores>
                            <h2>";
                            if(isset($row['preco_evento'])){
                                      echo "R$$row[preco_evento]";
                                    }
                                    else if($row['preco_evento'] == "" || $row['preco_evento'] == "0" || $row['preco_evento'] == null){
                                      echo "Grátis";
                                    }
                                      echo"
                            </h2>
                            </div>
                      </div>
                    </a>";
         }
        }
        echo"<br><br>";

        foreach ($result1 as $row) {
          if($row['visibilidade_evento']==1){
          $imagem ='upload/'.$row['banner_evento'];
          echo "
                    <a href='exibir_evento.php?id= $row[cod_evento]'>
                      <div class='searchinfo'>
                        <img class='imagemres' src='$imagem'>
                            <div class=nomeres>
                            <h1>$row[nome_evento]</h1>
                            <div class=descres>
                            <h2>$row[descricao_evento]</h2>
                            <div class='enderes'>
                            <h2>$row[endereco_evento] | $row[cidade_evento], $row[estado_evento]</div></div></div>
                            <div class=precores>
                            <h2>";
                            if(isset($row['preco_evento'])){
                                      echo "R$$row[preco_evento]";
                                    }
                                    else if($row['preco_evento'] == "" || $row['preco_evento'] == "0" || $row['preco_evento'] == null){
                                      echo "Grátis";
                                    }
                                      echo"
                            </h2>
                            </div>
                      </div>
                    </a>";
         }
        }

        foreach ($result2 as $row) {
          if($row['visibilidade_evento']==1){
          $imagem ='upload/'.$row['banner_evento'];
          echo "
                    <a href='exibir_evento.php?id= $row[cod_evento]'>
                      <div class='searchinfo'>
                        <img class='imagemres' src='$imagem'>
                            <div class=nomeres>
                            <h1>$row[nome_evento]</h1>
                            <div class=descres>
                            <h2>$row[descricao_evento]</h2>
                            <div class='enderes'>
                            <h2>$row[endereco_evento] | $row[cidade_evento], $row[estado_evento]</div></div></div>
                            <div class=precores>
                            <h2>";
                            if(isset($row['preco_evento'])){
                                      echo "R$$row[preco_evento]";
                                    }
                                    else if($row['preco_evento'] == "" || $row['preco_evento'] == "0" || $row['preco_evento'] == null){
                                      echo "Grátis";
                                    }
                                      echo"
                            </h2>
                            </div>
                      </div>
                    </a>";
          }
        }
        echo "<br>";
        ?>
      </div>
      <body class="bgindex">
        <input type='checkbox' id='dropcheck'>
        <input type='checkbox' id='chec'>
        <div class='icons'>
          <a href='index.php'><i class="fas fa-home fa-2x"></i></a><br>
          <a href='listar_eventos.php'><i class="fas fa-map-marked fa-2x"></i></a><br>
          <a href='listar_inst.php'><i class="fas fa-users fa-2x"></i></a><br>
          <a href='sobre.php'><i class="fas fa-info fa-2x"></i></a><br>
          <a href='ajuda.php'><i class="fas fa-question fa-2x"></i></a><br>
          <hr>
        </div>
        <nav>
          <div class='menulist'>
            <a href='index.php'><div class='b1'>Página inicial</div></a>
            <a href='listar_eventos.php'><div class='b2'>Eventos</div></a>
            <a href='listar_inst.php'><div class='b3'>Instituição</div></a>
            <a href='sobre.php'><div class='b4'>Sobre nós</div></a>
            <a href='ajuda.php'><div class='b5'>Ajuda</div></a>
          </div>
          <label for='chec' class='backdiv'></label>
        </nav>
        <div class='dropdown'>
          <?php
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
          <a href='painel_usuario.php' class='account'>Configurações</a>
          <br>
          <a href='ajuda.php' class='account'>Ajuda</a>
          <br>
          <br>
          <a href='logout_script.php'><div class='exit'>Sair</div></a>
        </div>
      </center>
    </body>
    </html>
