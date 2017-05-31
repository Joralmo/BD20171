<!DOCTYPE HTML> 
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../estilos/bootstrap-paper.min.css">
	<link rel="stylesheet" href="../estilos/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="../estilos/iconos.css" />
	<script src="../js/jquery.js"></script>
	<script src="../js/sweetalert.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/js.js"></script>
	<link rel="stylesheet" href="../estilos/css.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
	<title>Registro academico</title>
</head>
<body id="inicioEstudiante">
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
					<li><p>2014214004 - JOSE RAFAEL ALTAMAR MOLINA</p></li>
					<li><a href="#">Cerrar sesión</a></li>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12" id="downMenu">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<h4>NUEVO HORARIO</h4>
		</div>
		<div class="col-md-1"></div>		
	</div>
	<div class="col-md-12">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<table class="table table-condensed horarioReal" id="cabecera">
				<tbody>
					<tr>
						<th width="260px" class="bg-warning">ASIGNATURA</th>
						<th class="bg-warning">DOCENTE</th>
						<th width="80px" class="bg-warning">G</th>
						<th width="80px" class="bg-warning">Dia</th>
						<th width="80px" class="bg-warning">Horario</th>
					</tr>
				</tr>
			</tbody>
		</table>
		<div class="row">
			<center><button id="mostrar" class="btn btn-success" type="submit">Agregra asignatura</button></center>
		</div>
		<div class="oculto">
			<table class="table table-condensed preHorario" id="oculta">
				<tbody>
					<tr>
						<th width="260px" class="bg-warning">ASIGNATURA</th>
						<th class="bg-warning">DOCENTE</th>
						<th width="80px" class="bg-warning">G</th>
						<th width="80px" class="bg-warning">Dia</th>
						<th width="80px" class="bg-warning">Horario</th>
					</tr>
				</tbody>
			</table>
			<div class="row">
				<center>
				<button id="guardarHorario" class="btn btn-success" type="submit">Guardar horario</button>
					<button id="modificar" class="btn btn-warning" type="submit">Modificar horario</button>
				</center>
			</div>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>
</body>
</html>
