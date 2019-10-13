<?php
if(!$_SESSION['usuario']){
    header('Location:index.php');
    exit();
}
?>
<html>
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
<?php
    include 'connection.php';
		$conn = conexao();
    session_start();
    $verificaint = array();
    $select = "SELECT interesseusu1, interesseusu2, interesseusu3, interesseusu4, interesseusu5 from interesses_usuario where cod_usuario = '{$_SESSION['usuario'][3]}'";
    $res = $conn->prepare($select);//preparando query
    $res->execute();//executando
    $result = $res->fetchAll();//pegando todas as linhas da matriz
   
    

    echo "
    <form name='alterar_interesses' method='POST' action='?validar=true'>
    <label class='labelintere'>Selecione quais são as suas<b>áreas de interesses</b>. Selecione <b>5 somente</b></label>
    <div class='interesses'>";
    $count = 0;
    for($i =1;$i<6;$i++){
        $count++;

    if($result[0]['interesseusu'.$i]=='Informação e Tecnologia'){
        echo"
        <input type='checkbox' id='bti1' class='chkint' value=1  onclick='intlimit(0)' name='intchk[]' checked>
        <label for='bti1' class='interesse1' id='int1'>

            Informação e Tecnologia
        </label>";


    }
    if($result[0]['interesseusu'.$i]=='Logística'){
        echo"
        <input type='checkbox' id='bti2' class='chkint' value=2  onclick='intlimit(1)' name='intchk[]' checked>
		<label for='bti2' class='interesse2' id='int2'>
			Logística
		</label>";

    }

    elseif($result[0]['interesseusu'.$i]=='Saúde'){
        echo"
        <input type='checkbox' id='bti3' class='chkint' value=3  onclick='intlimit(2)' name='intchk[]' checked>
        <label for='bti3' class='interesse3' id='int3'>
            Saúde
        </label>";

    }

    elseif($result[0]['interesseusu'.$i]=='Engenharia'){
        echo"
        <input type='checkbox' id='bti4' class='chkint' value=4  onclick='intlimit(3)' name='intchk[]' checked>
        <label for='bti4' class='interesse4' id='int4'>
            Engenharia
        </label>";

    }
    elseif($result[0]['interesseusu'.$i]=='Administração e Negócios'){
        echo"
        <input type='checkbox' id='bti5' class='chkint' value=5  onclick='intlimit(4)' name='intchk[]' checked>
        <label for='bti5' class='interesse5' id='int5'>
            Administração e Negócios
        </label>";

    }
    elseif($result[0]['interesseusu'.$i]=='Comunicação'){
        echo"
        <input type='checkbox' id='bti6' class='chkint' value=6  onclick='intlimit(5)' name='intchk[]' checked>
        <label for='bti6' class='interesse6' id='int6'>
            Comunicação
        </label>";

    }
    elseif($result[0]['interesseusu'.$i]=='Arte e Design'){
        echo"
        <input type='checkbox' id='bti7' class='chkint' value=7  onclick='intlimit(6)' name='intchk[]' checked>
        <label for='bti7' class='interesse7' id='int7'>
            Arte e Design
        </label>";

    }
    elseif($result[0]['interesseusu'.$i]=='Direito'){
        echo"
        <input type='checkbox' id='bti8' class='chkint' value=8  onclick='intlimit(7)' name='intchk[]' checked>
        <label for='bti8' class='interesse8' id='int8'>
            Direito
        </label>";

    }
    elseif($result[0]['interesseusu'.$i]=='Educação'){
        echo"
        <input type='checkbox' id='bti9' class='chkint' value=9  onclick='intlimit(8)'name='intchk[]' checked>
        <label for='bti9' class='interesse9' id='int9'>
            Educação
        </label>";

    }
    elseif($result[0]['interesseusu'.$i]=='Turismo'){
        echo"
        <input type='checkbox' id='bti10' class='chkint' value=10  onclick='intlimit(9)' name='intchk[]' checked>
        <label for='bti10' class='interesse10' id='int10'>
            Turismo
        </label>";

    }
    elseif($result[0]['interesseusu'.$i]=='Gastronomia'){
        echo"
        <input type='checkbox' id='bti11' class='chkint' value=11  onclick='intlimit(10)' name='intchk[]' checked>
        <label for='bti11' class='interesse11' id='int11'>
            Gastronomia
        </label>";

    }
    elseif($result[0]['interesseusu'.$i]=='Ciências Exatas e Biológicas'){
        echo"
        <input type='checkbox' id='bti12' class='chkint' value=12  onclick='intlimit(11)' name='intchk[]' checked>
        <label for='bti12' class='interesse12' id='int12'>
            Ciências Exatas e Biológicas
        </label>";

    }
    elseif($result[0]['interesseusu'.$i]=='Ciências Sociais e Humanas'){
        echo"
        <input type='checkbox' id='bti13' class='chkint' value=13 ' onclick='intlimit(12)' name='intchk[]' checked>
        <label for='bti13' class='interesse13' id='int13'>
            Ciências Sociais e Humanas
        </label>";

    }
    elseif($result[0]['interesseusu'.$i]=='Música'){
        echo"
        <input type='checkbox' id='bti14' class='chkint' value=14 onclick='intlimit(13)' name='intchk[]' checked>
        <label for='bti14' class='interesse14' id='int14'>
            Música
        </label>";

    }
    elseif($result[0]['interesseusu'.$i]!='Música' && $result[0]['interesseusu'.$i]!='Informação e Tecnologia' &&$result[0]['interesseusu'.$i]!='Logística' &&$result[0]['interesseusu'.$i]!='Saúde' &&$result[0]['interesseusu'.$i]!='Engenharia' &&$result[0]['interesseusu'.$i]!='Administração e Negócios' && $result[0]['interesseusu'.$i]!='Comunicação' &&$result[0]['interesseusu'.$i]!='Arte e Design' &&$result[0]['interesseusu'.$i]!='Direito' && $result[0]['interesseusu'.$i]!='Educação' && $result[0]['interesseusu'.$i]!='Turismo' && $result[0]['interesseusu'.$i]!='Gastronomia' && $result[0]['interesseusu'.$i]!='Ciências Exatas e Biológicas' && $result[0]['interesseusu'.$i]!='Ciências Sociais e Humanas'){
        echo"
        <input type='checkbox' id='bti15' class='chkint' value=15  onclick='intlimit(14)' name='intchk[]' checked>
		<label for='bti15' class='interesse15' id='int15'>
		    <input type='text' class='outro' name='int15' value = <?php echo $result[0]['interesseusu'.$i];?>>
		</label>";

    }
    }
    //criando os checkbox que não foram são foram selecionados pelo usuario antes
    ?>
    
    <script type='text/javascript'>
    
        if(!document.getElementById('bti1')){
            document.write("<input type='checkbox' id='bti1' class='chkint' onclick='intlimit(0)' value=1  name='intchk[]'> ");
            document.write("<label for='bti1' class='interesse1' id='int1'>Informação e Tecnologia </label>");
        }
        if(!document.getElementById('bti2')){
            document.write("<input type='checkbox' id='bti2' class='chkint' onclick='intlimit(1)' value=2  name='intchk[]'> ");
            document.write("<label for='bti2' class='interesse2' id='int2'>Logística </label>");
        }
        if(!document.getElementById('bti3')){
            document.write("<input type='checkbox' id='bti3' class='chkint' onclick='intlimit(2)' value=3  name='intchk[]'> ");
            document.write("<label for='bti3' class='interesse3' id='int3'>Saúde </label>");
        }
        if(!document.getElementById('bti4')){
            document.write("<input type='checkbox' id='bti4' class='chkint' onclick='intlimit(3)' value=4  name='intchk[]'> ");
            document.write("<label for='bti4' class='interesse4' id='int4'>Engenharia </label>");
        }
        if(!document.getElementById('bti5')){
            document.write("<input type='checkbox' id='bti5' class='chkint' onclick='intlimit(4)' value=5  name='intchk[]'> ");
            document.write("<label for='bti5' class='interesse5' id='int5'>Administração e Negócios </label>");
        }
        
        if(!document.getElementById('bti6')){
            document.write("<input type='checkbox' id='bti6' class='chkint' onclick='intlimit(5)' value=6  name='intchk[]'> ");
            document.write("<label for='bti6' class='interesse6' id='int6'>Comunicação </label>");
        }
        
        if(!document.getElementById('bti7')){
            document.write("<input type='checkbox' id='bti7' class='chkint' onclick='intlimit(6)' value=7  name='intchk[]'> ");
            document.write("<label for='bti7' class='interesse7' id='int7'>Arte e Design </label>");
        }
        
        if(!document.getElementById('bti8')){
            document.write("<input type='checkbox' id='bti8' class='chkint' onclick='intlimit(7)' value=8  name='intchk[]'> ");
            document.write("<label for='bti8' class='interesse8' id='int8'>Direito </label>");
        }
        
        if(!document.getElementById('bti9')){
            document.write("<input type='checkbox' id='bti9' class='chkint' onclick='intlimit(8)' value=9  name='intchk[]'> ");
            document.write("<label for='bti9' class='interesse1' id='int9'>Educação </label>");
        }
        
        if(!document.getElementById('bti10')){
            document.write("<input type='checkbox' id='bti10' class='chkint' onclick='intlimit(9)' value=10  name='intchk[]'> ");
            document.write("<label for='bti10' class='interesse10' id='int10'>Turismo </label>");
        }

        if(!document.getElementById('bti11')){
            document.write("<input type='checkbox' id='bti11' class='chkint' onclick='intlimit(10)' value=11  name='intchk[]'> ");
            document.write("<label for='bti11' class='interesse11' id='int11'>Gastronomia </label>");
        }

        if(!document.getElementById('bti12')){
            document.write("<input type='checkbox' id='bti12' class='chkint' onclick='intlimit(11)' value=12  name='intchk[]'> ");
            document.write("<label for='bti12' class='interesse1' id='int12'>Ciências Exatas e Biológicas </label>");
        }

        if(!document.getElementById('bti13')){
            document.write("<input type='checkbox' id='bti13' class='chkint' onclick='intlimit(12)' value=13  name='intchk[]'> ");
            document.write("<label for='bti13' class='interesse13' id='int13'>Ciências Sociais e Humanas </label>");
        }

        if(!document.getElementById('bti14')){
            document.write("<input type='checkbox' id='bti14' class='chkint' onclick='intlimit(13)' value=14  name='intchk[]'> ");
            document.write("<label for='bti14' class='interesse14' id='int14'>Música </label>");
        }
        
        if(!document.getElementById('bti15')){
            document.write("<input type='checkbox' id='bti15' class='chkint' onclick='intlimit(14)' value=15  name='intchk[]'> ");
            document.write("<label for='bti15' class='interesse15' id='int15'>");
            document.wrtie("<input type='text' class='outro' name='int15' placeholder='Outro'> </label");
            
        }

    </script>

    </div>
    <div class='btnext'><a href='eventinfo.php'><button class='prox'>Alterar</button></a></div>
    
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
        }

    }
?>
</html>