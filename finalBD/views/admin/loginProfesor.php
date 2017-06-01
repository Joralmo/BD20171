<!DOCTYPE HTML> 
<html>
  <head>
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../estilos/bootstrap-paper.min.css">
	<script src="../js/jquery.js"></script>
	<link rel="stylesheet" href="../estilos/sweetalert.css">
	<script src="../js/sweetalert.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/js.js"></script>
	<link rel="stylesheet" href="../estilos/css.css">
    <title>Registro academico</title>
  </head>
  <body id="index">
	<div  id="head" class="col-md-12">
		
	</div>
	<div class="col-md-12">
		<div class="col-md-4"></div>
		<div id="box" class="col-md-4">
			<div id="up" class="row">
				<h4 class="text-center">Login Profesores</h4>
			</div>
			<div id="middle" class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<form action="loginProfesor" method="post">
						<input class="form-control" name="codigoP" placeholder="Codigo">
						<input type="password" class="form-control" name="passP" placeholder="Contraseña">
						<?php 
							if($incorrecto=="true"){
								echo "<script>function asd(){swal('Error','Codigo o Contraseña incorrectos','error')}asd();</script>";
							}
						 ?>
						<center><button type="submit" class="btn btn-success" id="entrarLoginP">Entrar</button></center>
						<center><small><a href="views/../">Soy estudiante</a></small></center>
					</form>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
  </body>
</html>
