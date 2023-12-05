<?php 
if (file_exists('config/database.php')) {
	require_once 'config/database.php'; //Se usa para incluirse en el controlador frontal (Cuando se renderiza una vista).
}		
else {
	require_once '../config/database.php'; //Se usa para incluirse en el método "controlador" de los controladores del modelo.
}
?>

<?php
class ProductoDAO {
	public $db;
	
	public function __construct() {
		$this->db = Database::conectar(); //Cuando se crea una instancia de la capa DAO, el programa se conecta a la base de datos.
	}
	
	public function save(Producto $p) {	
		$codigo = $p->getCodigo();
		$nombre = $p->getNombre();
		$precio = $p->getPrecio();
		$categoria = $p->getCategoriaFK();
		
		$query = $this->db->query("INSERT INTO producto VALUES('{$codigo}', '{$nombre}', {$precio}, {$categoria})");
		return $query;
	}
	
	public function getAll() {		
		$query = $this->db->query("SELECT * FROM producto");
		return $query;
	}
	
	public function getAllFK($categoria) {
		if ($categoria == false) {
			$categoria = "id";
		}
		
		$query = $this->db->query("SELECT producto.codigo, producto.nombre, producto.precio, categoria.{$categoria} AS 'categoria_{$categoria}' FROM producto, categoria WHERE producto.categoria_id = categoria.id");
		return $query;
	}
	
	public function customQuery($sql) {
		$query = $this->db->query($sql);
		return $query;
	}
}
?>