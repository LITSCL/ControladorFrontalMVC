<?php
class Usuario {
	private $rut;
    private $nombre;
    private $apellido;
    private $email;
    private $clave;
    private $tipo;

	public function getRut() {
        return $this->rut;
    }

	public function getNombre() {
        return $this->nombre;
    }

	public function getApellido() {
        return $this->apellido;
    }

	public function getEmail() {
        return $this->email;
    }

	public function getClave() {
        return $this->clave;
    }
    
    public function getTipo() {
    	return $this->tipo;
    }
    
    public function setRut($rut) {
    	$this->rut = $rut;
    }

	public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

	public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

	public function setEmail($email) {
        $this->email = $email;
    }

	public function setClave($clave) {
        $this->clave = $clave;
    }
    
    public function setTipo($tipo) {
    	$this->tipo = $tipo;
    }
}
?>