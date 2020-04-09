<?php
	include_once("conexao.php");

	$titulo = $_POST['txtTitulo'];
	$autor = $_POST['txtAutor'];
	$categoria = $_POST['txtCategoria'];

	//$conn = mysql_connect("localhost","root","root","livraria");

	$sql = "INSERT INTO livros_2 (titulo, autor, categoria) VALUES ('$titulo','$autor','$categoria')";

	//strval($sql);

	
	mysqli_query($conn,$sql) or die("Erro ao tentar cadastrar registro");
	mysqli_close($conn);

	header("Location: Listar_P.php");
?>