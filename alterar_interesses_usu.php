<?php
session_start();
if(!$_SESSION['usuario']){
  header('Location:index.php');
  exit();
}
?>
<!doctype html>
<html lang="pt-br">
<head>
  <title>Minhas áreas de interesses - FRESHR</title>
  <!-- Required meta tags -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="description" content="Junte-se ao FRESHR. Uma visão de prosperidade para a sua carreira.">
  <meta name="keywords" content="FRESHR, Eventos, Buscar, Profissão, Cadastro">
  <meta name="robots" content="cadastro_usuario, index, follow">
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

  <script type='text/javascript' src='js/jquery-3.4.1.min.js'></script>
  <script type='text/javascript'>
  function intlimit(n) {
    var nint = 0;
    for(var i = 0; i < document.getElementsByClassName("chkint").length; i++){
      if(document.getElementsByClassName("chkint")[i].checked){
        nint = nint + 1;
      }
      if(nint > 5){
        document.getElementsByClassName("chkint")[n].checked = false;
        alert("O número máximo de interesses foi atingido!")
        return false;
      }
    }
  }
  </script>
</head>
<script type='text/javascript'>
function intlimit(n) {
  var nint = 0;
  for(var i = 0; i < document.getElementsByClassName("chkint").length; i++){
    if(document.getElementsByClassName("chkint")[i].checked){
      nint = nint + 1;
    }
    if(nint > 5){
      document.getElementsByClassName("chkint")[n].checked = false;
      alert("O número máximo de interesses foi atingido!")
      return false;
    }
  }
}
</script>
<body>
  <center>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <header class='cabecalho'>
      <a href="index.php" class='homea'>
        <label for='logospace' class='logo'>
          <h1 class='logospace'></h1>
        </label>
      </a>
      <hr>
    </header>
    <?php
    include 'connection.php';
    $conn = conexao();
    $verificaint = array();
    $select = "SELECT interesseusu1, interesseusu2, interesseusu3, interesseusu4, interesseusu5 from interesses_usuario where cod_usuario = '{$_SESSION['usuario'][3]}'";
    $res = $conn->prepare($select);//preparando query
    $res->execute();//executando
    $result = $res->fetchAll();//pegando todas as linhas da matriz
    ?>

    <form name='cadastro_uso' method="POST" action="?validar=true">
      <label class='labelintere'>Selecione as <b>áreas de interesses</b> que você deseja atualizar<br><b>Selecione 5</b></label><br>

      <div class='interesses'>

        <input type="checkbox" id='bti1' class='chkint' value=1 onclick='intlimit(0)' name='intchk[]'
        <?php
        for($i = 0; $i < 6; $i++){
          if((isset($result[0]['interesseusu'.$i]) && $result[0]['interesseusu'.$i] == 'Informação e Tecnologia')){
            echo "checked";
          }
        }
        ?>>
        <label for='bti1' class='interesse1' id='int1'>
          Informação e Tecnologia
        </label>
        <input type="checkbox" id='bti2' class='chkint' value=2 onclick='intlimit(1)' name='intchk[]'
        <?php
        for($i = 0; $i < 6; $i++){
          if((isset($result[0]['interesseusu'.$i]) && $result[0]['interesseusu'.$i] == 'Logística')){
            echo "checked";
          }
        }
        ?>>
        <label for='bti2' class='interesse2' id='int2'>
          Logística
        </label>
        <input type="checkbox" id='bti3' class='chkint' value=3 onclick='intlimit(2)' name='intchk[]'
        <?php
        for($i = 0; $i < 6; $i++){
          if((isset($result[0]['interesseusu'.$i]) && $result[0]['interesseusu'.$i] == 'Saúde')){
            echo "checked";
          }
        }
        ?>>
        <label for='bti3' class='interesse3' id='int3'>
          Saúde
        </label>
        <input type="checkbox" id='bti4' class='chkint' value=4 onclick='intlimit(3)' name='intchk[]'
        <?php
        for($i = 0; $i < 6; $i++){
          if((isset($result[0]['interesseusu'.$i]) && $result[0]['interesseusu'.$i] == 'Engenharia')){
            echo "checked";
          }
        }
        ?>>
        <label for='bti4' class='interesse4' id='int4'>
          Engenharia
        </label>
        <input type="checkbox" id='bti5' class='chkint' value=5 onclick='intlimit(4)' name='intchk[]'
        <?php
        for($i = 0; $i < 6; $i++){
          if((isset($result[0]['interesseusu'.$i]) && $result[0]['interesseusu'.$i] == 'Administração e Negócios')){
            echo "checked";
          }
        }
        ?>>
        <label for='bti5' class='interesse5' id='int5'>
          Administração e Negócios
        </label>
        <input type="checkbox" id='bti6' class='chkint' value=6 onclick='intlimit(5)' name='intchk[]'
        <?php
        for($i = 0; $i < 6; $i++){
          if((isset($result[0]['interesseusu'.$i]) && $result[0]['interesseusu'.$i] == 'Comunicação')){
            echo "checked";
          }
        }
        ?>>
        <label for='bti6' class='interesse6' id='int6'>
          Comunicação
        </label>
        <input type="checkbox" id='bti7' class='chkint' value=7 onclick='intlimit(6)' name='intchk[]'
        <?php
        for($i = 0; $i < 6; $i++){
          if((isset($result[0]['interesseusu'.$i]) && $result[0]['interesseusu'.$i] == 'Arte e Design')){
            echo "checked";
          }
        }
        ?>>
        <label for='bti7' class='interesse7' id='int7'>
          Arte e Design
        </label>
        <input type="checkbox" id='bti8' class='chkint' value=8 onclick='intlimit(7)' name='intchk[]'
        <?php
        for($i = 0; $i < 6; $i++){
          if((isset($result[0]['interesseusu'.$i]) && $result[0]['interesseusu'.$i] == 'Direito')){
            echo "checked";
          }
        }
        ?>>
        <label for='bti8' class='interesse8' id='int8'>
          Direito
        </label>
        <input type="checkbox" id='bti9' class='chkint' value=9 onclick='intlimit(8)' name='intchk[]'
        <?php
        for($i = 0; $i < 6; $i++){
          if((isset($result[0]['interesseusu'.$i]) && $result[0]['interesseusu'.$i] == 'Educação')){
            echo "checked";
          }
        }
        ?>>
        <label for='bti9' class='interesse9' id='int9'>
          Educação
        </label>
        <input type="checkbox" id='bti10' class='chkint' value=10 onclick='intlimit(9)' name='intchk[]'
        <?php
        for($i = 0; $i < 6; $i++){
          if((isset($result[0]['interesseusu'.$i]) && $result[0]['interesseusu'.$i] == 'Turismo')){
            echo "checked";
          }
        }
        ?>>
        <label for='bti10' class='interesse10' id='int10'>
          Turismo
        </label>
        <input type="checkbox" id='bti11' class='chkint' value=11 onclick='intlimit(10)' name='intchk[]'
        <?php
        for($i = 0; $i < 6; $i++){
          if((isset($result[0]['interesseusu'.$i]) && $result[0]['interesseusu'.$i] == 'Gastronomia')){
            echo "checked";
          }
        }
        ?>>
        <label for='bti11' class='interesse11' id='int11'>
          Gastronomia
        </label>
        <input type="checkbox" id='bti12' class='chkint' value=12 onclick='intlimit(11)' name='intchk[]'
        <?php
        for($i = 0; $i < 6; $i++){
          if((isset($result[0]['interesseusu'.$i]) && $result[0]['interesseusu'.$i] == 'Ciências Exatas e Biológicas')){
            echo "checked";
          }
        }
        ?>>
        <label for='bti12' class='interesse12' id='int12'>
          Ciências Exatas e Biológicas
        </label>
        <input type="checkbox" id='bti13' class='chkint' value=13 onclick='intlimit(12)' name='intchk[]'
        <?php
        for($i = 0; $i < 6; $i++){
          if((isset($result[0]['interesseusu'.$i]) && $result[0]['interesseusu'.$i] == 'Ciências Sociais e Humanas')){
            echo "checked";
          }
        }
        ?>>
        <label for='bti13' class='interesse13' id='int13'>
          Ciências Sociais e Humanas
        </label>
        <input type="checkbox" id='bti14' class='chkint' value=14 onclick='intlimit(13)' name='intchk[]'
        <?php
        for($i = 0; $i < 6; $i++){
          if((isset($result[0]['interesseusu'.$i]) && $result[0]['interesseusu'.$i] == 'Música')){
            echo "checked";
          }
        }
        ?>>
        <label for='bti14' class='interesse14' id='int14'>
          Música
        </label>
        <input type="checkbox" id='bti15' class='chkint' value=15 onclick='intlimit(14)' name='intchk[]'
        <?php
        $varint[0] = "Informação e Tecnologia";
        $varint[1] = "Logística";
        $varint[2] = "Saúde";
        $varint[3] = "Engenharia";
        $varint[4] = "Administração e Negócios";
        $varint[5] = "Comunicação";
        $varint[6] = "Arte e Design";
        $varint[7] = "Direito";
        $varint[8] = "Educação";
        $varint[9] = "Turismo";
        $varint[10] = "Gastronomia";
        $varint[11] = "Ciências Exatas e Biológicas";
        $varint[12] = "Ciências Sociais e Humanas";
        $varint[13] = "Música";
        $contint = 0;
        for($j = 0; $j < 6; $j++){
          for($i = 0; $i < 14; $i++){
            if((isset($result[0]['interesseusu'.$j])) && ($result[0]['interesseusu'.$j] != $varint[$i])){
              $contint++;
            }
          }
          if($contint == 14){
            echo "checked";
          }
          else {
            $contint = 0;
          }
        }
        ?>>
        <label for='bti15' class='interesse15' id='int15'>
          <input type='text' class='outro' name='int15' placeholder="
          <?php
          $varint[0] = "Informação e Tecnologia";
          $varint[1] = "Logística";
          $varint[2] = "Saúde";
          $varint[3] = "Engenharia";
          $varint[4] = "Administração e Negócios";
          $varint[5] = "Comunicação";
          $varint[6] = "Arte e Design";
          $varint[7] = "Direito";
          $varint[8] = "Educação";
          $varint[9] = "Turismo";
          $varint[10] = "Gastronomia";
          $varint[11] = "Ciências Exatas e Biológicas";
          $varint[12] = "Ciências Sociais e Humanas";
          $varint[13] = "Música";
          $contint = 0;
          for($j = 0; $j < 6; $j++){
            for($i = 0; $i < 14; $i++){
              if((isset($result[0]['interesseusu'.$j])) && ($result[0]['interesseusu'.$j] != $varint[$i])){
                $contint++;
              }
            }
            if($contint == 14){
              echo $result[0]['interesseusu'.$j];
            }
            else {
              $contint = 0;
            }
          }
          ?>">
        </label>
      </div>
      <button type='submit' class='cadastrarint' name='cadastrar' value='cadastrar'>Confirmar</button>
      <br><br>
    </form>

    <?php

    if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true){
      $count = 0;
      $_interesse = $_POST['intchk'];

      $update = "update interesses_usuario set interesseusu1=?, interesseusu2=? , interesseusu3=?, interesseusu4=?, interesseusu5=? where cod_usuario = '{$_SESSION['usuario'][3]}'";

      for($i =0;$i<6;$i++){
        $count++;
        if(isset($_interesse[$i]) && $_interesse[$i] == 1){
          $interesse[$i] = "Informação e Tecnologia";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 2){
          $interesse[$i] = "Logística";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 3){
          $interesse[$i] = "Saúde";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 4){
          $interesse[$i] = "Engenharia";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 5){
          $interesse[$i] = "Administração e Negócios";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 6){
          $interesse[$i] = "Comunicação";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 7){
          $interesse[$i] = "Arte e Design";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 8){
          $interesse[$i] = "Direito";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 9){
          $interesse[$i] = "Educação";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 10){
          $interesse[$i] = "Turismo";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 11){
          $interesse[$i] = "Gastronomia";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 12){
          $interesse[$i] = "Ciências Exatas e Biológicas";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 13){
          $interesse[$i] = "Ciências Sociais e Humanas";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 14){
          $interesse[$i] = "Música";
        }
        else if(isset($_interesse[$i]) && $_interesse[$i] == 15){
          $interesse[$i] = $_POST["int15"];
        }
        else{
          $interesse[$i] = null;
        }
      }

      $stmt=$conn->prepare($update);

      //criando a quantidade de atrelamentos de acordo com a quantidade de interesses selecionados
      for($i=0;$i<$count-1;$i++){
        $stmt->bindValue($i+1, $interesse[$i]);

      }
      $stmt->execute();
      if($stmt->errorCode() != "00000"){
        $erro = "Erro código " . $stmt->errorCode() . ": ";
        $erro .= implode(", ", $stmt->errorInfo());
        echo $erro;
      } //Exibir erro de comunicação com o banco de dados
      else{
        header("Location:painel_usuario.php");
        exit();
      }

    }
    ?>
  </center>
</body>
</html>
