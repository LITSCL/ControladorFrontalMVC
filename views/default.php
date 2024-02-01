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
	<h1>Estas en Index (Default)</h1>
	<?php 
	if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]->tipo == "Administrador"):
	?>
		<br><h1>Bienvenido Administrador</h1>
		<a href="controllers/UsuarioControlador.php?opcion=3">Cerrar Sesión</a>
	<?php 
	elseif (isset($_SESSION["usuario"]) && $_SESSION["usuario"]->tipo == "Cliente"):
	?>
		<br><h1>Bienvenido Cliente</h1>
		<a href="controllers/UsuarioControlador.php?opcion=3">Cerrar Sesión</a>
	<?php 
	else:
	?>
		<br><h1>No hay sesiones activas</h1>
	<?php 
	endif;
	?>	
</body>
</html>