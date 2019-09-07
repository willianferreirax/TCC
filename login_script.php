<?php
		include 'connection.php';
		$conn = conexao();
        session_start();
        $login = $_POST['login'];
        $senha = md5($_POST['senha']);


		$select = "SELECT cod_usuario,nome_usuario,email_usuario,senha_usuario, sobrenome_usuario from usuario where login_usuario = '$login' and senha_usuario = '$senha'";

		$res = $conn->prepare($select);//preparando query
        $res->execute();//executando

        $result = $res->fetchAll();//pegando todas as linhas da matriz

        if (count($result) == 1 ){//contando quantas linhas tem, só deve haver 1 usuario com cada combinação de email e senha
            $session=array();
            foreach($result as $row){
              array_push($session,$row['nome_usuario']);//o array do SESSION terá na posição 0, o nome do usuario
              array_push($session,$row['email_usuario']);//o array do SESSION terá na posição 1, o email do usuario
              array_push($session,$row['senha_usuario']);//o array do SESSION terá na posição 2, a senha do usuario
			  			array_push($session,$row['cod_usuario']);//o array do SESSION terá na posição 3, o codigo do usuario
							array_push($session,$row['sobrenome_usuario']);//o array do SESSION terá na posição , o sobrenome do usuario
            }
            header('Location: select_interesse.php');
            $_SESSION['usuario']=$session;//inserindo o array na variavel global _SESSION
        }
		else{

            $select = "SELECT CNPJ,nome_inst,email_inst,senha_inst from faculdade where login_inst = '$login' and senha_inst = '$senha'";
            $res = $conn->prepare($select);//preparando query
            $res->execute();//executando
            $result = $res->fetchAll();

            if (count($result) == 1 ){
                $session=array();
                foreach($result as $row){
                    array_push($session,$row['nome_inst']);//o array do SESSION terá na posição 0, o nome da instituição
                    array_push($session,$row['email_inst']);//o array do SESSION terá na posição 1, o email da instituição
                    array_push($session,$row['senha_inst']);//o array do SESSION terá na posição 2, a senha da instituição
					array_push($session,$row['CNPJ']);//o array do SESSION terá na posição 3, o CNPJ da instituicao
                }
                header('Location: painel_inst.php');
                $_SESSION['instituicao']=$session;
            }
            else{
                header('location:login.php');
            }

		}

	?>
