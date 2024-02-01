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
	<h1>Estas en Crear Producto</h1>
	<form action="<?=BASE_URL?>controllers/ProductoControlador.php" method="POST">
		<table border="5px">
			<tr>
				<td>Codigo</td>
				<td><input type="text" name="codigo" required/></td>
			</tr>
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="nombre" required/></td>
			</tr>
			<tr>
				<td>Precio</td>
				<td><input type="number" name="precio" required/></td>
			</tr>
			<tr>
				<td>Categoria</td>
				<td>
					<select name="categoria">
					<?php 
					while ($categoria = $categorias->fetch_object()):
					?>
						<option value="<?=$categoria->id?>"><?=$categoria->nombre?></option>
					<?php 
					endwhile;
					?>
					</select>
				</td>
			</tr>
		</table>
		<button type="submit" name="opcion" value="1">Crear</button>
	</form>
	<?php 
	if (isset($_SESSION["crear_producto"]) && $_SESSION["crear_producto"] == "Exitoso"): 
	?>
		<strong class="alerta-verde">Producto creado correctamente</strong>
	<?php 
	elseif (isset($_SESSION["crear_producto"]) && $_SESSION["crear_producto"] == "Fallido"):
	?>
		<strong class="alerta-roja">Error al crear el producto</strong>
	<?php 
	endif;
	?>
	
	<?php Helper::borrarSesion("crear_producto"); ?>
</body>
</html>

