<!doctype html>
<html lang="pt-br">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>

    <?php
    include 'connection.php';
    $conn = conexao();

   
		$select ="select CNPJ,nome_inst from faculdade";	
        $res=$conn->prepare($select);
        $res->execute();

        $result = $res->fetchAll();
        foreach ($result as $row) {
            echo "<ul>
                <li>
                <a href='exibir_inst.php?id= $row[CNPJ]'> $row[nome_inst]</a>
                </li>
                </ul>";
           
        }
    ?>
</html>