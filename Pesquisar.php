<?php
		session_start();
		include_once("conexao.php");

			$pesquisar = $_POST['txtPesquisar'];
			$result_livros = "SELECT * FROM livros_2 WHERE titulo LIKE '%$pesquisar%'";
			$resultado_livros = mysqli_query($conn, $result_livros);


			while($rows_livros = mysqli_fetch_array($resultado_livros)){
				echo $rows_livros['titulo'] . "<br>";
			}
	?>