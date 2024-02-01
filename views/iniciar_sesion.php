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
	<h1>Iniciar sesión</h1>	
	
	<form action="<?=BASE_URL?>controllers/UsuarioControlador.php" method="POST">
		<table>
			<tr>
				<td>Rut</td>
				<td><input type="text" name="rut" required/></td>
			</tr>
			<tr>
				<td>Contraseña</td>
				<td><input type="password" name="clave" required/></td>
			</tr>
		</table>
		<button name="opcion" value="2">Login</button>
	</form>
	
	<?php 
	if (isset($_SESSION["error_login"])):
	?>
		<strong class="alerta-roja"><?=$_SESSION["error_login"]?></strong>
	<?php 
	endif;
	?>
	
	<?php Helper::borrarSesion("error_login"); ?>
</body>
</html>