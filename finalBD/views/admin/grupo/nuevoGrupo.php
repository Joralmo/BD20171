<!DOCTYPE HTML> 
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../estilos/bootstrap-paper.min.css">
	<link rel="stylesheet" href="../estilos/material-bootstrap-wizard.css">
	<link rel="stylesheet" type="text/css" href="../estilos/iconos.css" />
	<link rel="stylesheet" href="../estilos/sweetalert.css">
	<link rel="stylesheet" href="../estilos/bootstrap-datepicker.css">
	<link rel="stylesheet" href="../estilos/fresh-bootstrap-table.css">
	<!-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'> -->
	<script src="../js/jquery.js"></script>
	<script src="../js/sweetalert.min.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/jquery.bootstrap.js"></script>
	<script src="../js/material-bootstrap-wizard.js"></script>
	<script src="../js/jquery.validate.min.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/bootstrap-table.js"></script>
	<script src="../js/js.js"></script>
	<link rel="stylesheet" href="../estilos/css.css">
	<title>Administracion grupos</title>
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
	<h1 id="EAdmin">Administracion grupo</h1>
	<div class="botonesModal">
		<a href="#" id="btnNuevoGrupo" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Nuevo">Nuevo</a>
		<a href="#" id="VerGrupos" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#VerP">Ver todos</a>
	</div>
	

	

<div id="VerP" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="fresh-table full-color-orange">
					<table id="fresh-table" class="table">
						<thead>
							<th data-field="nombre">Nombre</th>
							<th data-field="estu">Número de estudiantes</th>
							<th data-field="acciones">Materia</th>
							<th data-field="acciones">Editar</th>
							<th data-field="acciones">Eliminar</th>
						</thead>
						<tbody id="bodyVerGrupos">
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
				<script type="text/javascript">
					var $table = $('#fresh-table'),
					full_screen = false;
					$table.bootstrapTable({
						toolbar: ".toolbar",

						showRefresh: false,
						search: false,
						showToggle: false,
						showColumns: false,
						pagination: true,
						striped: true,
						pageSize: 8,
						pageList: [8,10,25,50,100],

						formatShowingRows: function(pageFrom, pageTo, totalRows){
		                    //do nothing here, we don't want to show the text "showing x of y from..." 
		                },
		                formatRecordsPerPage: function(pageNumber){
		                	return pageNumber + " rows visible";
		                },
		                icons: {
		                	refresh: 'fa fa-refresh',
		                	toggle: 'fa fa-th-list',
		                	columns: 'fa fa-columns',
		                	detailOpen: 'fa fa-plus-circle',
		                	detailClose: 'fa fa-minus-circle'
		                }
		            });
					$(window).resize(function () {
						$table.bootstrapTable('resetView');
					});
				</script>
			</div>
			<div class="modal-footer">
				<button type="button" id="cerrarVerTodos" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
</body>
</html>