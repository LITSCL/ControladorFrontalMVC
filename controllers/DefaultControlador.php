<?php 
if (file_exists('config/parameters.php')) {
	require_once 'config/parameters.php'; 
}		
else {
    require_once '../config/parameters.php';
}
?>

<?php 
class DefaultControlador {
	public function renderizarVistaDefault() {
		require_once 'views/default.php';
	}
}
?>