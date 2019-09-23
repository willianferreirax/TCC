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

  <img src="<?php echo 'upload/'.$evento[1]?>" style="width:200px;height:200px">
  <?php
  echo $evento[6];
  ?>
  <a href="index.php">voltar</a>
      
    
  </body>
</html>