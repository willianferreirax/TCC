<?php
  
  session_start();
  if(!$_SESSION['instituicao'] || !$_GET['id_eve']){
    header('location:login.php');
    exit();
  }
  else{
    include 'connection.php';
    $delete="delete from evento where cod_evento = {$_GET['id_eve']}";
    $conn=conexao();
    $res = $conn->prepare($delete);//preparando query
    $res->execute();//executando

    //deletando da tabela interesses
    
    $delete="delete from interesses_evento where cod_evento = {$_GET['id_eve']}";
    
    $res = $conn->prepare($delete);//preparando query
    $res->execute();//executando

  }
?>

    <script language='javascript'>
        alert('Evento excluido com sucesso');
        
    </script>
    <?php
    header("Location: painel_inst.php");
    ?>
    