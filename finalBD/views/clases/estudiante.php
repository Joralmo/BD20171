<?php 

class Estudiante{
	function __construct(){	
	}
	public function nuevoEstudiante($codigo, $nombre, $apellido, $estrato, $documento, $celular, $fechaN, $email, 
		$edad, $sexo, $direccion, $colegio, $telefono, $imagen, $contraseña, $ciudadO, $ciudadR, $rol){
		$ruta=iconv_substr($imagen,36,strlen($imagen));
		$consulta="call Admisiones.nuevoEstudiante('".$codigo."', '".$nombre."','".$apellido."'
		,'".$estrato."','".$documento."','".$celular."'
		,'".$fechaN."','".$email."','".$edad."','".$sexo."'
		,'".$direccion."','".$colegio."','".$telefono."','".$ruta."'
		,'".$contraseña."','".$ciudadO."','".$ciudadR."','".$rol."')";
		try {
			$database=$GLOBALS['database'];
			$respuesta=$database->query($consulta)->fetchAll();
			return $respuesta;
		} catch (PDOException $e) {
			return false;
		}
	}

	public function buscar($codigo){
		$consulta="call Admisiones.buscar('".$codigo."')";
		try {
			$database=$GLOBALS['database'];
			$respuesta=$database->query($consulta)->fetchAll();
			return $respuesta;
		} catch (PDOException $e) {
			return false;
		}
	}

	public function actualizar($data){
		$consulta="call Admisiones.actualizar('$data[nombre]', '$data[apellido]', $data[estrato], '$data[documento]', '$data[celular]', '$data[fechaN]', '$data[email]', '$data[edad]', '$data[sexo]', '$data[direccion]', '$data[colegio]', '$data[telefono]', '$data[ciudadRA]', '$data[ciudadOA]', '$data[codigo]')";
		// $consulta="call Admisiones.actualizar(".$nombre.", ".$apellido.", ".$estrato.", ".$documento.", ".$celular."
		// 										, ".$fechaN.", ".$email.", ".$edad.", ".$sexo.", ".$direccion.", ".$colegio."
		// 										, ".$telefono.", ".$ciudadR.", ".$ciudadO.", ".$codigo.")";
		try {
			$database=$GLOBALS['database'];
			$respuesta=$database->query($consulta);
			var_dump($database->error());
			return $respuesta;
		} catch (PDOException $e) {
			return false;
		}
	}

	public function verTodos(){
		$consulta="call Admisiones.verTodos()";
		try {
			$database=$GLOBALS['database'];
			$respuesta=$database->query($consulta)->fetchAll();
			return $respuesta;
		} catch (PDOException $e) {
			return false;
		}
	}

	public function eliminar($codigo){
		$consulta="call Admisiones.eliminarEstudiante($codigo)";
		try {
			$database=$GLOBALS['database'];
			$respuesta=$database->query($consulta);
		} catch (PDOException $e) {
			return false;
		}	
	}
}
//$database=$GLOBALS['database'];

?>