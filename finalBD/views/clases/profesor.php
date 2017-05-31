<?php 

class Profesor{
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
	public function nuevoProfesor($datos, $p){
		try {
			$database=$GLOBALS['database'];
			$data=$database->insert("Profesores", $datos);
			$p->setRespuesta($data->rowCount());
		} catch (PDOException $e) {
			return false;
		}
	}

	public function llenarFacultades($p){
		$database=$GLOBALS['database'];
		$respuesta = $database->select("Facultades","*");
		$p->setRespuesta($respuesta);
		return $p;
	}

	public function llenarMaterias($p){
		$database=$GLOBALS['database'];
		$respuesta = $database->select("Materias","*");
		$p->setRespuesta($respuesta);
		return $p;
	}

	public function actualizar($datos, $id, $p){
		try {
			$database=$GLOBALS['database'];
			$data=$database->update("Profesores", $datos, ["idProfesor"=>$id]);
			$p->setRespuesta($data->rowCount());
		} catch (PDOException $e) {
			return false;
		}
	}

	public function verTodos($p){
		try {
			$database=$GLOBALS['database'];
			$respuesta=$database->select("Profesores",["[><]Facultades"=>["FacultadesidFactultad"=>"idFactultad"]],"*");
			$p->setRespuesta($respuesta);
		} catch (PDOException $e) {
			return false;
		}
	}

	public function eliminar($id, $p){
		try {
			$database=$GLOBALS['database'];
			$data=$database->delete("Profesores", ["idProfesor"=>$id]);
			$p->setRespuesta($data->rowCount());
		} catch (PDOException $e) {
			return false;
		}	
	}
}

?>