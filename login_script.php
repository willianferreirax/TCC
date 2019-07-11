<?php
		include 'connection.php';
		$conn = conexao();
        session_start();
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        
		$select = "SELECT nome_usuario from usuario where email_usuario = '$login' and senha_usuario = '$senha'";
		
		$res = $conn->prepare($select);//preparando query
        $res->execute();//executando
        
        $result = $res->fetchAll();//pegando todas as linhas da matriz
		foreach($result as $row){
            $_SESSION['usuario'] = $row['nome_usuario'];
        }

        if (count($result) == 1 ){//contando quantas linhas tem, só deve haver 1 usuario com cada combinação de email e senha
            //echo "<script>window.location = 'painel_usuario.php';</script>"; 
            
        }
		else{

            $select = "SELECT nome_inst from faculdade where login_inst = '$login' and senha_inst = '$senha'";
            $res = $conn->prepare($select);//preparando query
            $res->execute();//executando
            $result = $res->fetchAll();

            foreach($result as $row){
                $_SESSION['instituicao'] = $row['nome_inst'];
            }
                if (count($result) == 1 ){
                    echo "<script>window.location = 'painel_inst.php';</script>"; 
                }
                else{
                    header('location:login.php');
                }
                
		}
		
	?>