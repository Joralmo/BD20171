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
							<li><a href="hacerHorario">Horario</a></li>
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
		<div class="col-md-7">
			<div class="row">
				<div class="col-md-3" id="Derecha"><b>Nombre:</b></div>
				<div class="col-md-8"><p class="text-uppercase"><?php echo $data["nombre"]." ".$data["apellido"] ?></p></div>
			</div>
			<div class="row">
				<div class="col-md-3" id="Derecha"><b>Documento:</b></div>
				<div class="col-md-8"><?php echo $data["documento"] ?></div>
			</div>
			<div class="row">
				<div class="col-md-3" id="Derecha"><b>Celular:</b></div>
				<div class="col-md-2" id="Derecha"><?php echo $data["celular"] ?></div>
				<div class="col-md-2" id="Derecha"><b>Telefono:</b></div>
				<div class="col-md-2"><?php echo $data["tel"] ?></div>
			</div>
			<div class="row">
				<div class="col-md-3" id="Derecha"><b>Fecha nacimineto:</b></div>
				<div class="col-md-2" id="Derecha"><?php echo $data["fechaNac"] ?></div>
				<div class="col-md-1" id="Derecha"><b>Edad</b></div>
				<div class="col-md-2" id="Derecha"><?php echo $data["edad"] ?></div>
				<div class="col-md-1" id="Derecha"><b>Sexo</b></div>
				<div class="col-md-1">Masculino</div>
			</div>
			<div class="row">
				<div class="col-md-3" id="Derecha"><b>Email:</b></div>
				<div class="col-md-5"><?php echo $data["email"] ?></div>
			</div>
			<div class="row">
				<div class="col-md-3" id="Derecha"><b>Ciudad origen:</b></div>
				<div class="col-md-3" id="Derecha"><?php echo $data["ciudadO"] ?></div>
				<div class="col-md-3" id="Derecha"><b>Ciudad residencia:</b></div>
				<div class="col-md-3"><?php echo $data["ciudadR"] ?></div>
			</div>
			<div class="row">
				<div class="col-md-3" id="Derecha"><b>Direccion:</b></div>
				<div class="col-md-3" id="Derecha"><?php echo $data["dir"] ?></div>
				<div class="col-md-3" id="Derecha"><b>Estrato:</b></div>
				<div class="col-md-3"><?php echo $data["estrato"] ?></div>
			</div>

			<div class="row">
				<div class="col-md-3" id="Derecha"><b>Colegio:</b></div>
				<div class="col-md-6"><p class="text-uppercase"><?php echo $data["colegio"] ?></p></div>
			</div>
		</div>
		<div class="col-md-1">
			<div class="row">
				<?php
				echo "<img id='imgEstudiante' src='".$data[13]."'  alt=''>" ?>
			</div>

		</div>
		<div class="col-md-2"></div>
	</div>
  </body>
</html>
