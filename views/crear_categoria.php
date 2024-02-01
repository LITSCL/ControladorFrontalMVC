<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<?php require_once 'views/includes/head_styles.php'; ?>
	<?php require_once 'views/includes/head_scripts.php'; ?>
</head>
<body>
	<?php require_once 'views/includes/header.php'; ?>
	<h1>Estas en Crear Categoria</h1>
	<form action="<?=BASE_URL?>controllers/CategoriaControlador.php" method="POST">
		<table border="5px">
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="nombre" required/></td>
			</tr>
		</table>
		<button type="submit" name="opcion" value="1">Crear</button>
	</form>
	<?php 
	if (isset($_SESSION["crear_categoria"]) && $_SESSION["crear_categoria"] == "Exitoso"): 
	?>
		<strong class="alerta-verde">Categoria creada correctamente</strong>
	<?php 
	elseif (isset($_SESSION["crear_categoria"]) && $_SESSION["crear_categoria"] == "Fallido"):
	?>
		<strong class="alerta-roja">Error al crear la categoria</strong>
	<?php 
	endif;
	?>
	
	<?php Helper::borrarSesion("crear_categoria"); ?>
</body>
</html>