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

    if(isset($_POST['pesquisa'])){
        $pesquisa = $_POST['pesquisa'];//coisas que a pessoa pode buscar
		$pesquisa = '%'.$pesquisa.'%';
		//informações do evento, interesses do evento,instituições especificas
		
		//procurando um evento a partir de suas informações
		$select ="select * from evento where nome_evento like ? or data_inicio like ? or data_termino like ? or hora_inicio like ? or hora_termino like ? or endereco_evento like ? or bairro_evento like ? or cidade_evento like ? or estado_evento like ? or cep_evento like ? or descricao_evento like ?";	
		
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
		$cod_evento="select cod_evento from interesses_evento where interesseve1 like ? or interesseve2 like ? or interesseve3 like ? or interesseve4 like ? or interesseve5 like ? or interesseve6 like ? or interesseve7 like ? or interesseve8 like ? or interesseve9 like ? or interesseve10 like ? or interesseve11 like ? or interesseve12 like ? or interesseve13 like ? or interesseve14 like ? or interesseve15 like ?";
		
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
			$select2='select * from evento where cod_evento=?';
			$res1=$conn->prepare($select2);
			$res1->bindParam(1,$row);
			$res1->execute();
			$result1=$res1->fetchAll();//substitui oq está dentro ou adiciona??
		}
		
		//procurando um evento a partir da instituição que o cadastrou

		$CNPJ="select cnpj from faculdade where nome_inst like ?";
		$res2=$conn->prepare($CNPJ);
		$res2->bindParam(1,$pesquisa);
		$result2=$res2->execute();
		
		
		
		$select3="select * from evento where CNPJ = ?";
		$res2=$conn->prepare($select3);
		$res2->bindParam(1,$result2);
		$res2->execute();
		$result2=$res2->fetchAll();
		
		
		
		
		
    }
    else{

    $res=$conn->prepare("select * from evento");
    $res->execute();

    }
    $result = $res->fetchAll();

   ?>

  <body>
    <?php
   
    foreach ($result as $row) {
        $imagem ='upload/'.$row['banner_evento'];
        echo "<ul>
            <li>
            <img src='$imagem'>
            <a href='exibir_evento.php?id= $row[cod_evento]'> $row[nome_evento]</a>
            </li>
            </ul>";
       
    }
	
	
	foreach ($result1 as $row) {
        $imagem ='upload/'.$row['banner_evento'];
        echo "<ul>
            <li>
            <img src='$imagem'>
            <a href='exibir_evento.php?id= $row[cod_evento]'> $row[nome_evento]</a>
            </li>
            </ul>";
       
    }
	
	foreach ($result2 as $row) {
        $imagem ='upload/'.$row['banner_evento'];
        echo "<ul>
            <li>
            <img src='$imagem'>
            <a href='exibir_evento.php?id= $row[cod_evento]'> $row[nome_evento]</a>
            </li>
            </ul>";
       
    }
    
    ?>
    
  </body>
</html>