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
	$result1=array();
	$result2=array();
	
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
		$cod_evento="select cod_evento from interesses_evento where interesseeve1 like ? or interesseeve2 like ? or interesseeve3 like ? or interesseeve4 like ? or interesseeve5 like ? or interesseeve6 like ? or interesseeve7 like ? or interesseeve8 like ? or interesseeve9 like ? or interesseeve10 like ? or interesseeve11 like ? or interesseeve12 like ? or interesseeve13 like ? or interesseeve14 like ? or interesseeve15 like ?";
		
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
			$res1->bindParam(1,$row['cod_evento']);
			$res1->execute();
			$result1=$res1->fetchAll();//substitui oq está dentro ou adiciona??
		}
		
		//procurando um evento a partir da instituição que o cadastrou

		$CNPJ="select CNPJ from faculdade where nome_inst like ?";
		$res2=$conn->prepare($CNPJ);
		$res2->bindParam(1,$pesquisa);
		$res2->execute();
		$result2=$res2->fetchAll();
		
		foreach($result2 as $row){
		$select3="select * from evento where CNPJ = ?";
		$res2=$conn->prepare($select3);
		$res2->bindParam(1,$row['CNPJ']);
		$res2->execute();
		$result2=$res2->fetchAll();
		}
		
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
            <a href='exibir_evento.php?id= $row[cod_evento]'> <img src='$imagem' style='width:100px; height:100px' alt='$row[nome_evento]'></a>
            </li>
            </ul>";
       
    }
	
	
	foreach ($result1 as $row) {
        $imagem ='upload/'.$row['banner_evento'];
        echo "<ul>
            <li>
            <a href='exibir_evento.php?id= $row[cod_evento]'> <img src='$imagem' style='width:100px; height:100px' alt='$row[nome_evento]'></a>
            </li>
            </ul>";
       
    }
	
	foreach ($result2 as $row) {
        $imagem ='upload/'.$row['banner_evento'];
        echo "<ul>
            <li>
            <a href='exibir_evento.php?id= $row[cod_evento]'> <img src='$imagem' style='width:100px; height:100px' alt='$row[nome_evento]'></a>
            </li>
            </ul>";
       
    }
    
    ?>
    
  </body>
</html>