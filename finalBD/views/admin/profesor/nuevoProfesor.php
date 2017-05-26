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
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
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
	<title>Administracion profesores</title>
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
	<h1 id="EAdmin">Administracion profesores</h1>
	<div class="botonesModal">
		<a href="#" id="btnNuevo" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Nuevo">Nuevo</a>
		<a href="#" id="VerProfesores" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#VerP">Ver todos</a>
	</div>
	

	<div id="Nuevo" class="modal fade" role="dialog">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		<!--   Big container   -->
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<!--      Wizard container        -->
					<div class="wizard-container">
						<div class="card wizard-card" data-color="blue" id="wizardProfile">
							<form action="" method="" id="nuevoProfesor">
								<!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

								<div class="wizard-header">
									
								</div>
								<div class="wizard-navigation">
									<ul>
										<li><a href="#infoBasica" data-toggle="tab">Informacion basica</a></li>
									</ul>
								</div>

								<div class="tab-content">
									<div class="tab-pane" id="infoBasica">
										<div class="row">
											<div class="col-sm-2">
												<div class="picture-container">
													<div class="picture">
														<img src="../img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
														<input type="file" required="" name="archivo" id="wizard-picture">
													</div>
													<h6>Seleccionar imagen</h6>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">face</i>
													</span>
													<div class="form-group label-floating">
														<label class="control-label">Nombre</label>
														<input name="data[Nombre]" value="Jose" required="" type="text" class="form-control">
													</div>
												</div>

												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">record_voice_over</i>
													</span>
													<div class="form-group label-floating">
														<label class="control-label">Apellido</label>
														<input required="" value="Altamar" name="data[Apellido]" type="text" class="form-control">
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">account_balance</i>
													</span>
													<div class="form-group label-floating">
														<select name="data[FacultadesidFactultad]" required="" id="facultad" class="selectpicker form-control">
															<option>Facultad</option>
														</select>
													</div>
												</div>

												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">fingerprint</i>
													</span>
													<div class="form-group label-floating">
														<label class="control-label">Documento</label>
														<input value="1221967" name="data[idProfesor]" required="" type="text" class="form-control">
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">subtitles</i>
													</span>
													<div class="form-group label-floating">
														<label class="control-label">Titulo</label>
														<input value="Magister" name="data[Titulo]" type="text" class="form-control">
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">vpn_key</i>
													</span>
													<div class="form-group label-floating">
														<label class="control-label">Contraseña</label>
														<input value="123456" name="data[Pass]" type="text" class="form-control">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="wizard-footer">
										<div class="pull-right">
											<!-- <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Siguiente' /> -->
											<input data-dismiss="modal" id="crearProfesor" type='button' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Crear' />
										</div>

										<div class="pull-left">
											<input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Volver' />
										</div>
										<div class="clearfix"></div>
									</div>
								</form>
							</div>
						</div>
					</div> <!-- wizard container -->
				</div>
			</div><!-- end row -->
		</div> <!--  big container -->	<br><br>
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
								<th data-field="codigo">Codigo</th>
								<th data-field="imagen">Imagen</th>
								<th data-field="nombre">Nombre</th>
								<th data-field="titulo">Titulo</th>
								<th data-field="facultad">Facultad</th>
								<th data-field="acciones">Editar</th>
								<th data-field="acciones">Eliminar</th>
							</thead>
							<tbody id="bodyVerProfesores">
								<tr>
									<td></td>
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
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmCi4oIPRtQf5-ncb2w8RLqKstRKQh6YM&libraries=places&callback=initAutocomplete" async defer></script>
<script>
	var ciudadRA = (document.getElementById('ciudadRA'));
	var ciudadOA = (document.getElementById('ciudadOA'));
	var ciudadR = (document.getElementById('ciudadR'));
	var ciudadO = (document.getElementById('ciudadO'));
	var options = {
		componentRestrictions: {country: "co"}
	};
	function initAutocomplete() {
		if(ciudadR!=null){
			var geo = new google.maps.places.Autocomplete(ciudadR, options);
			google.maps.event.addListener(geo, 'place_changed', function(){
				ciudadR.value = geo.getPlace().name;
			});
		}
		if(ciudadO!=null){
			var geo2 = new google.maps.places.Autocomplete(ciudadO, options);
			google.maps.event.addListener(geo2, 'place_changed', function(){
				ciudadO.value = geo2.getPlace().name;
			});
		}
		if(ciudadRA!=null){
			var geo3 = new google.maps.places.Autocomplete(ciudadRA, options);
			google.maps.event.addListener(geo3, 'place_changed', function(){
				ciudadRA.value = geo3.getPlace().name;
			});
		}
		if(ciudadOA!=null){
			var geo4 = new google.maps.places.Autocomplete(ciudadOA, options);
			google.maps.event.addListener(geo4, 'place_changed', function(){
				ciudadOA.value = geo4.getPlace().name;
			});
		}
	}
</script>
</html>