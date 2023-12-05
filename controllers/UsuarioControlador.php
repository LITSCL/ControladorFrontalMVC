<?php 
if (file_exists('config/parameters.php')) {
	require_once 'config/parameters.php'; 
}		
else {
    require_once '../config/parameters.php';
}
?>

<?php
class UsuarioControlador {
	
	public function controlador() { //El switch se utiliza para controlar datos y redirigir al usuario (No para renderizar vistas).
		require_once '../models/dto/Usuario.php';
		require_once '../models/dao/UsuarioDAO.php';
		require_once '../helpers/Helper.php';
		
		$errores = array();
		
		if (isset($_POST["opcion"]) || isset($_GET["opcion"])) {
			if (isset($_POST["opcion"])) {
				$opcion = $_POST["opcion"];
			}
			else {
				$opcion = $_GET["opcion"];
			}
			switch ($opcion) {
				case "1": //Crear.
					if (isset($_POST["rut"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["email"]) && isset($_POST["clave"]) && isset($_POST["tipo"])) {
						$daoUsuario = new UsuarioDAO();
						$u = new Usuario();

						$u->setRut($_POST["rut"]);
						$u->setNombre($_POST["nombre"]);
						$u->setApellido($_POST["apellido"]);
						$u->setEmail($_POST["email"]);
						$u->setClave($_POST["clave"]);
						$u->setTipo($_POST["tipo"]);
						
						if (Helper::validarRutChileno($u->getRut()) == false) {
							array_push($errores, "El rut ingresado no posee formato válido");
						}
						
						if (sizeof($errores) == 0) {
							if ($daoUsuario->save($u)) {
								$_SESSION["crear_usuario"] = "Exitoso";
							} else {
								$_SESSION["crear_usuario"] = "Fallido";
							}
						}
						else {
							$_SESSION["crear_usuario"] = "Fallido";
							$_SESSION["errores"] = $errores;
						}
						header("Location: " . BASE_URL . "Usuario/CrearUsuario");
					}
					break;
				case "2": //Logear.
					if (isset($_POST["rut"]) && isset($_POST["clave"])) {
						$daoUsuario = new UsuarioDAO();
						$usuario = $daoUsuario->find($_POST["rut"]);
						
						if ($usuario && $usuario->num_rows == 1) {
							$usuario = $usuario->fetch_object();
							if ($usuario->clave == $_POST["clave"]) {
								$_SESSION["usuario"] = $usuario;
								header("Location: " . BASE_URL);
							}
							else {
								$_SESSION["error_login"] = "Credenciales incorrectas";
								header("Location: " . BASE_URL . "Usuario/IniciarSesion");
							}
						}
						else {
							$_SESSION["error_login"] = "Credenciales incorrectas";
							header("Location: " . BASE_URL . "Usuario/IniciarSesion");
						}
					}
					break;
				case "3": //Desloguear.
					Helper::borrarSesion("usuario");
					header("Location: " . BASE_URL);
					break;
				default:
					return "No existe la opción";
			}
		}
		return "No se envió una opción válida para controlar";
	}
	
	public function renderizarVistaIniciarSesion() {
		require_once 'views/iniciar_sesion.php';
	}
	
	public function renderizarVistaPanelCliente() {
		Helper::validarCliente();
		require_once 'views/panel_cliente.php';
	}
	
	public function renderizarVistaPanelAdministrador() {
		Helper::validarAdministrador();
		require_once 'views/Panel_administrador.php';
	}
	
	public function renderizarVistaCrearUsuario() {	
		require_once 'views/crear_usuario.php';
	}
	
	public function renderizarVistaMostrarUsuarios() {
		//1. Incluir clases necesarias para poder utilizar la vista.
		require_once 'models/dao/UsuarioDAO.php'; 
		
		//2. Generar variables necesarias para poder utilizar la vista.
		$daoUsuario = new UsuarioDAO();
		$usuarios = $daoUsuario->getAll();
		
		//3. Incluir la vista a cargar en el controlador frontal.
		require_once 'views/mostrar_usuarios.php';
	}
	
}

if (isset($_POST["opcion"]) || isset($_GET["opcion"])) { //Aquí se verifica si se desea controlar o renderizar (Si llega el parámetro "opcion", se ejecutará el método "controlador").
	session_start();
	$uc = new UsuarioControlador();
	$uc->controlador();
}
?>