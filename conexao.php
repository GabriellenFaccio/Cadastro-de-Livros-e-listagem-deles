<?php 
	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "livraria";

	//criar a conexao com o banco
	$conn = mysqli_connect($host,$user,$pass,$dbname);

	if(!$conn){
		echo "Erro ao conectar ao banco de dados !";
		exit();
	}
?>



