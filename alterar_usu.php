<!doctype html>
<html lang="pt-br">
  <head>
    <title>Alteração de informações do usuário</title>
    <script language='JavaScript'>
  function blockNumber(objEvent){
    var keycode;
    keycode = objEvent.keyCode;
    if(keycode >= 97 && keycode <= 122){ //Permitir letras
      return true;
    }
    else if(keycode >= 65 && keycode <= 90){ //Permitir letras maiúsculas
      return true;
    }
    else if(keycode == 39 || keycode == 180 || keycode == 94 || keycode == 126|| keycode == 225 || keycode == 233 || keycode == 237 || keycode == 243 || keycode == 250 || keycode == 226 || keycode == 227 || keycode == 234 || keycode == 212 || keycode == 32 || keycode == 231 || keycode == 199){ //Permitir acentuação gráfica
      return true;
    }
    else{
      return false;
    }
  }
  </script>
  </head>
<body>
<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('location:index.php');
    exit();
}
if (isset($_POST['nome_usu'])) {
	

    echo"<form name='alterar_u' method='POST' action='?validar=true'>
   
           <h5>Digite seu nome:</h5><br>
   
           <label><b>Nome:</b></label>
           <br>
           <input type='text' name='nome_usu' placeholder='Novo nome' onkeypress='return blockNumber(event)'>
           <br>
           <br>
           <input type='text' name='sobrenome' placeholder='Sobrenome' onkeypress='return blockNumber(event)'>
       
   
       <input class='btn btn-info' type='submit' name='alterar' value='Alterar'>
   
       <br><br>
   
       <input class='btn btn-danger' type='reset' value='Limpar'>
       <br>
        <a href='painel_usuario.php'>voltar</a>
   
       </form>";
}

elseif($_POST['email_usu']){
    echo"<form name='alterar_u' method='POST' action='?validar=true'>
   
           <h5>Digite o novo email:</h5><br>
   
           <label><b>Email:</b></label>
           <br>
           <input type='email' name='email_usu' placeholder='Novo email'>
           <br>
           
       
   
       <input class='btn btn-info' type='submit' name='alterar' value='Alterar'>
   
       <br><br>
   
       <input class='btn btn-danger' type='reset' value='Limpar'>
       <br>
        <a href='painel_usuario.php'>voltar</a>
   
       </form>";

}

elseif($_POST['senha_usu']){
    echo"<form name='alterar_u' method='POST' action='?validar=true'>
   
           <h5>Digite a nova senha:</h5><br>
   
           <label><b>Senha:</b></label>
           <br>
           <input type='password' name='senha_usu' placeholder='Nova senha'>
           <br>
           <label><b>Confirmar senha:</b></label>
           <br>
           <input type='password' name='confirmar' placeholder='Repita a senha'>
           <br>
       
       <input class='btn btn-info' type='submit' name='alterar' value='Alterar'>
   
       <br><br>
   
       <input class='btn btn-danger' type='reset' value='Limpar'>
       <br>
        <a href='painel_usuario.php'>voltar</a>
   
       </form>";

}
else{
  header('Location : painel_usuario.php');
  exit();
}

if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true){
	
	include "connection.php";
	$conn = conexao();
	
	//declaramos as variáveis se o post correspondente existir (isset) e alteramos o comando sql de acordo com o item que foi escolhido para ser alterado
	

  if(isset($_POST['nome_usu'])){

    if (strlen(utf8_decode($_POST["nome_usu"])) < 1 || strlen(utf8_decode($_POST["nome_usu"])) > 255) {
      $erro = " digite um nome válido.";
      echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
    }
    elseif(strlen(utf8_decode($_POST["sobrenome"])) < 2 || strlen(utf8_decode($_POST["sobrenome"])) > 255){
      $erro = " digite um sobrenome válido.";
      echo "<div class='erro'>Por gentileza,".$erro."</div><br>";
    }
    else{

      $nome_usu = $_POST["nome_usu"];
      $sobrenome = $_POST["sobrenome"];
      $update = "update usuario set nome_usuario = ?,sobrenome_usuario=? where cod_usuario = ? ";
      $res = $conn->prepare($update);
      $res->bindValue(1,$nome_usu);
      $res->bindValue(2,$sobrenome);
      $res->bindValue(3,$_SESSION['usuario'][3]);
      $res->execute();

    }
  }
    
  elseif(isset($_POST['email_usu'])){

    if(!filter_var($_POST["email_usu"], FILTER_VALIDATE_EMAIL)){

      $erro = " digite um email valido.";
      echo "<div class='erro'>Por gentileza,".$erro."</div><br>";

    }
    else{

      $result = $conn->prepare("select * from usuario where email_usuario = '{$email}'"); //Comando de seleção que verifica se há um email igual no banco de dados
      $result->execute(); //Executa o comando

      if($result->fetchColumn() > 0){ //Se retornar mais de 0 resultado, existe um email igual cadastrado
        $erro = "Não é possivel utilizar o email digitado, por favor, insira outro";
        echo "<div class='erro'>".$erro."</div><br>";
      }

      else{

        $email = $_POST['email_usu'];
        $update = "update usuario set email_usuario=? where cod_usuario = ? ";
        $res = $conn->prepare($update);
        $res->bindValue(1,$email);
        $res->bindValue(2,$_SESSION['usuario'][3]);
        $res->execute();
  
      }
    }
 
  }

    elseif(isset($_POST['senha_usu'])){
      if(strlen(utf8_decode($_POST["senha_usu"])) < 8 || strlen(utf8_decode($_POST["senha_usu"])) > 100){
        $erro = " digite uma senha válida (use entre 8 e 100 caracteres).";
        echo "<div class='erro'>".$erro."</div><br>";
      }
      elseif($_POST["senha_usu"] != $_POST["confirmar"]){
        $erro = "Confirmação de senha inválida. Por favor, digite novamente.";
        echo "<div class='erro'>".$erro."</div><br>";
      }
      else{
        $senha = md5($_POST['senha_usu']);
        $update = "update usuario set senha_usuario=? where cod_usuario = ? ";
        $res = $conn->prepare($update);
        $res->bindValue(1,$senha);
        $res->bindValue(2,$_SESSION['usuario'][3]);
        $res->execute();
      }

    }
  }
?>