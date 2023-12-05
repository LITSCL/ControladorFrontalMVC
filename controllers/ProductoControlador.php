<?php
if (file_exists('config/parameters.php')) {
	require_once 'config/parameters.php';
}
else {
	require_once '../config/parameters.php';
}
?>

<?php
class ProductoControlador {
	
	public function controlador() { //El switch se utiliza para controlar datos y redirigir al usuario (No para renderizar vistas).
		require_once '../models/dto/Producto.php';
		require_once '../models/dao/ProductoDAO.php';
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
					if (isset($_POST["codigo"]) && isset($_POST["nombre"]) && isset($_POST["precio"]) && isset($_POST["categoria"])) {
						$daoProducto = new ProductoDAO();
						$p = new Producto();
						
						$p->setCodigo($_POST["codigo"]);
						$p->setNombre($_POST["nombre"]);
						$p->setPrecio($_POST["precio"]);
						$p->setCategoriaFK($_POST["categoria"]);
						
						if ($daoProducto->save($p)) {
							$_SESSION["crear_producto"] = "Exitoso";
						} else {
							$_SESSION["crear_producto"] = "Fallido";
						}
						header("Location: " . BASE_URL . "Producto/CrearProducto");
					}
					break;
				default:
					return "No existe la opción";
			}
		}
		return "No se envió una opción válida para controlar";
	}
	
	public function renderizarVistaCrearProducto() {
		//1. Incluir clases necesarias para poder utilizar la vista.
		require_once 'models/dao/CategoriaDAO.php';
		
		//2. Generar variables necesarias para poder utilizar la vista.
		$daoCategoria = new CategoriaDAO();
		$categorias = $daoCategoria->getAll();
		
		//3. Incluir la vista a cargar en el controlador frontal.
		require_once 'views/crear_producto.php'; 
	}
	
	public function renderizarVistaMostrarProductos() {
		//1. Incluir clases necesarias para poder utilizar la vista.
		require_once 'models/dao/ProductoDAO.php';
		
		//2. Generar variables necesarias para poder utilizar la vista.
		$daoProducto = new ProductoDAO();
		$productos = $daoProducto->getAllFK("nombre");
		
		//3. Incluir la vista a cargar en el controlador frontal.
		require_once 'views/mostrar_productos.php'; 
	}
	
}

if (isset($_POST["opcion"]) || isset($_GET["opcion"])) { //Aquí se verifica si se desea controlar o renderizar (Si llega el parámetro "opcion", se ejecutará el método "controlador").
	session_start();
	$pc = new ProductoControlador();
	$pc->controlador();
}
?>