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
	<title>Administracion estudiantes</title>
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
	<h1 id="EAdmin">Administracion estudiante</h1>
	<div class="botonesModal">
		<a href="#" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Nuevo">Nuevo</a>
		<a href="#" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Actual">Actualizar</a>
		<a href="#" id="VerTodos" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Ver">Ver todos</a>
		<a href="#" id="EliminarEst" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Elim">Eliminar</a>
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
							<form action="" method="" id="nuevoEstudiante">
								<!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

								<div class="wizard-header">
									
								</div>
								<div class="wizard-navigation">
									<ul>
										<li><a href="#infoBasica" data-toggle="tab">Informacion basica</a></li>
										<li><a href="#estudios" data-toggle="tab">Estudios</a></li>
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
														<input name="nombre" required="" type="text" class="form-control">
													</div>
												</div>

												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">record_voice_over</i>
													</span>
													<div class="form-group label-floating">
														<label class="control-label">Apellido</label>
														<input required="" name="apellido" type="text" class="form-control">
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">account_balance</i>
													</span>
													<div class="form-group label-floating">
														<select name="estrato" required="" id="estrato" class="selectpicker form-control">
															<option>Estrato</option>
															<option>1</option>
															<option>2</option>
															<option>3</option>
															<option>4</option>
															<option>5</option>
															<option>6</option>
														</select>
													</div>
												</div>

												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">fingerprint</i>
													</span>
													<div class="form-group label-floating">
														<label class="control-label">Documento</label>
														<input name="documento" required="" type="text" class="form-control">
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">settings_cell</i>
													</span>
													<div class="form-group label-floating">
														<label class="control-label">Celular</label>
														<input name="celular" type="number" class="form-control">
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">email</i>
													</span>
													<div class="form-group label-floating">
														<label class="control-label">Email</label>
														<input name="email" value="asd@asd" required="" type="email" class="form-control">
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">date_range</i>
													</span>
													<div class="form-group label-floating">
														<label class="control-label">Edad</label>
														<input name="edad" type="text" required="" class="form-control">
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">grade</i>
													</span>
													<div class="form-group label-floating">
														<select name="sexo" id="sexo" required="" class="selectpicker form-control">
															<option>Sexo</option>
															<option>M</option>
															<option>F</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">compare_arrows</i>
													</span>
													<div class="form-group label-floating">
														<label class="control-label">Direccion</label>
														<input name="direccion" type="text" required="" class="form-control">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="estudios">
										<div class="col-sm-3">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="material-icons">school</i>
												</span>
												<div class="form-group label-floating">
													<label class="control-label">Colegio</label>
													<input name="colegio" type="text" required="" class="form-control">
												</div>
											</div>

											<div class="input-group">
												<span class="input-group-addon">
													<i class="material-icons">call</i>
												</span>
												<div class="form-group label-floating">
													<label class="control-label">Telefono</label>
													<input required="" name="telefono" type="text" class="form-control">
												</div>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="material-icons">vpn_key</i>
												</span>
												<div class="form-group label-floating">
													<label class="control-label">Codigo</label>
													<input name="codigo" required="" type="text" class="form-control">
												</div>
											</div>

											<div class="input-group">
												<span class="input-group-addon">
													<i class="material-icons">visibility_off</i>
												</span>
												<div class="form-group label-floating">
													<label class="control-label">Contraseña</label>
													<input name="pass" type="text" required="" class="form-control">
												</div>
											</div>
										</div>
										<div class="col-sm-5">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="material-icons">person_pin_circle</i>
												</span>
												<div class="form-group label-floating">
													<input type="text" name="ciudadO" required="" id="ciudadO" class="form-control" placeholder="Ciudad Origen">
												</div>
											</div>
										</div>
										<div class="col-sm-5">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="material-icons">place</i>
												</span>
												<div class="form-group label-floating">
													<input type="text" name="ciudadR" id="ciudadR" required="" class="form-control" placeholder="Ciudad Residencia">
												</div>
											</div>
										</div>
										<div class="col-sm-7">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="material-icons">cake</i>
												</span>
												<div class="form-group label-floating">
													<input name="fechaN" id="fechaN" type="date" required="" class="form-control">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="wizard-footer">
									<div class="pull-right">
										<input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Siguiente' />
										<input data-dismiss="modal" id="crear" type='button' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Crear' />
									</div>

									<div class="pull-left">
										<input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Volver' />
									</div>
									<div class="clearfix"></div>
								</div>
							</form>
						</div>
					</div> <!-- wizard container -->
				</div>
			</div><!-- end row -->
		</div> <!--  big container -->	<br><br>
	</div>

	<div id="Actual" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-5">
							<div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">vpn_key</i>
								</span>
								<div class="form-group label-floating">
									<label class="control-label">Codigo</label>
									<input name="codigo" id="codigo" value="2014214005" type="number" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-sm-5">
							<a href="" id="buscarEst" class="btn btn-success">Buscar</a>
						</div>
					</div>
					<div class="aparecer">
						<form action="" method="" id="actualizarEstudiante">
							<div class="row">
								<div class="col-sm-3">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">face</i>
										</span>
										<div class="form-group label-floating">
											<input name="data[nombre]" id="nombre" type="text" class="form-control">
										</div>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">record_voice_over</i>
										</span>
										<div class="form-group label-floating">
											<input name="data[apellido]" id="apellido" type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">account_balance</i>
										</span>
										<div class="form-group label-floating">
											<select name="data[estrato]" id="estratoA" class="selectpicker form-control">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
												<option>6</option>
											</select>
										</div>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">fingerprint</i>
										</span>
										<div class="form-group label-floating">
											<input name="data[documento]" id="documento" type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">settings_cell</i>
										</span>
										<div class="form-group label-floating">
											<input name="data[celular]" id="celular" type="number" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<div class="form-group label-floating">
											<input name="data[email]" id="email" value="asd@asd" type="email" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">date_range</i>
										</span>
										<div class="form-group label-floating">
											<input name="data[edad]" id="edad" type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">grade</i>
										</span>
										<div class="form-group label-floating">
											<select name="data[sexo]" id="sexo" class="selectpicker form-control">
												<option>Sexo</option>
												<option>M</option>
												<option>F</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">compare_arrows</i>
										</span>
										<div class="form-group label-floating">
											<input name="data[direccion]" id="dir" type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">school</i>
										</span>
										<div class="form-group label-floating">
											<input name="data[colegio]" id="colegio" type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">call</i>
										</span>
										<div class="form-group label-floating">
											<input name="data[telefono]" id="tel" type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">person_pin_circle</i>
										</span>
										<div class="form-group label-floating">
											<input type="text" name="data[ciudadOA]" id="ciudadOA" class="form-control" placeholder="Ciudad Origen">
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">place</i>
										</span>
										<div class="form-group label-floating">
											<input type="text" name="data[ciudadRA]" id="ciudadRA" class="form-control" placeholder="Ciudad Residencia">
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">cake</i>
										</span>
										<div class="form-group label-floating">
											<input name="data[fechaN]" id="fechaNac" class="datepicker form-control" type="text"/>
										</div>
										<script type="text/javascript">
											$('.datepicker').datepicker({
												weekStart:1,
												color: 'red'
											});
										</script>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="actualizar" data-dismiss="modal" class="btn btn-success">Actualizar</button>
				</div>
			</div>
		</div>
	</div>

	<div id="Ver" class="modal fade" role="dialog">
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
                    		<th data-field="nombre" data-sortable="true">Nombre</th>
                    		<th data-field="carrera" data-sortable="true">Carrera</th>
                    	</thead>
                    	<tbody id="bodyVerTodos">
                    		<tr>
                            	<td></td>
                            	<td></td>
                            	<td><a href=""></a></td>
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

<div id="Elim" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
					<div class="fresh-table full-color-orange">
                    <table id="fresh-table2" class="table">
                        <thead>
                            <th data-field="id">Codigo</th>
                        	<th data-field="name" data-sortable="true">Nombre</th>
                        	<th data-field="actions">Acción</th>
                        </thead>
                        <tbody id="bodyEliminar">
                            <tr>
                            	<td></td>
                            	<td></td>
                            	<td><a href=""></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <script type="text/javascript">
                	var $table = $('#fresh-table2'),
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
				<button type="button" id="cerrarEliminar" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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