<?php 

class Horario{
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
	public function getDatos($h){
		try {
			$database=$GLOBALS['database'];
			$h->setRespuesta($database->select("Aulas_Grupos",[
																"[><]Grupos"=>["GruposidGrupos"=>"idGrupos"],
																"[><]Aulas"=>["AulasidAula"=>"idAula"],
																"[><]Materias"=>["Grupos.MateriasidMaterias"=>"idMaterias"],
																"[><]Grupos_Profesores"=>["Grupos.idGrupos"=>"GruposidGrupos"],
																"[><]Profesores"=>["Grupos_Profesores.ProfesoresidProfesor"=>"idProfesor"]
																] ,[
																	"NombreMateria",
																	"Nombre",
																	"Apellido",
																	"Numero",
																	"Dias",
																	"horaInicio",
																	"horaFin",
																	"idGrupos"
																]));
		} catch (PDOException $e) {
			return false;
		}
	}
	public function guardarHorario($id, $idEst, $h){
		try {
			$database=$GLOBALS['database'];
			$data=$database->insert("Grupos_Estudiantes", ["GruposidGrupos"=>$id, "EstudiantesidEstudiante"=>$idEst]);
			$h->setRespuesta($data->rowCount());
		} catch (PDOException $e) {
			return false;
		}
	}
	public function getHorario($idEst, $h){
		try {
			$database=$GLOBALS['database'];
			$h->setRespuesta($database->select("Grupos_Estudiantes", [
																	"[><]Grupos"=>["GruposidGrupos"=>"idGrupos"],
																	"[><]Materias"=>["Grupos.MateriasidMaterias"=>"idMaterias"],
																	"[><]Grupos_Profesores"=>["Grupos.idGrupos"=>"GruposidGrupos"],
																	"[><]Profesores"=>["Grupos_Profesores.ProfesoresidProfesor"=>"idProfesor"],
																	"[><]Aulas_Grupos"=>["Grupos.idGrupos"=>"GruposidGrupos"]
																		], [
																			"NombreMateria",
																			"Nombre",
																			"Apellido",
																			"Numero",
																			"Dias",
																			"horaInicio",
																			"horaFin",
																			"idGrupos"
																		], ["EstudiantesidEstudiante"=>$idEst]));
		} catch (PDOException $e) {
			return false;
		}
	}
}

?>