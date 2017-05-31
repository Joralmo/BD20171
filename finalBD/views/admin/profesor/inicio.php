<!DOCTYPE HTML> 
<html>
  <head>
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../estilos/bootstrap-paper.min.css">
	<script src="../js/sweetalert.min.js"></script>
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../estilos/css.css">
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
				<li><p class="text-uppercase"><?php echo $data["idProfesor"] ." - ". $data["Nombre"]." ".$data["Apellido"] ?></p></li>
				<li><a href="logout">Cerrar sesión</a></li>
			</div>
			</div>
		</div>
	</div>
	<div class="col-md-12" id="downMenu">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<h4>DATOS PERSONALES</h4>
		</div>
		<div class="col-md-1"></div>		
	</div>
	<div class="col-md-12" id="tabla">
		<p id="azul"><b>Toda la informacion mostrada en esta pagina esta sujeta a revision, verificacion y correcion.</b></p>
		<div class="col-md-2"></div>
		
		<div class="col-md-2"></div>
	</div>
  </body>
</html>
