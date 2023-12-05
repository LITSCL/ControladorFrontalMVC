<?php
class Producto {
	private $codigo;
	private $nombre;
	private $precio;
	private $categoriaFK;
	
	public function getCodigo() {
        return $this->codigo;
    }

	public function getNombre() {
        return $this->nombre;
    }

	public function getPrecio() {
        return $this->precio;
    }

	public function getCategoriaFK() {
        return $this->categoriaFK;
    }

	public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

	public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

	public function setPrecio($precio) {
        $this->precio = $precio;
    }

	public function setCategoriaFK($categoriaFK) {
        $this->categoriaFK = $categoriaFK;
    }
}
?>