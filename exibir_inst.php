<?php
if(isset($_GET['id'])){
    include "connection.php";
    $conn = conexao();
    $id = $_GET['id'];

    $select= "select nome_inst,endereco_inst,bairro_inst,cidade_inst,estado_inst,cep_inst,email_inst,telefone_inst from faculdade where CNPJ = $id";
    $res = $conn->prepare($select);
    $res->execute();
    $result=$res->fetchAll();

    $faculdade = array();
    foreach ($result as $row) {
      array_push($faculdade,$row['nome_inst']);
      array_push($faculdade,$row['endereco_inst']);
      array_push($faculdade,$row['bairro_inst']);
      array_push($faculdade,$row['cidade_inst']);
      array_push($faculdade,$row['estado_inst']);
      array_push($faculdade,$row['cep_inst']);
      array_push($faculdade,$row['email_inst']);
      array_push($faculdade,$row['telefone_inst']);
    }
}
else{
    header('Location:index.php');
}
    

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <?php
  
  echo $faculdade[6];
  ?>
<br>
<a href="index.php">voltar</a>
      
    
  </body>
</html>