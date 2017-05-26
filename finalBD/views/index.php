<?php 

require 'flight/Flight.php';
require 'clases/iniciarSesion.php';
require 'clases/estudiante.php';
require 'clases/profesor.php';
require 'clases/materia.php';
Flight::set('flight.views.path', 'admin');
Flight::route('GET /', function(){
	session_start();
	if(isset($_SESSION['usuario']) and $_SESSION['usuario']=="activo"){
		$datos=$_SESSION['todo'];
		if($_SESSION['rol']=="Estudiante") {
			Flight::render('estudiante/inicio',array("data"=>$datos));
		}else if($_SESSION['rol']=="Profesor") {
			Flight::render('profesor/inicio', array("data"=>$datos));
		}else if($_SESSION['rol']=="Admin"){
			Flight::render('Go',array("data"=>$datos));
		}
	}else{
		Flight::render('login',array("incorrecto"=>"NULL"));
	}
});


Flight::route('GET /loginProfesor', function(){
	Flight::render('loginProfesor',array("incorrecto"=>"NULL"));
});

Flight::route('POST /loginProfesor', function(){
	$codigo=$_POST["codigoP"];
	$pass=$_POST["passP"];
	$pass=md5($pass);
	$respuesta=new IniciarSesion();
	$respuesta->loginProfesor($codigo, $pass, $respuesta);
	if (count($respuesta->getRespuesta())>0) {
		if ($respuesta->getRespuesta()[0]["idProfesor"]==$codigo) {
			session_start();
			$_SESSION['usuario']='activo';
			$_SESSION['todo']=$respuesta->getRespuesta()[0];
			$_SESSION['rol']="Profesor";
			Flight::redirect('/');
		}
	}else{
		Flight::render('loginProfesor',array("incorrecto"=>"true"));
	}
});

Flight::route('GET /adminEstudiante', function(){
	session_start();
	if(isset($_SESSION['usuario'])){
		$datos=$_SESSION['todo'];
		if($_SESSION['rol']=="Admin"){
			Flight::render('estudiante/nuevoEstudiante');
		}else{
			Flight::render('../error');
		}
	}else{
		Flight::render('../error');
	}
});
Flight::route('GET /adminProfesor', function(){
	session_start();
	if(isset($_SESSION['usuario'])){
		$datos=$_SESSION['todo'];
		if($_SESSION['rol']=="Admin"){
			Flight::render('profesor/nuevoProfesor');
		}else{
			Flight::render('../error');
		}
	}else{
		Flight::render('../error');
	}
});
Flight::route('GET /adminMaterias', function(){
	session_start();
	if(isset($_SESSION['usuario'])){
		$datos=$_SESSION['todo'];
		if($_SESSION['rol']=="Admin"){
			Flight::render('materia/nuevaMateria');
		}else{
			Flight::render('../error');
		}
	}else{
		Flight::render('../error');
	}
});
Flight::route('POST /login', function(){
	$codigo=$_POST['codigo'];
	$pass=md5($_POST['pass']);
	$inicio=new iniciarSesion();
	$datos=$inicio->login($codigo,$pass);
	if($datos){
		session_start();
		$_SESSION['usuario']='activo';
		$_SESSION['todo']=$datos[0];
		$_SESSION['rol']=$datos[0]['rol'];
		Flight::redirect('/');
	}else{
		Flight::render('login',array("incorrecto"=>"true"));
	}
});
//Estudiante
Flight::route('POST /nuevoEstudiante', function(){
	$file = $_FILES["archivo"];
	$rutaTemp=$file["tmp_name"];
	$carpeta = "/opt/lampp/htdocs/php/finalBD/views/admin/estudiante/imagenes/";
	$codigo=$_POST["codigo"];
	$src=$carpeta.$codigo.".jpg";
	move_uploaded_file($rutaTemp, $src);
	$nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$estrato=$_POST["estrato"];
	$documento=$_POST["documento"];
	$celular=$_POST["celular"];
	$email=$_POST["email"];
	$edad=$_POST["edad"];
	$sexo=$_POST["sexo"];
	$direccion=$_POST["direccion"];
	$colegio=$_POST["colegio"];
	$telefono=$_POST["telefono"];
	$contraseña=md5($_POST["pass"]);
	$ciudadO=$_POST["ciudadO"];
	$ciudadR=$_POST["ciudadR"];
	$fechaN=$_POST["fechaN"];
	$rol=2;
	$nuevoEstudiante=new estudiante();
	$respuesta=$nuevoEstudiante->nuevoEstudiante($codigo, $nombre, $apellido, $estrato, $documento, $celular, $fechaN, $email, 
		$edad, $sexo, $direccion, $colegio, $telefono, $src, $contraseña, $ciudadO, $ciudadR, $rol);
	echo json_encode($respuesta);
});

Flight::route('POST /buscar', function(){
	$codigo=$_POST["codigo"];
	$estudiante=new estudiante();
	$respuesta=$estudiante->buscar($codigo);
	echo json_encode($respuesta);
});

Flight::route('POST /actualizar', function(){
	$nuevoEstudiante=new estudiante();
	$respuesta=$nuevoEstudiante->actualizar($_POST["data"]);
});

Flight::route('POST /verTodos', function(){
	$nuevoEstudiante=new estudiante();
	$respuesta=$nuevoEstudiante->verTodos();
	echo json_encode($respuesta);
});

Flight::route('POST /eliminar', function(){
	$nuevoEstudiante=new estudiante();
	$respuesta=$nuevoEstudiante->eliminar($_POST["codigo"]);
});
//End Estudiante

//Profesor
Flight::route('POST /nuevoProfesor', function(){
	$datos=$_POST["data"];
	$file=$_FILES["archivo"];
	$rutaTemp=$file["tmp_name"];
	$carpeta = "/opt/lampp/htdocs/php/finalBD/views/admin/profesor/imagenes/";
	$src=$carpeta.$datos["idProfesor"].".jpg";
	move_uploaded_file($rutaTemp, $src);
	$ruta=iconv_substr($src,36,strlen($src));
	$datos["Imagen"]=$ruta;
	$datos["Pass"]=md5($datos["Pass"]);
	$datos["FacultadesidFactultad"]=(int)$datos["FacultadesidFactultad"];
	$datos["Roles_idRoles"]=3;
	$profesor=new Profesor();
	$profesor->nuevoProfesor($datos, $profesor);
	echo $profesor->getRespuesta();
});

Flight::route('POST /verProfesores', function(){
	$profesor=new Profesor();
	$profesor->verTodos($profesor);
	echo json_encode($profesor->getRespuesta());
});

Flight::route('POST /llenarFacultades', function(){
	$respuesta=new Profesor();
	$respuesta->llenarFacultades($respuesta);
	echo json_encode($respuesta->getRespuesta());
});

Flight::route('POST /editarProfesor', function(){
	$datos=$_POST["data"];
	$id=$_POST["idProfesor"];
	$profesor=new Profesor();
	$profesor->actualizar($datos, $id, $profesor);
	echo $profesor->getRespuesta();
});

Flight::route('POST /eliminarProfesor', function(){
	$id=$_POST["id"];
	$profesor=new Profesor();
	$profesor->eliminar($id, $profesor);
	echo $profesor->getRespuesta();
});
//End Profesor

//Materia
Flight::route('POST /nuevaMateria', function(){
	$datos=$_POST["data"];
	$materia=new Materia();
	$materia->nuevaMateria($datos, $materia);
	echo $materia->getRespuesta();
});
Flight::route('POST /verMaterias', function(){
	$materia=new Materia();
	$materia->verTodas($materia);
	echo json_encode($materia->getRespuesta());
});
Flight::route('POST /editarMateria', function(){
	$datos=$_POST["data"];
	$id=$_POST["idMateria"];
	$materia=new Materia();
	$materia->actualizar($datos, $id, $materia);
	echo $materia->getRespuesta();
});
Flight::route('POST /eliminarMateria', function(){
	$id=$_POST["id"];
	$materia=new Materia();
	$materia->eliminar($id, $materia);
	echo $materia->getRespuesta();
});
//End Materia

Flight::route('GET /logout', function(){
	session_start();
	session_destroy();
	Flight::redirect('/');
});
Flight::start();

?>