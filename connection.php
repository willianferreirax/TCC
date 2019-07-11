<?php
	function conexao(){
	$banco = "freshr";
	$host = "localhost";
	$usuario = "root";
	$senha= "";
	$conn = new PDO("mysql:host={$host};dbname={$banco}","{$usuario}","{$senha}");
	$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
	return $conn;
	}
?>