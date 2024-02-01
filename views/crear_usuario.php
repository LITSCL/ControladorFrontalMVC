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
	<h1>Estas en Crear Usuario</h1>
	<form action="<?=BASE_URL?>controllers/UsuarioControlador.php" method="POST">
		<table border="5px">
			<tr>
				<td>Rut</td>
				<td><input type="text" name="rut" placeholder="19.757.106-3" required/></td>
			</tr>
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="nombre" required/></td>
			</tr>
			<tr>
				<td>Apellido</td>
				<td><input type="text" name="apellido" required/></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" required/></td>
			</tr>
			<tr>
				<td>Clave</td>
				<td><input type="password" name="clave" required/></td>
			</tr>
			<tr>
				<td>Tipo</td>
				<td><input type="text" name="tipo" required/></td>
			</tr>
		</table>
		<button type="submit" name="opcion" value="1">Crear</button>
	</form>
	<?php 
	if (isset($_SESSION["crear_usuario"]) && $_SESSION["crear_usuario"] == "Exitoso"): 
	?>
		<strong class="alerta-verde">Usuario creado correctamente</strong>
	<?php 
	endif;
	?>
	
	<?php 
	if (isset($_SESSION["crear_usuario"]) && $_SESSION["crear_usuario"] == "Fallido"):
	?>
		<strong class="alerta-roja">Error al crear el usuario</strong>
	<?php 
	endif;
	?>
	
	<?php 
	if (isset($_SESSION["crear_usuario"]) && $_SESSION["crear_usuario"] == "Fallido" && isset($_SESSION["errores"])):
	?>
		<div class="listado-errores">
			<ul>	
			<?php 
			foreach ($_SESSION["errores"] as $error):
			?>
				<li><?=$error?></li>
			<?php 
			endforeach;
			?>
			</ul>
		</div>
	<?php 
	endif;
	?>
	
	<?php Helper::borrarSesion("crear_usuario"); ?>
	<?php Helper::borrarSesion("errores"); ?>
</body>
</html>