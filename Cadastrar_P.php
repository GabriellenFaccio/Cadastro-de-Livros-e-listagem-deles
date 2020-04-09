<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<!-- mudança para ser enviado no git -->
	<title>Cadastrar</title>
	<meta charset="utf-8">
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
			<form name="Cadastro" action="cadastrar.php" method="POST">
				<button class="btn btn-outline-info mr-4 float-right" id="btnConsultar"><a href="Listar_P.php"> Consultar </a></button>

				<button class="btn btn-outline-info mr-4 float-right" id="btnCadastrar"><a href="Cadastrar_P.php"> Cadastrar </a></button>
				
				<br /> <br /> <br />

				<label> Titulo :  </label><input type="text" class="form-control" name="txtTitulo">
				<label> Autor :  </label><input type="text" class="form-control" name="txtAutor">
				<br /> <br />

				<label> Categoria :  </label>
				<select name='txtCategoria'>
					<option value="Suspense"> Suspense </option>
					<option value="Romance"> Romance </option>
					<option value="Ficcao"> Ficcao </option>
					<option value="Infantil"> Infantil </option>
				</select>


				<br /> <br /> <br />
				<button class="btn btn-outline-info mr-4 float-right" id="btnCadastrar"> Inserir </button>
			</form>
		</div>
		</div>
		</div>
		</div>

		</body>
</html>