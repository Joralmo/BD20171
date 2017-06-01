
<?php 

class Grupo{
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
	public function nuevoGrupo($datos, $g){
		try {
			$database=$GLOBALS['database'];
			$data=$database->insert("Grupos", $datos);
			$g->setRespuesta($data->rowCount());
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

	public function actualizar($numero, $nEstu, $id, $g){
		try {
			$database=$GLOBALS['database'];
			$data=$database->update("Grupos", ["Numero"=>$numero, "numeroDeEstudiantes"=>$nEstu], ["idGrupos"=>$id]);
			$g->setRespuesta($data->rowCount());
		} catch (PDOException $e) {
			return false;
		}
	}

	public function verTodos($g){
		try {
			$database=$GLOBALS['database'];
			$respuesta=$database->select("Grupos",["[><]Materias"=>["MateriasidMaterias"=>"idMaterias"]],"*");
			$g->setRespuesta($respuesta);
		} catch (PDOException $e) {
			return false;
		}
	}

	public function eliminar($id, $g){
		try {
			$database=$GLOBALS['database'];
			$data=$database->delete("Grupos", ["idGrupos"=>$id]);
			$g->setRespuesta($data->rowCount());
		} catch (PDOException $e) {
			return false;
		}	
	}
}

?>