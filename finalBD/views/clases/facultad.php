<?php 

class Facultad{
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
	public function nuevaFacultad($nombre, $f){
		try {
			$database=$GLOBALS['database'];
			$data=$database->insert("Facultades", ["descripcion"=>$nombre]);
			$f->setRespuesta($data->rowCount());
		} catch (PDOException $e) {
			return false;
		}
	}

	public function buscarFacultad($nombre, $f){
		try {
			$database=$GLOBALS['database'];
			$data=$database->select("Facultades", "descripcion", ["descripcion"=>$nombre]);
			$f->setRespuesta(json_encode($data));
		} catch (PDOException $e) {
			return false;
		}
	}

	// public function llenarFacultades($p){
	// 	$database=$GLOBALS['database'];
	// 	$respuesta = $database->select("Facultades","*");
	// 	$p->setRespuesta($respuesta);
	// 	return $p;
	// }

	public function actualizar($datos, $id, $f){
		try {
			$database=$GLOBALS['database'];
			$data=$database->update("Facultades", $datos, ["idFacultad"=>$id]);
			$f->setRespuesta($data->rowCount());
		} catch (PDOException $e) {
			return false;
		}
	}

	public function verTodas($f){
		try {
			$database=$GLOBALS['database'];
			$respuesta=$database->select("Facultades","*");
			$f->setRespuesta($respuesta);
		} catch (PDOException $e) {
			return false;
		}
	}

	public function eliminar($id, $p){
		try {
			$database=$GLOBALS['database'];
			$data=$database->delete("Facultad", ["idFacultad"=>$id]);
			$p->setRespuesta($data->rowCount());
		} catch (PDOException $e) {
			return false;
		}	
	}
}

?>