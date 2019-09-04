<!doctype html>
<html lang="pt-br">
<head>
  <title>Junte-se ao FRESHR</title>
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

  <div class="containerform">

    <?php
    include 'connection.php';
		$conn = conexao();
    session_start();
    $verificaint = array();
    $select = "SELECT interesseusu1, interesseusu2, interesseusu3, interesseusu4, interesseusu5 from interesses_usuario where cod_usuario = '{$_SESSION['usuario'][3]}'";
    $res = $conn->prepare($select);//preparando query
    $res->execute();//executando
    $result = $res->fetchAll();//pegando todas as linhas da matriz
    $_SESSION['verificationint'] = $verificaint;
    foreach($result as $row){
      array_push($verificaint, $row['interesseusu1']);
      array_push($verificaint, $row['interesseusu2']);
      array_push($verificaint, $row['interesseusu3']);
      array_push($verificaint, $row['interesseusu4']);
      array_push($verificaint, $row['interesseusu5']);
    }
    if(isset($verificaint[0]) || isset($verificaint[1]) || isset($verificaint[2]) || isset($verificaint[3]) || isset($verificaint[4])){
      header('Location: painel_usuario.php');
    }
		if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true){
			$_interesse = $_POST['intchk'];
      //RECOLHENDO O INTERESSE1
			if(isset($_interesse[0]) && $_interesse[0] == 1){
        $interesse1 = "Informação e Tecnologia";
      }
      else if(isset($_interesse[0]) && $_interesse[0] == 2){
        $interesse1 = "Logística";
      }
      else if(isset($_interesse[0]) && $_interesse[0] == 3){
        $interesse1 = "Saúde";
      }
      else if(isset($_interesse[0]) && $_interesse[0] == 4){
        $interesse1 = "Engenharia";
      }
      else if(isset($_interesse[0]) && $_interesse[0] == 5){
        $interesse1 = "Administração e Negócios";
      }
      else if(isset($_interesse[0]) && $_interesse[0] == 6){
        $interesse1 = "Comunicação";
      }
      else if(isset($_interesse[0]) && $_interesse[0] == 7){
        $interesse1 = "Arte e Design";
      }
      else if(isset($_interesse[0]) && $_interesse[0] == 8){
        $interesse1 = "Direito";
      }
      else if(isset($_interesse[0]) && $_interesse[0] == 9){
        $interesse1 = "Educação";
      }
      else if(isset($_interesse[0]) && $_interesse[0] == 10){
        $interesse1 = "Turismo";
      }
      else if(isset($_interesse[0]) && $_interesse[0] == 11){
        $interesse1 = "Gastronomia";
      }
      else if(isset($_interesse[0]) && $_interesse[0] == 12){
        $interesse1 = "Ciências Exatas e Biológicas";
      }
      else if(isset($_interesse[0]) && $_interesse[0] == 13){
        $interesse1 = "Ciências Sociais e Humanas";
      }
      else if(isset($_interesse[0]) && $_interesse[0] == 14){
        $interesse1 = "Música";
      }
      else if(isset($_interesse[0]) && $_interesse[0] == 15){
        $interesse1 = $_POST["int15"];
      }
      else{
        $interesse1 = null;
      }
      //RECOLHENDO O INTERESSE2
      if(isset($_interesse[1]) && $_interesse[1] == 1){
        $interesse2 = "Informação e Tecnologia";
      }
      else if(isset($_interesse[1]) && $_interesse[1] == 2){
        $interesse2 = "Logística";
      }
      else if(isset($_interesse[1]) && $_interesse[1] == 3){
        $interesse2 = "Saúde";
      }
      else if(isset($_interesse[1]) && $_interesse[1] == 4){
        $interesse2 = "Engenharia";
      }
      else if(isset($_interesse[1]) && $_interesse[1] == 5){
        $interesse2 = "Administração e Negócios";
      }
      else if(isset($_interesse[1]) && $_interesse[1] == 6){
        $interesse2 = "Comunicação";
      }
      else if(isset($_interesse[1]) && $_interesse[1] == 7){
        $interesse2 = "Arte e Design";
      }
      else if(isset($_interesse[1]) && $_interesse[1] == 8){
        $interesse2 = "Direito";
      }
      else if(isset($_interesse[1]) && $_interesse[1] == 9){
        $interesse2 = "Educação";
      }
      else if(isset($_interesse[1]) && $_interesse[1] == 10){
        $interesse2 = "Turismo";
      }
      else if(isset($_interesse[1]) && $_interesse[1] == 11){
        $interesse2 = "Gastronomia";
      }
      else if(isset($_interesse[1]) && $_interesse[1] == 12){
        $interesse2 = "Ciências Exatas e Biológicas";
      }
      else if(isset($_interesse[1]) && $_interesse[1] == 13){
        $interesse2 = "Ciências Sociais e Humanas";
      }
      else if(isset($_interesse[1]) && $_interesse[1] == 14){
        $interesse2 = "Música";
      }
      else if(isset($_interesse[1]) && $_interesse[1] == 15){
        $interesse2 = $_POST["int15"];
      }
      else{
        $interesse2 = null;
      }
      //RECOLHENDO O INTERESSE3
      if(isset($_interesse[2]) && $_interesse[2] == 1){
        $interesse3 = "Informação e Tecnologia";
      }
      else if(isset($_interesse[2]) && $_interesse[2] == 2){
        $interesse3 = "Logística";
      }
      else if(isset($_interesse[2]) && $_interesse[2] == 3){
        $interesse3 = "Saúde";
      }
      else if(isset($_interesse[2]) && $_interesse[2] == 4){
        $interesse3 = "Engenharia";
      }
      else if(isset($_interesse[2]) && $_interesse[2] == 5){
        $interesse3 = "Administração e Negócios";
      }
      else if(isset($_interesse[2]) && $_interesse[2] == 6){
        $interesse3 = "Comunicação";
      }
      else if(isset($_interesse[2]) && $_interesse[2] == 7){
        $interesse3 = "Arte e Design";
      }
      else if(isset($_interesse[2]) && $_interesse[2] == 8){
        $interesse3 = "Direito";
      }
      else if(isset($_interesse[2]) && $_interesse[2] == 9){
        $interesse3 = "Educação";
      }
      else if(isset($_interesse[2]) && $_interesse[2] == 10){
        $interesse3 = "Turismo";
      }
      else if(isset($_interesse[2]) && $_interesse[2] == 11){
        $interesse3 = "Gastronomia";
      }
      else if(isset($_interesse[2]) && $_interesse[2] == 12){
        $interesse3 = "Ciências Exatas e Biológicas";
      }
      else if(isset($_interesse[2]) && $_interesse[2] == 13){
        $interesse3 = "Ciências Sociais e Humanas";
      }
      else if(isset($_interesse[2]) && $_interesse[2] == 14){
        $interesse3 = "Música";
      }
      else if(isset($_interesse[2]) && $_interesse[2] == 15){
        $interesse3 = $_POST["int15"];
      }
      else{
        $interesse3 = null;
      }
      //RECOLHENDO O INTERESSE4
      if(isset($_interesse[3]) && $_interesse[3] == 1){
        $interesse4 = "Informação e Tecnologia";
      }
      else if(isset($_interesse[3]) && $_interesse[3] == 2){
        $interesse4 = "Logística";
      }
      else if(isset($_interesse[3]) && $_interesse[3] == 3){
        $interesse4 = "Saúde";
      }
      else if(isset($_interesse[3]) && $_interesse[3] == 4){
        $interesse4 = "Engenharia";
      }
      else if(isset($_interesse[3]) && $_interesse[3] == 5){
        $interesse4 = "Administração e Negócios";
      }
      else if(isset($_interesse[3]) && $_interesse[3] == 6){
        $interesse4 = "Comunicação";
      }
      else if(isset($_interesse[3]) && $_interesse[3] == 7){
        $interesse4 = "Arte e Design";
      }
      else if(isset($_interesse[3]) && $_interesse[3] == 8){
        $interesse4 = "Direito";
      }
      else if(isset($_interesse[3]) && $_interesse[3] == 9){
        $interesse4 = "Educação";
      }
      else if(isset($_interesse[3]) && $_interesse[3] == 10){
        $interesse4 = "Turismo";
      }
      else if(isset($_interesse[3]) && $_interesse[3] == 11){
        $interesse4 = "Gastronomia";
      }
      else if(isset($_interesse[3]) && $_interesse[3] == 12){
        $interesse4 = "Ciências Exatas e Biológicas";
      }
      else if(isset($_interesse[3]) && $_interesse[3] == 13){
        $interesse4 = "Ciências Sociais e Humanas";
      }
      else if(isset($_interesse[3]) && $_interesse[3] == 14){
        $interesse4 = "Música";
      }
      else if(isset($_interesse[3]) && $_interesse[3] == 15){
        $interesse4 = $_POST["int15"];
      }
      else{
        $interesse4 = null;
      }
      //RECOLHENDO O INTERESSE5
      if(isset($_interesse[4]) && $_interesse[4] == 1){
        $interesse5 = "Informação e Tecnologia";
      }
      else if(isset($_interesse[4]) && $_interesse[4] == 2){
        $interesse5 = "Logística";
      }
      else if(isset($_interesse[4]) && $_interesse[4] == 3){
        $interesse5 = "Saúde";
      }
      else if(isset($_interesse[4]) && $_interesse[4] == 4){
        $interesse5 = "Engenharia";
      }
      else if(isset($_interesse[4]) && $_interesse[4] == 5){
        $interesse5 = "Administração e Negócios";
      }
      else if(isset($_interesse[4]) && $_interesse[4] == 6){
        $interesse5 = "Comunicação";
      }
      else if(isset($_interesse[4]) && $_interesse[4] == 7){
        $interesse5 = "Arte e Design";
      }
      else if(isset($_interesse[4]) && $_interesse[4] == 8){
        $interesse5 = "Direito";
      }
      else if(isset($_interesse[4]) && $_interesse[4] == 9){
        $interesse5 = "Educação";
      }
      else if(isset($_interesse[4]) && $_interesse[4] == 10){
        $interesse5 = "Turismo";
      }
      else if(isset($_interesse[4]) && $_interesse[4] == 11){
        $interesse5 = "Gastronomia";
      }
      else if(isset($_interesse[4]) && $_interesse[4] == 12){
        $interesse5 = "Ciências Exatas e Biológicas";
      }
      else if(isset($_interesse[4]) && $_interesse[4] == 13){
        $interesse5 = "Ciências Sociais e Humanas";
      }
      else if(isset($_interesse[4]) && $_interesse[4] == 14){
        $interesse5 = "Música";
      }
      else if(isset($_interesse[4]) && $_interesse[4] == 15){
        $interesse5 = $_POST["int15"];
      }
      else{
        $interesse5 = null;
      }
          $sql = "INSERT INTO interesses_usuario
          (interesseusu1, interesseusu2, interesseusu3, interesseusu4, interesseusu5, cod_usuario)
          VALUES (?, ?, ?, ?, ?, ?)";
          $stmt = $conn->prepare($sql);
          //Atrelando os dados às tabelas
          if($interesse1 != null){
            $stmt->bindValue(1, $interesse1);
          }
          else{
            $stmt->bindValue(1, null);
          }
          if($interesse2 != null){
            $stmt->bindValue(2, $interesse2);
          }
          else{
            $stmt->bindValue(2, null);
          }
          if($interesse3 != null){
            $stmt->bindValue(3, $interesse3);
          }
          else{
            $stmt->bindValue(3, null);
          }
          if($interesse4 != null){
            $stmt->bindValue(4, $interesse4);
          }
          else{
            $stmt->bindValue(4, null);
          }
          if($interesse5 != null){
            $stmt->bindValue(5, $interesse5);
          }
          else{
            $stmt->bindValue(5, null);
          }
          $stmt->bindValue(6, $_SESSION['usuario'][3]);
          $stmt->execute();
          if($stmt->errorCode() != "00000"){
            //$erro = "Erro código " . $stmt->errorCode() . ": ";
            //$erro .= implode(", ", $stmt->errorInfo());
            //echo $erro;
            header('Location: selec_interesse.php');
          } //Exibir erro de comunicação com o banco de dados
          else{
            header('Location: painel_usuario.php');
          }
        }
    ?>

    <form name='cadastro_uso' method="POST" action="?validar=true">
      <label class='labelintere'>Agora, nos diga quais <b>áreas</b> você se interessa?<br><b>Selecione 5</b></label><br>

      <div class='interesses'>

        <input type="checkbox" id='bti1' class='chkint' value=1 onclick='intlimit(0)' name='intchk[]'>
        <label for='bti1' class='interesse' id='int1'>

          Informação e Tecnologia
        </label>
        <input type="checkbox" id='bti2' class='chkint' value=2 onclick='intlimit(1)' name='intchk[]'>
        <label for='bti2' class='interesse' id='int2'>
          Logística
        </label>
        <input type="checkbox" id='bti3' class='chkint' value=3 onclick='intlimit(2)' name='intchk[]'>
        <label for='bti3' class='interesse' id='int3'>
          Saúde
        </label>
        <input type="checkbox" id='bti4' class='chkint' value=4 onclick='intlimit(3)' name='intchk[]'>
        <label for='bti4' class='interesse' id='int4'>
          Engenharia
        </label>
        <input type="checkbox" id='bti5' class='chkint' value=5 onclick='intlimit(4)' name='intchk[]'>
        <label for='bti5' class='interesse' id='int5'>
          Administração e Negócios
        </label>
        <input type="checkbox" id='bti6' class='chkint' value=6 onclick='intlimit(5)' name='intchk[]'>
        <label for='bti6' class='interesse' id='int6'>
          Comunicação
        </label>
        <input type="checkbox" id='bti7' class='chkint' value=7 onclick='intlimit(6)' name='intchk[]'>
        <label for='bti7' class='interesse' id='int7'>
          Arte e Design
        </label>
        <input type="checkbox" id='bti8' class='chkint' value=8 onclick='intlimit(7)' name='intchk[]'>
        <label for='bti8' class='interesse' id='int8'>
          Direito
        </label>
        <input type="checkbox" id='bti9' class='chkint' value=9 onclick='intlimit(8)' name='intchk[]'>
        <label for='bti9' class='interesse' id='int9'>
          Educação
        </label>
        <input type="checkbox" id='bti10' class='chkint' value=10 onclick='intlimit(9)' name='intchk[]'>
        <label for='bti10' class='interesse' id='int10'>
          Turismo
        </label>
        <input type="checkbox" id='bti11' class='chkint' value=11 onclick='intlimit(10)' name='intchk[]'>
        <label for='bti11' class='interesse' id='int11'>
          Gastronomia
        </label>
        <input type="checkbox" id='bti12' class='chkint' value=12 onclick='intlimit(11)' name='intchk[]'>
        <label for='bti12' class='interesse' id='int12'>
          Ciências Exatas e Biológicas
        </label>
        <input type="checkbox" id='bti13' class='chkint' value=13 onclick='intlimit(12)' name='intchk[]'>
        <label for='bti13' class='interesse' id='int13'>
          Ciências Sociais e Humanas
        </label>
        <input type="checkbox" id='bti14' class='chkint' value=14 onclick='intlimit(13)' name='intchk[]'>
        <label for='bti14' class='interesse' id='int14'>
          Música
        </label>
        <input type="checkbox" id='bti15' class='chkint' value=15 onclick='intlimit(14)' name='intchk[]'>
        <label for='bti15' class='interesse' id='int15'>
          <input type='text' class='outro' name='int15' placeholder="Outro">
        </label>
      </div>
      <button type='submit' class='cadastrar' name='cadastrar' value='cadastrar'>Cadastrar</button>
      <br><br>
    </form>
  </div>

</center>
</body>
</html>
