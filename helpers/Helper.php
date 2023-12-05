<?php
class Helper {
	
    public static function borrarSesion($nombre) {
        if (isset($_SESSION[$nombre])) {
            unset($_SESSION[$nombre]);
        }
    }
    
    public static function validarAdministrador() {
    	if (isset($_SESSION["usuario"])) {
    		if ($_SESSION["usuario"]->tipo != "Administrador") {
    			header("Location: " . BASE_URL);
    		}
    	}
    	else {
    		header("Location: " . BASE_URL);
    	}
    }
    
    public static function validarCliente() {
    	if (isset($_SESSION["usuario"])) {
    		if ($_SESSION["usuario"]->tipo != "Cliente") {
    			header("Location: " . BASE_URL);
    		}
    	}
    	else {
    		header("Location: " . BASE_URL);
    	}
    }
    
    public static function validarRutChileno($rut) {
    	$validado = false;
    	
    	if (strlen($rut) == 12) {
    		$numero1 = substr($rut, 0, 2);
    		$punto1 = substr($rut, 2, 1);
    		$numero2 = substr($rut, 3, 3);
    		$punto2 = substr($rut, 6, 1);
    		$numero3 = substr($rut, 7, 3);
    		$guion = substr($rut, 10, 1);
    		$digitoVerificador = substr($rut, -1);
    		
    		if (is_numeric($numero1) && is_numeric($numero2) && is_numeric($numero3)) {
    			if ($punto1 == "." && $punto2 == ".") {
    				if ($guion == "-") {
    					if (is_numeric($digitoVerificador) || $digitoVerificador == "k" || $digitoVerificador == "K") {
    						$validado = true;
    					}
    				}
    			}
    		}
    	}
    	
    	if (strlen($rut) == 11) {
    		$numero1 = substr($rut, 0, 1);
    		$punto1 = substr($rut, 1, 1);
    		$numero2 = substr($rut, 2, 3);
    		$punto2 = substr($rut, 5, 1);
    		$numero3 = substr($rut, 6, 3);
    		$guion = substr($rut, 9, 1);
    		$digitoVerificador = substr($rut, -1);
    		
    		if (is_numeric($numero1) && is_numeric($numero2) && is_numeric($numero3)) {
    			if ($punto1 == "." && $punto2 == ".") {
    				if ($guion == "-") {
    					if (is_numeric($digitoVerificador) || $digitoVerificador == "k" || $digitoVerificador == "K") {
    						$validado = true;
    					}
    				}
    			}
    		}
    	}
    	return $validado;
    }
	  
}
?>