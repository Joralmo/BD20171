<?php 

class Profesor2{
	function __construct(){
	}
	public function nuevoProfesor($datos){
		$database=$GLOBALS['database'];
		$database->insert("Profesor2",$datos);
	}
}

?>