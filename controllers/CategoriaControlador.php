<?php
if (file_exists('config/parameters.php')) {
	require_once 'config/parameters.php';
}
else {
	require_once '../config/parameters.php';
}
?>

<?php
class CategoriaControlador {
	
	public function controlador() { //El switch se utiliza para controlar datos y redirigir al usuario (No para renderizar vistas).
		require_once '../models/dto/Categoria.php';
		require_once '../models/dao/CategoriaDAO.php';
		require_once '../helpers/Helper.php';
		
		if (isset($_POST["opcion"]) || isset($_GET["opcion"])) {
			if (isset($_POST["opcion"])) {
				$opcion = $_POST["opcion"];
			}
			else {
				$opcion = $_GET["opcion"];
			}
			switch ($opcion) {
				case "1": //Crear.
					if (isset($_POST["nombre"])) {
						$daoCategoria = new CategoriaDAO();
						$c = new Categoria();
						
						$c->setNombre($_POST["nombre"]);
						
						if ($daoCategoria->save($c)) {
							$_SESSION["crear_categoria"] = "Exitoso";
						} else {
							$_SESSION["crear_categoria"] = "Fallido";
						}
						header("Location: " . BASE_URL . "Categoria/CrearCategoria");
					}
					break;
				default:
					return "No existe la opción";
			}
		}
		return "No se envió una opción válida para controlar";
	}
	
	public function renderizarVistaCrearCategoria() {
		require_once 'views/crear_categoria.php'; 	
	}
	
	public function renderizarVistaMostrarCategorias() {
		//1. Incluir clases necesarias para poder utilizar la vista.
		require_once 'models/dao/CategoriaDAO.php';
		
		//2. Generar variables necesarias para poder utilizar la vista.
		$daoCategoria = new CategoriaDAO();
		$categorias = $daoCategoria->getAll();
		
		//3. Incluir la vista a cargar en el controlador frontal.
		require_once 'views/mostrar_categorias.php'; 
	}
	
}

if (isset($_POST["opcion"]) || isset($_GET["opcion"])) { //Aquí se verifica si se desea controlar o renderizar (Si llega el parámetro "opcion", se ejecutará el método "controlador").
	session_start();
	$cc = new CategoriaControlador();
	$cc->controlador();
}
?>