<?php 
	session_start();
	include_once("conexao.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


	<title>Cadastrar</title>
	
	<link rel="stylesheet" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" heref="codigoCss.css"/>
	<script type="text/javascript" src="codigoJavaScript.js"></script>

	<style>
		button{ margin-right: 25px; }
		input{ margin-right: 20px; }
		label{ margin-right: 10px; }
	</style>

</head>
<body>
	<img src="fundo_01.jpg" alt="fundoPapeldePArede" style="width: 100%; height: 100%; position: fixed;">

		<div class="container">
		<div class="row">
        <div class="col mt-3 row justify-content-center rounded">
        <div class="bg-white rounded" style="padding: 40px;">
			<form method="POST" action="Pesquisar.php">
				<button class="btn btn-outline-info mr-4 float-right" id="btnCadastrar"><a href="Cadastrar_P.php"> Cadastrar </a></button>
				<button class="btn btn-outline-info mr-4 float-right" id="btnConsultar"> Consultar </button>
				<br /> <br /> <br />
				<strong> Pesquisar : </strong><input type="text" class="form-control" name="txtPesquisar" placeholder="PESQUISAR">

				<br />
				<button class="btn btn-outline-info mr-4 float-right" id="btnProcurar"> Procurar </button>

				<form type="table" id="table"></form>

				<br><br><br>
				<?php 
					$pesquisar = filter_input(INPUT_ENV, 'txtPesquisar', FILTER_SANITIZE_STRING);

					// PAGINAÇÃO   -   Receber o número da página
					$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
					
					$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;


					//Definir a quantidade de Itens por página
					$qnt_result_pg = 3;

					// Calcular o inicio de visualização
					$inicio = ($qnt_result_pg * $pagina_atual) - $qnt_result_pg;




					//Buscar e mostrar valores
					$result_livros = "SELECT * FROM livros_2 WHERE titulo LIKE '%$pesquisar%' LIMIT $inicio,$qnt_result_pg"; # //LIMIT $inicio,$qnt_result_pg";
					$resultado_livros = mysqli_query($conn, $result_livros);

					
						echo $result_livros['titulo'] . "<br>";
					

					#while($row_livros = mysqli_fetch_assoc($resultado_livros)){
					#	echo "ID: " . $row_livros['id'] . "<br>";
					#	echo "Titulo: " . $row_livros['titulo'] . "<br>";
					#	echo "Autor: " . $row_livros['autor'] . "<br>";
					#	echo "Categoria: " . $row_livros['categoria'] . "<br><hr>";
					#}


					// Paginação - Somar a quantiade de user
					$result_pg = "SELECT COUNT(id) AS num_result FROM livros_2";
					$resultado_pg = mysqli_query($conn, $result_pg);
					$row_pg = mysqli_fetch_assoc($resultado_pg);

					//echo $row_pg['num_result']; // até aqui ele contou quantas linhas tem meu banco

					//Quantidade de Paginas
					$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg); // ceil: arrendoda


					// limitar os links antes e depois da pagina
					$max_links = 2;
					echo "<a href='Listar_P.php?pagina=1'> Primeira </a>";


					//contagem de paginas antes da pag atual
					for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant ++){
						if($pag_ant >= 1){
							echo "<a href='Listar_P.php?pagina=$pag_ant'> $pag_ant </a>";
						}
					}

					echo "$pagina";

					//contagem de paginas depois da pag atual
					for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
						if($pag_dep <= $quantidade_pg){
							echo "<a href='Listar_P.php?pagina=$pag_dep'> $pag_dep </a>";
						}
					}

					echo "<a href='Listar_P.php?pagina=$quantidade_pg'> Ultima </a>";

				?>
			</form>
		</div>
		</div>
		</div>
		</div>
		</body>
</html>