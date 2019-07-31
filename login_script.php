<?php
		include 'connection.php';
		$conn = conexao();
        session_start();
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        
		$select = "SELECT nome_usuario,email_usuario,senha_usuario from usuario where email_usuario = '$login' and senha_usuario = '$senha'";
		
		$res = $conn->prepare($select);//preparando query
        $res->execute();//executando
        
        $result = $res->fetchAll();//pegando todas as linhas da matriz

        if (count($result) == 1 ){//contando quantas linhas tem, só deve haver 1 usuario com cada combinação de email e senha
            $session=array();
            foreach($result as $row){
              array_push($session,$row['nome_usuario']);//o array do SESSION terá na posição 0, o nome do usuario
              array_push($session,$row['email_usuario']);//o array do SESSION terá na posição 1, o email do usuario
              array_push($session,$row['senha_usuario']);//o array do SESSION terá na posição 1, a senha do usuario
            }
            header('Location: painel_usuario.php');
            $_SESSION['usuario']=$session;//inserindo o array na variavel global _SESSION
        }
		else{

            $select = "SELECT nome_inst,email_inst,senha_inst from faculdade where login_inst = '$login' and senha_inst = '$senha'";
            $res = $conn->prepare($select);//preparando query
            $res->execute();//executando
            $result = $res->fetchAll();
            
            if (count($result) == 1 ){
                $session=array();
                foreach($result as $row){
                    array_push($session,$row['nome_inst']);//o array do SESSION terá na posição 0, o nome da instituição
                    array_push($session,$row['email_inst']);//o array do SESSION terá na posição 1, o email da instituição
                    array_push($session,$row['senha_inst']);//o array do SESSION terá na posição 1, a senha da instituição
                }
                header('Location: painel_inst.php');
                $_SESSION['instituicao']=$session;
            }
            else{
                header('location:login.php');
            }
                
		}
		
	?>