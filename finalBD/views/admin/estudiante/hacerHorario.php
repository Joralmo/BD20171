<!DOCTYPE HTML> 
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../estilos/bootstrap-paper.min.css">
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/js.js"></script>
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
			<table class="table table-condensed" id="cabecera">
				<tbody>
					<tr>
						<th width="260px" class="bg-warning">ASIGNATURA</th>
						<th class="bg-warning">DOCENTE</th>
						<th width="30px" class="bg-warning">G</th>
						<th width="45px" class="bg-warning">Lu</th>
						<th width="45px" class="bg-warning">Ma</th>
						<th width="45px" class="bg-warning">Mi</th>
						<th width="45px" class="bg-warning">Ju</th>
						<th width="45px" class="bg-warning">Vi</th>
						<th width="45px" class="bg-warning">Sa</th>
						<th width="45px" class="bg-warning">Do</th>
					</tr>
					<tr class="horario">
						<td align="center">analisis numerico</td>
						<td align="center">leider salcedo</td>
						<td align="center">2</td>
						<td align="center">9-12</td>
						<td align="center">-</td>
						<td align="center">-</td>
						<td align="center">-</td>
						<td align="center">-</td>
						<td align="center">-</td>
						<td align="center">-</td>
					</tr>
					<tr class="horario">
						<td align="center">base de datos</td>
						<td align="center">daniel gonzalez</td>
						<td align="center">2</td>
						<td align="center">20-22</td>
						<td align="center">-</td>
						<td align="center">18-20</td>
						<td align="center">-</td>
						<td align="center">-</td>
						<td align="center">-</td>
						<td align="center">-</td>
					</tr>
					<tr class="horario">
						<td align="center">compiladores</td>
						<td align="center">daniel gonzalez</td>
						<td align="center">2</td>
						<td align="center">-</td>
						<td align="center">18-20</td>
						<td align="center">-</td>
						<td align="center">20-22</td>
						<td align="center">-</td>
						<td align="center">-</td>
						<td align="center">-</td>
					</tr>
					<tr class="horario">
						<td align="center">dinamica de sistemas</td>
						<td align="center">samuel prieto</td>
						<td align="center">2</td>
						<td align="center">14-16</td>
						<td align="center">14-16</td>
						<td align="center">-</td>
						<td align="center">-</td>
						<td align="center">-</td>
						<td align="center">-</td>
						<td align="center">-</td>
					</tr>
				</tbody>
			</table>
			<div class="row">
				<center><button id="mostrar" class="btn btn-success" type="submit">Agregra asignatura</button></center>
			</div>
			<div class="oculto">
				<table class="table table-condensed" id="oculta">
					<tbody>
						<tr>
							<th width="260px" class="bg-warning">ASIGNATURA</th>
							<th class="bg-warning">DOCENTE</th>
							<th width="30px" class="bg-warning">G</th>
							<th width="45px" class="bg-warning">Lu</th>
							<th width="45px" class="bg-warning">Ma</th>
							<th width="45px" class="bg-warning">Mi</th>
							<th width="45px" class="bg-warning">Ju</th>
							<th width="45px" class="bg-warning">Vi</th>
							<th width="45px" class="bg-warning">Sa</th>
							<th width="45px" class="bg-warning">Do</th>
						</tr>
						<tr class="horario">
							<td align="center">analisis numerico</td>
							<td align="center">leider salcedo</td>
							<td align="center">2</td>
							<td align="center">9-12</td>
							<td align="center">-</td>
							<td align="center">-</td>
							<td align="center">-</td>
							<td align="center">-</td>
							<td align="center">-</td>
							<td align="center">-</td>
						</tr>
					</tbody>
				</table>
				<div class="row">
					<center><button id="guardar" class="btn btn-success" type="submit">Guardar horario</button></center>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</body>
</html>
