<!DOCTYPE HTML> 
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../estilos/bootstrap-paper.min.css">
	<link rel="stylesheet" href="../estilos/material-bootstrap-wizard.css">
	<link rel="stylesheet" href="../estilos/css.css">
	<title>Administracion</title>
</head>
<body id="index">
	<div  id="head" class="col-md-12">
	</div>
	<div class="col-md-12" id="menu">
		<div class="row">
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Modulo estudiantil</a></li>
					<li><a href="#">Inicio</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Academico <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Matricula academica</a></li>
							<li><a href="#">Horario</a></li>
							<li><a href="#">Notas</a></li>
						</ul>
					</li>
				</ul>
				<div class="nav navbar-nav navbar-right">
					<li><p class="text-uppercase"><?php echo $data["codigo"] ." - ". $data["nombre"]." ".$data["apellido"] ?></p></li>
					<li><a href="logout">Cerrar sesión</a></li>
				</div>
			</div>
		</div>
	</div>
	<br><br><br><br>
	<h1 id="EAdmin">Administracion</h1>
	<div class="botonesModal">
		<a href="adminEstudiante" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Nuevo">Estudiantes</a>
		<a href="adminProfesor" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Actual">Profesores</a>
		<a href="adminMaterias" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Actual">Materias</a>
		<a href="adminFacultad" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Actual">Facultades</a>
		<a href="adminCarrera" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Actual">Carreras</a>
		<a href="adminGrupo" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Actual">Grupos</a>
	</div>
</body>
</html>