<!doctype html>
<html lang="pt-br">
  <head>
    <title>Junte-se ao FRESHR</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <div class="container">
            
    <form name='cadastro_uso' method="POST" action="?validar=true">

    <label><b>Nome:</b></label>
    <br>
    <input type="text" name="nome" placeholder='Nome'>
	 <input type="text" name="sobrenome" placeholder='Sobrenome'>
    <br>
    <br>

   <label><b>Endereço de e-mail:</b></label>
    <br>
    <input type="email" name="email" placeholder='exemplo@exemplo.com'>
    <br>
    <br>

    <label><b>Senha:</b></label>
    <br>
    <input type="password" name="senha" placeholder='Nova senha'>
    <br>
    <br>

    <label><b>Confirmar senha:</b></label>
    <br>
    <input type="password" name="confirmar" placeholder='Repita a senha'>
    <br>
    <br>

<input type="hidden" name="id" value="<?php echo $_REQUEST["id"]; ?>">

<input class="btn btn-info" type="submit" name='cadastrar' value="Cadastrar">
<br><br>
<input class="btn btn-danger" type="reset" value="Limpar">

</form>
    </div>
  </body>
</html>

<?php
	
	if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true){
		include 'connection.php';
		$conn = conexao();
		
		$erro = null;
		$valido = false;

		
		if (strlen(utf8_decode($_POST["nome"])) < 5 || strlen(utf8_decode($_POST["nome"])) > 255) {
				$erro = "Digite um nome válido.";
			}
				else{
					if(strlen(utf8_decode($_POST["email"])) <10 || strlen(utf8_decode($_POST["email"])) > 255) {
						$erro = " Digite um email valido.";
					}
					else{
						if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
							$erro = " Digite um email valido.";
						}
						else{
							if(strlen(utf8_decode($_POST["senha"])) < 8 || strlen(utf8_decode($_POST["senha"])) > 100){
									$erro = " Digite uma senha válida (use entre 8 e 100 caracteres).";
							}
								else{
									if($_POST["senha"] != $_POST["confirmar"]){
										$erro = " Confirmação de senha inválida. Por favor, digite novamente.";
									}
										else{
											$valido = true;
										}	
								}
						}
					}
				}
			
	if(isset($valido) && $valido == true){
		$email = $_POST['email'];
		//Verificar se o usuário já está cadastro no banco de dados
		$result = $conn->prepare("select * from usuario where email_usuario = '{$email}'"); //Comando de seleção que verifica se há um email igual no banco de dados
		$result->execute(); //Executa o comando
		if($result->fetchColumn() > 0){ //Se retornar mais de 0 resultado, existe um email igual cadastrado
			header('Location: login.php'); //Direciona o usuário para a página de login
		}
		else{ //Se não há um email cadastrado, realiza o cadastro
			$nome1 = $_POST["nome"];
			$nome2 = $_POST["sobrenome"];
			$nome = "{$nome1} {$nome2}";
			
			$sql = "INSERT INTO usuario 
			(nome_usuario, email_usuario, senha_usuario) 
			VALUES (?, ?, ?)";
			$stmt = $conn->prepare($sql);
			
			

			//Atrelando os dados às tabelas
			$stmt->bindValue(1, $nome);
			$stmt->bindValue(2, $_POST["email"]);
			$senhaHash = md5($_POST["senha"]);
			$stmt->bindValue(3, $senhaHash);
			
			$stmt->execute();
			
			if($stmt->errorCode() != "00000"){
					$erro = "Erro código " . $stmt->errorCode() . ": ";
					$erro .= implode(", ", $stmt->errorInfo());
					echo $erro;
			} //Exibir erro de comunicação com o banco de dados
		}
	}
	   else{
			if (isset($erro)) {
				echo $erro."<br>";
			}
		}
	}
	
?>