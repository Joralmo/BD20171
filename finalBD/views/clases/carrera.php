
<?php 

class Carrera{
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
	public function nuevaCarrera($nombre, $fac, $c){
		try {
			$database=$GLOBALS['database'];
			$data=$database->insert("Carreras", ["Nombre"=>$nombre, "FacultadesidFactultad"=>$fac]);
			$c->setRespuesta($data->rowCount());
		} catch (PDOException $e) {
			return false;
		}
	}

	public function buscarCarrera($nombre, $c){
		try {
			$database=$GLOBALS['database'];
			$data=$database->select("Carreras", "Nombre", ["Nombre"=>$nombre]);
			$c->setRespuesta(json_encode($data));
		} catch (PDOException $e) {
			return false;
		}
	}

	public function actualizar($datos, $id, $c){
		try {
			$database=$GLOBALS['database'];
			$data=$database->update("Carreras", ["Nombre"=>$datos], ["idCarrera"=>$id]);
			$c->setRespuesta($data->rowCount());
		} catch (PDOException $e) {
			return false;
		}
	}

	public function verTodas($c){
		try {
			$database=$GLOBALS['database'];
			$respuesta=$database->select("Carreras",["[><]Facultades"=>["FacultadesidFactultad"=>"idFactultad"]],"*");
			$c->setRespuesta($respuesta);
		} catch (PDOException $e) {
			return false;
		}
	}

	public function eliminar($id, $c){
		try {
			$database=$GLOBALS['database'];
			$data=$database->delete("Carreras", ["idCarrera"=>$id]);
			$c->setRespuesta($data->rowCount());
		} catch (PDOException $e) {
			return false;
		}	
	}
}

?>