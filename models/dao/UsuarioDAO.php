<?php
if (file_exists('config/database.php')) {
	require_once 'config/database.php'; //Se usa para incluirse en el controlador frontal (Cuando se renderiza una vista).
}
else {
	require_once '../config/database.php'; //Se usa para incluirse en el método "controlador" de los controladores del modelo.
}
?>

<?php
class UsuarioDAO {
	public $db;
	
	public function __construct() {
		$this->db = Database::conectar(); //Cuando se crea una instancia de la capa DAO, el programa se conecta a la base de datos.
	}
	
	public function save(Usuario $u) {	
		$rut = $u->getRut();
		$nombre = $u->getNombre();
		$apellido = $u->getApellido();
		$email = $u->getEmail();
		$clave = $u->getClave();
		$tipo = $u->getTipo();
		
		$query = $this->db->query("INSERT INTO usuario VALUES('{$rut}', '{$nombre}', '{$apellido}', '{$email}', '{$clave}', '{$tipo}')");
		return $query;
	}
	
	public function getAll() {
		$query = $this->db->query("SELECT * FROM usuario");
		return $query;
	}
	
	public function find($rut) {
		$query = $this->db->query("SELECT * FROM usuario WHERE rut = '{$rut}'");
		var_dump($this->db->error);
		return $query;	
	}
	
	public function customQuery($sql) {
		$query = $this->db->query($sql);
		return $query;
	}
}
?>