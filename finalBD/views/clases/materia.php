<?php 

class Materia{
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
	public function nuevaMateria($datos, $m){
		try {
			$database=$GLOBALS['database'];
			$data=$database->insert("Materias", $datos);
			$m->setRespuesta($data->rowCount());
		} catch (PDOException $e) {
			return false;
		}
	}
	public function verTodas($m){
		try {
			$database=$GLOBALS['database'];
			$data=$database->select("Materias","*");
			$m->setRespuesta($data);
		} catch (PDOException $e) {
			return false;
		}
	}
	public function actualizar($datos, $id, $m){
		try {
			$database=$GLOBALS['database'];
			$data=$database->update("Materias", $datos, ["idMaterias"=>$id]);
			$m->setRespuesta($data->rowCount());
		} catch (PDOException $e) {
			return false;
		}
	}
	public function eliminar($id, $m){
		try {
			$database=$GLOBALS['database'];
			$data=$database->delete("Materias", ["idMaterias"=>$id]);
			$m->setRespuesta($data->rowCount());
		} catch (PDOException $e) {
			return false;
		}	
	}
}

?>