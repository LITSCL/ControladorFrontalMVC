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
	<h1>Listado de productos</h1>	
	<table border="5px">
		<tr>
			<th>Codigo</th>
			<th>Nombre</th>
			<th>Precio</th>
			<th>Categoria</th>
		</tr>
	<?php 
	while ($producto = $productos->fetch_object()): //La función "fetch_object" convierte la query en un Array de objetos.
	?>
		<tr>
			<td><?=$producto->codigo?></td>
			<td><?=$producto->nombre?></td>
			<td><?=$producto->precio?></td>
			<td><?=$producto->categoria_nombre?></td>
		</tr>
	<?php 
	endwhile;
	?>
	</table>
</body>
</html>