<?php 

require 'conexion.php';
class IniciarSesion{
	public $respuesta;
	function __construct(){
		$this->respuesta=0;
	}
	public function getRespuesta(){
		return $this->respuesta;
	}
	public function setRespuesta($respuesta){
		$this->respuesta=$respuesta;
	}
	public function login($codigo,$pass){
		$consulta="call Admisiones.login('".$codigo."', '".$pass."')";
		try {
			$database=$GLOBALS['database'];
			$respuesta=$database->query($consulta)->fetchAll();
			return $respuesta;
		} catch (PDOException $e) {
			return false;
		}
	}
	public function loginProfesor($codigo,$pass, $i){
		try {
			$database=$GLOBALS['database'];
			$respuesta=$database->select("Profesores","*",[
					"idProfesor"=>$codigo,
					"Pass"=>$pass
				]);
			$i->setRespuesta($respuesta);
			return $i->getRespuesta();
		} catch (PDOException $e) {
			return false;
		}
	}
}
//$database=$GLOBALS['database'];

?>