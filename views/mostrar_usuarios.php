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
	<h1>Listado de usuarios</h1>
	<table border="5px">
		<tr>
			<th>Rut</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Email</th>
			<th>Clave</th>
			<th>Tipo</th>
		</tr>
	<?php 
	while ($usuario = $usuarios->fetch_object()): //La función "fetch_object" convierte la query en un Array de objetos.
	?>
		<tr>
			<td><?=$usuario->rut?></td>
			<td><?=$usuario->nombre?></td>
			<td><?=$usuario->apellido?></td>
			<td><?=$usuario->email?></td>
			<td><?=$usuario->clave?></td>
			<td><?=$usuario->tipo?></td>
		</tr>
	<?php 
	endwhile;
	?>
	</table>
</body>
</html>
