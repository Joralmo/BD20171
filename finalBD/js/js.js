jQuery(document).ready(function($) {

	function objectFindByKey(array, key, value) {
		for (var i = 0; i < array.length; i++) {
			if(array[i]!=null){
				if (array[i][key] === value) {
					return array[i];
				}
			}
		}
		return null;
	}

	// Estudiantes
	// Horario
	$("#mostrar").click(function(event) {
		$(".oculto").css({
			display: 'block'
		});
	});
	$("#guardar").click(function(event) {
		$(".oculto").css({
			display: 'none'
		});
	});

	//nuevo estudiante
	var crear = $("#crear");
	crear.click(function(event) {
		var data=new FormData($("#nuevoEstudiante")[0]);
		$.ajax({
			url: 'nuevoEstudiante',
			type: 'POST',
			data: data,
			contentType: false,
			processData: false,
			success: function(datos)
			{	
				json=$.parseJSON(datos);
				console.log(json)
				if(json==true){
					swal('Bien!','Estudiante creado con exito','success');
				}else{
					swal('Error','Ya existe un estudiante con el codigo o documento ingrasados','error');
				}
			}
		});
		
	});
	//end nuevo estudiante

	//actualizar estudiante
	divInputs=$("#actualizarEstudiante").find('input');
	var buscar=$("#buscarEst");
	buscar.click(function(event) {
		event.preventDefault();
		codigo=$("#codigo").val();
		aparecer=$(".aparecer");
		btnActualizar=$("#actualizar");
		$.post('buscar', {codigo: codigo}, function(data) {
			json=$.parseJSON(data);
			fechaA=$("#fechaNac");
			sexo=$("#sexo");
			estratoA=$("#estatoA");
			ciudadOA=$("#ciudadOA");
			ciudadRA=$("#ciudadRA");
			if(data=="[]"){
				btnActualizar.css({
					display: 'none'
				});
				swal('Error','Estudiante no existe','error');
				aparecer.css({
					display: 'none'
				});
			}else{
				btnActualizar.css({
					display: 'block'
				});
				aparecer.css({
					display: 'block'
				});
				for (var i = 0; i < divInputs.length-1; i++) {
					$("#"+divInputs[i].id).val(json[0][divInputs[i].id]);
				}
				fechaA.val(json[0]["fechaNac"]);
				estratoA.val(json[0]["estrato"]);
				sexo.val(json[0]["sexo"]);
				btnActualizar.click(function(event) {
					event.preventDefault();
					codigo=$("#codigo").val();
					var data=new FormData($("#actualizarEstudiante")[0]);
					data.append("data[codigo]",codigo);
					$.ajax({
						url: 'actualizar',
						type: 'POST',
						data: data,
						contentType: false,
						processData: false,
						success: function(datos)
						{
							// console.log(datos);
							swal('Bien!','Estudiante actualizado con exito','success');
						}
					});
				});
			}
		});
	});
	//end actualizar estudiante

	//Ver todos lo estudiantes

	var verTodos=$("#VerTodos");
	verTodos.click(function(event) {
		tablaVer=$("#bodyVerTodos");
		cerrar=$("#cerrarVerTodos");
		cerrar.click(function(event) {
			tablaVer.html(null);
		});
		$.ajax({
			url: 'verTodos',
			type: 'POST',
			success: function(data){
				json=$.parseJSON(data);
				console.log(json)
				for (estudiante of json) {
					tablaVer.append('<tr><td>'+estudiante.codigo+'</td><td>'+estudiante.nombre+' '+estudiante.apellido+'</td><td>'+estudiante.carrera+'</td></tr>');
				}
			}
		});
	});

	//end Ver Todos estudiantes

	function llenarEl(){
		$.ajax({
			url: 'verTodos',
			type: 'POST',
			success: function(data){
				json=$.parseJSON(data);
				for (estudiante of json) {
					eliminar.append('<tr><td>'+estudiante.codigo+'</td><td>'+estudiante.nombre+' '+estudiante.apellido+'</td><td><a href="" id="'+estudiante.codigo+'">Eliminar</a></td></tr>');
				}
			}
		});
	}

	//eliminar Estudiantes
	var eliminarEst=$("#EliminarEst");
	eliminar=$("#bodyEliminar");
	cerrarE=$("#cerrarEliminar");
	cerrarE.click(function(event) {
		eliminar.html(null);
	});
	eliminarEst.click(function(event) {
		llenarEl();
	});
	eliminar.on('click', 'tr', function(event) {
		event.preventDefault();
		codigoEliminar=$(this).find('a').attr('id');
		console.log(codigoEliminar);
		$.ajax({
			url: 'eliminar',
			type: 'POST',
			data:{codigo:codigoEliminar},
			success: function(){
				swal('Bien!', 'Estudiante con codigo '+codigoEliminar+' eliminado', 'success');
				eliminar.html(null);
				llenarEl();
			}
		});
	});
	//end Eliminar Estudiantes

	// Horario
	// Estudiantes

	//Profesores

	//Nuevo Profesor
	btnNuevo=$("#btnNuevo");
	selectFacultades=$("#facultad");
	btnNuevo.click(function(){
		$.ajax({
			url: 'llenarFacultades',
			type: 'POST',
			contentType: false,
			processData: false,
			success: function(datos){
				json=$.parseJSON(datos);
				console.log(json);
				for(facultad of json){
					selectFacultades.append('<option value="'+facultad["idFactultad"]+'">'+facultad["descripcion"]+'</option>')
				};
			}
		});
	});
	crearProfesor=$("#crearProfesor");
	crearProfesor.click(function(){
		var data=new FormData($("#nuevoProfesor")[0]);
		$.ajax({
			url: 'nuevoProfesor',
			type: 'POST',
			data: data,
			contentType: false,
			processData: false,
			success: function(datos)
			{
				if(datos==1){
					swal('Bien!', 'Profesor registrado', 'success');
				}else{
					swal('Error!', 'Profesor no registrado', 'error');
				}
			}
		});
	})
	//End Nuevo Profesor

	//Ver, Actualizar y Eliminar
	verProfesores=$("#VerProfesores");
	tablaProfesores=$("#bodyVerProfesores");
	btnEditarProfesor=$(".Editar");
	btnEliminarProfesor=$(".Eliminar");
	verProfesores.click(function(){
		$.ajax({
			url: 'verProfesores',
			type: 'POST',
			contentType: false,
			processData: false,
			success: function(datos)
			{
				// tablaVer.append('<tr><td>'+estudiante.codigo+'</td><td>'+estudiante.nombre+' '+estudiante.apellido+'</td><td>'+estudiante.carrera+'</td></tr>');
				json=$.parseJSON(datos);
				for(profesor of json){
					tablaProfesores.append('<tr><td>'+profesor["idProfesor"]+'</td><td><img id="imgProfesor" src="'+profesor["Imagen"]+'"></img></td><td>'+profesor["Nombre"]+' '+profesor["Apellido"]+'</td><td>'+profesor["Titulo"]+'</td><td>'+profesor["descripcion"]+'</td><td><a class="btn btn-info" name="Editar" id="'+profesor["idProfesor"]+'"><i class="material-icons">create</i></a></td><td><a class="btn btn-danger" name="Eliminar" id="'+profesor["idProfesor"]+'"><i class="material-icons">clear</i></a></td></tr>');
				}
				console.log(json);
			}
		});
	})
	tablaProfesores.on("click", 'td', function(){
		nombreC=$(this).siblings('td').eq(2).html();
		array=nombreC.split(" ");
		titulo=$(this).siblings('td').eq(3).html();
		var idEnUso=$(this).find('a').attr('id');
		form=	'<form id="editarProfesor">'+
		'<label class="control-label">Nombre</label><input value="'+array[0]+'" name="data[Nombre]" required="" type="text" class="form-control">'+
		'<label class="control-label">Apellido</label><input value="'+array[1]+'" name="data[Apellido]" required="" type="text" class="form-control">'+
		'<label class="control-label">Titulo</label><input value="'+titulo+'" name="data[Titulo]" required="" type="text" class="form-control">'+
		'</form>';
		if($(this).find('a').attr('name')=="Eliminar"){
			id=$(this).find('a').attr('id');
			$.post('eliminarProfesor',{id:id},function(msg){
				if(msg>0){
					swal({
						type: 'success',
						title: 'Bien',
						html: "Profesor Eliminado"
					});
					ocultar=$("#cerrarVerTodos");
					ocultar.trigger('click');
					tablaProfesores.html(null);
				}
			});
		}else if($(this).find('a').attr('name')=="Editar"){
			var nombre, apellido, titulo;
			swal({
				title: 'Editar el profesor con codigo '+idEnUso,
				html: form,
				showCancelButton: true,
				confirmButtonText: 'Actualizar',
				showLoaderOnConfirm: true,
				preConfirm: function () {
					return new Promise(function (resolve, reject) {
						setTimeout(function() {
							nombre=$("#editarProfesor > input").eq(0);
							apellido=$("#editarProfesor > input").eq(1);
							titulo=$("#editarProfesor > input").eq(2);
							if(nombre.val().length>0 && apellido.val().length>0 && titulo.val().length>0){
								resolve()
							}else{
								reject('Por favor rellene todos los campos.');
							}
							
						}, 1000)
					})
				},
				allowOutsideClick: false
			}).then(function () {
				var data=new FormData($("#editarProfesor")[0]);
				data.append("idProfesor", idEnUso);
				$.ajax({
					url: 'editarProfesor',
					type: 'POST',
					data:data,
					contentType: false,
					processData: false,
					success: function(datos)
					{
						swal({
							type: 'success',
							title: 'Actualizado',
							html: nombre.val()+' '+apellido.val()+' '+titulo.val()
						});
						ocultar=$("#cerrarVerTodos");
						ocultar.trigger('click');
						tablaProfesores.html(null);
					}
				});
			})
		}
	});
	//End Ver, Actualizar y Eliminar
	
	//End Profesores

	//Materias
	btnNuMateria=$("#crearMateria");
	btnVerMaterias=$("#VerMaterias");
	//Nueva
	btnNuMateria.click(function(event) {
		var data = new FormData($("#nuevoMateria")[0]);
		$.ajax({
			url: 'nuevaMateria',
			type: 'POST',
			data:data,
			contentType: false,
			processData: false,
			success: function(datos){
				if(datos!=0){
					swal('Bien!', 'Materia agregada', 'success');
				}else{
					swal('Error!', 'Materia no agregada', 'error');
				}
			}
		})
	});
	//End Nueva
	//Ver, Actualizar y Eliminar
	tablaMaterias=$("#bodyVerMaterias");
	btnVerMaterias.click(function(e){
		$.ajax({
			url: 'verMaterias',
			type: 'POST',
			contentType: false,
			processData: false,
			success: function(datos)
			{
				// tablaVer.append('<tr><td>'+estudiante.codigo+'</td><td>'+estudiante.nombre+' '+estudiante.apellido+'</td><td>'+estudiante.carrera+'</td></tr>');
				json=$.parseJSON(datos);
				for(materia of json){
					tablaMaterias.append('<tr><td>'+materia["Nombre"]+'</td><td>'+materia["IntesidadHoraria"]+'<td><a class="btn btn-info" name="Editar" id="'+materia["idMaterias"]+'"><i class="material-icons">create</i></a></td><td><a class="btn btn-danger" name="Eliminar" id="'+materia["idMaterias"]+'"><i class="material-icons">clear</i></a></td></tr>');
				}
			}
		});
	});
	tablaMaterias.on("click", 'td', function(){
		nombreC=$(this).siblings('td').eq(0).html();
		Ih=$(this).siblings('td').eq(1).html();
		var idEnUso=$(this).find('a').attr('id');
		form=	'<form id="editarMateria">'+
		'<label class="control-label">Nombre</label><input value="'+nombreC+'" name="data[NombreMateria]" required="" type="text" class="form-control">'+
		'<label class="control-label">Apellido</label><input value="'+Ih+'" name="data[IntesidadHoraria]" required="" type="text" class="form-control">'+
		'</form>';
		if($(this).find('a').attr('name')=="Eliminar"){
			id=$(this).find('a').attr('id');
			$.post('eliminarMateria',{id:id},function(msg){
				console.log(msg);
				if(msg>0){
					swal({
						type: 'success',
						title: 'Bien',
						html: "Materia Eliminada"
					});
					ocultar=$("#cerrarVerTodos");
					ocultar.trigger('click');
					tablaMaterias.html(null);
				}
			});
		}else if($(this).find('a').attr('name')=="Editar"){
			var nombre, Ih;
			swal({
				title: 'Editar Materia '+nombre,
				html: form,
				showCancelButton: true,
				confirmButtonText: 'Actualizar',
				showLoaderOnConfirm: true,
				preConfirm: function () {
					return new Promise(function (resolve, reject) {
						setTimeout(function() {
							nombre=$("#editarMateria > input").eq(0);
							Ih=$("#editarMateria > input").eq(1);
							if(nombre.val().length>0 && Ih.val().length>0){
								resolve()
							}else{
								reject('Por favor rellene todos los campos.');
							}
							
						}, 1000)
					})
				},
				allowOutsideClick: false
			}).then(function () {
				var data=new FormData($("#editarMateria")[0]);
				data.append("idMateria", idEnUso);
				$.ajax({
					url: 'editarMateria',
					type: 'POST',
					data:data,
					contentType: false,
					processData: false,
					success: function(datos)
					{	console.log(datos)
						swal({
							type: 'success',
							title: 'Actualizado',
							html: nombre.val()+' '+Ih.val()
						});
						ocultar=$("#cerrarVerTodos");
						ocultar.trigger('click');
						tablaMaterias.html(null);
					}
				});
			})
		}
	});
	//End Ver, Actualizar y Eliminar
	//End Materias

	//Facultades
	//Nueva Facultad
	btnNuFacultad=$("#btnNuevaFacultad");
	btnVerFactultades=$("#VerFacultades");
	btnNuFacultad.click(function(event) {
		swal({
			title: 'Aregar nueva facultad',
			input: 'text',
			showCancelButton: true,
			confirmButtonText: 'Guardar',
			showLoaderOnConfirm: true,
			preConfirm: function (text) {
				return new Promise(function (resolve, reject) {
					setTimeout(function() {
						$.post('buscarFacultad', {nombre:text}, function(msg){
							if ($.parseJSON(msg)[0]==text){
								reject('Esta facultad ya existe')
							} else {
								$.post('nuevaFacultad',{nombre:text}, function(msg){
									if(msg!=0){
										resolve()
									}
								});
							}
						});
					}, 2000)
				})
			},
			allowOutsideClick: false
		}).then(function (text) {
			swal({
				type: 'success',
				title: 'Bien!',
				html: 'Facultad agregada: ' + text
			})
		})
	});
	//End Nueva Facultad

	//Ver, Actualizar y Eliminar
	tablaFacultades=$("#bodyVerFacultades");
	btnVerFactultades.click(function(e){
		$.ajax({
			url: 'verFacutades',
			type: 'POST',
			contentType: false,
			processData: false,
			success: function(datos)
			{
				// tablaVer.append('<tr><td>'+estudiante.codigo+'</td><td>'+estudiante.nombre+' '+estudiante.apellido+'</td><td>'+estudiante.carrera+'</td></tr>');
				json=$.parseJSON(datos);
				for(facultad of json){
					tablaFacultades.append('<tr><td>'+facultad["descripcion"]+'</td><td><a class="btn btn-info" name="Editar" id="'+facultad["idFactultad"]+'"><i class="material-icons">create</i></a></td><td><a class="btn btn-danger" name="Eliminar" id="'+facultad["idFactultad"]+'"><i class="material-icons">clear</i></a></td></tr>');
				}
			}
		});
	});
	tablaFacultades.on("click", 'td', function(){
		var nombreC=$(this).siblings('td').eq(0).html();
		var idEnUso=$(this).find('a').attr('id');
		form=	'<form id="editarFacultad">'+
		'<label class="control-label">Nombre</label><input value="'+nombreC+'" name="descripcion" required="" type="text" class="form-control">'+
		'</form>';
		if($(this).find('a').attr('name')=="Eliminar"){
			id=$(this).find('a').attr('id');
			$.post('eliminarFacultad',{id:id},function(msg){
				console.log(msg);
				if(msg>0){
					swal({
						type: 'success',
						title: 'Bien',
						html: "Facultad Eliminada"
					});
					ocultar=$("#cerrarVerTodos");
					ocultar.trigger('click');
					tablaFacultades.html(null);
				}
			});
		}else if($(this).find('a').attr('name')=="Editar"){
			var nombre;
			swal({
				title: 'Editar Materia '+nombreC,
				html: form,
				showCancelButton: true,
				confirmButtonText: 'Actualizar',
				showLoaderOnConfirm: true,
				preConfirm: function () {
					return new Promise(function (resolve, reject) {
						setTimeout(function() {
							nombre=$("#editarFacultad > input").eq(0);
							if(nombre.val().length>0){
								resolve()
							}else{
								reject('Por favor rellene todos los campos.');
							}
							
						}, 1000)
					})
				},
				allowOutsideClick: false
			}).then(function () {
				var data=new FormData($("#editarFacultad")[0]);
				data.append("idFacultad", idEnUso);
				$.ajax({
					url: 'editarFacultad',
					type: 'POST',
					data:data,
					contentType: false,
					processData: false,
					success: function(datos)
					{	console.log(datos)
						swal({
							type: 'success',
							title: 'Actualizado',
							html: nombre.val()
						});
						ocultar=$("#cerrarVerTodos");
						ocultar.trigger('click');
						tablaFacultades.html(null);
					}
				});
			})
		}
	});
	//End Ver, Actualizar y Eliminar
	//End Facultades

	//Carreras
	//Nueva Carrera
	tablaCarreras=$("#bodyVerCarreras");
	btnNuCarrera=$("#btnNuevaCarrera");
	btnVerCarreras=$("#VerCarreras");
	var nombreC, facultadC;
	form='<form id="nuevaCarrera">'+
	'<label class="control-label">Nombre</label><input name="descripcion" required="" type="text" class="form-control">'+
	'<label class="control-label">Facultad a la que pertenece</label><select id="facCarreras" name="descripcion" class="form-control">';
	$.post('llenarFacultades', function(msg){
		json=$.parseJSON(msg);
		for(facultad of json){
			form+="<option value="+facultad.idFactultad+">"+facultad.descripcion+"</option>";
		}
		form+="</select></form>";
	});
	btnNuCarrera.click(function(event) {
		swal({
			title: 'Aregar nueva carrera',
			html: form,
			showCancelButton: true,
			confirmButtonText: 'Guardar',
			showLoaderOnConfirm: true,
			preConfirm: function (text) {
				return new Promise(function (resolve, reject) {
					setTimeout(function() {
						nombreC=$("#nuevaCarrera > input");
						facultadC=$("#facCarreras");
						$.post('buscarCarrera', {nombre:nombreC.val()}, function(msg){
							if ($.parseJSON(msg)[0]==nombreC.val()){
								reject('Esta carrera ya existe')
							} else {
								$.post('nuevaCarrera',{nombre:nombreC.val(),fac:facultadC.val()}, function(msg){
									if(msg!=0){
										resolve()
									}
								});
							}
						});
					}, 2000)
				})
			},
			allowOutsideClick: false
		}).then(function (text) {
			swal({
				type: 'success',
				title: 'Bien!',
				html: 'Carrera agregada: ' + nombreC.val()
			})
		})
	});
	//End Nueva Carrera

	//Ver, Editar y Eliminar
	tablaCarreras=$("#bodyVerCarreras");
	btnVerCarreras.click(function(e){
		$.ajax({
			url: 'verCarreras',
			type: 'POST',
			contentType: false,
			processData: false,
			success: function(datos)
			{
				// tablaVer.append('<tr><td>'+estudiante.codigo+'</td><td>'+estudiante.nombre+' '+estudiante.apellido+'</td><td>'+estudiante.carrera+'</td></tr>');
				json=$.parseJSON(datos);
				for(carrera of json){
					tablaCarreras.append('<tr><td>'+carrera["Nombre"]+'</td><td>'+carrera["descripcion"]+'</td><td><a class="btn btn-info" name="Editar" id="'+carrera["idCarrera"]+'"><i class="material-icons">create</i></a></td><td><a class="btn btn-danger" name="Eliminar" id="'+carrera["idCarrera"]+'"><i class="material-icons">clear</i></a></td></tr>');
				}
			}
		});
	});
	tablaCarreras.on("click", 'td', function(){
		var nombreC=$(this).siblings('td').eq(0).html();
		var idEnUso=$(this).find('a').attr('id');
		form2=	'<form id="editarCarrera">'+
		'<label class="control-label">Nombre</label><input value="'+nombreC+'" name="nombre" required="" type="text" class="form-control">'+
		'</form>';
		if($(this).find('a').attr('name')=="Eliminar"){
			id=$(this).find('a').attr('id');
			$.post('eliminarCarrera',{id:id},function(msg){
				console.log(msg);
				if(msg>0){
					swal({
						type: 'success',
						title: 'Bien',
						html: "Carrera Eliminada"
					});
					ocultar=$("#cerrarVerTodos");
					ocultar.trigger('click');
					tablaCarreras.html(null);
				}
			});
		}else if($(this).find('a').attr('name')=="Editar"){
			var nombre;
			swal({
				title: 'Editar Carrera '+nombreC,
				html: form2,
				showCancelButton: true,
				confirmButtonText: 'Actualizar',
				showLoaderOnConfirm: true,
				preConfirm: function () {
					return new Promise(function (resolve, reject) {
						setTimeout(function() {
							nombre=$("#editarCarrera > input");
							console.log(nombre.val())
							if(nombre.val().length>0){
								resolve()
							}else{
								reject('Por favor rellene todos los campos.');
							}
							
						}, 1000)
					})
				},
				allowOutsideClick: false
			}).then(function () {
				var data=new FormData($("#editarCarrera")[0]);
				data.append("idCarrera", idEnUso);
				$.ajax({
					url: 'editarCarrera',
					type: 'POST',
					data:data,
					contentType: false,
					processData: false,
					success: function(datos)
					{	console.log(datos)
						swal({
							type: 'success',
							title: 'Actualizada',
							html: nombre.val()
						});
						ocultar=$("#cerrarVerTodos");
						ocultar.trigger('click');
						tablaCarreras.html(null);
					}
				});
			})
		}
	});
	//End Ver, Editar y Eliminar
	//End Carreras

	//Grupos
	//Nuevo Grupo
	tablaGrupos=$("#bodyVerGrupos");
	btnNuGrupo=$("#btnNuevoGrupo");
	btnVerGrupos=$("#VerGrupos");
	var nombreC, facultadC;
	form3='<form id="nuevoGrupo">'+
	'<label class="control-label">Número</label><input name="data[Numero]" required="" type="number" class="form-control">'+
	'<label class="control-label">Número de estudiantes</label><input name="data[numeroDeEstudiantes]" required="" type="number" class="form-control">'+
	'<label class="control-label">Facultad a la que pertenece</label><select id="materia" name="data[MateriasidMaterias]" class="form-control">';
	$.post('llenarMaterias', function(msg){
		json=$.parseJSON(msg);
		for(materia of json){
			form3+="<option value="+materia.idMaterias+">"+materia.Nombre+"</option>";
		}
		form3+="</select></form>";
	});
	btnNuGrupo.click(function(event) {
		swal({
			title: 'Aregar nuevo grupo',
			html: form3,
			showCancelButton: true,
			confirmButtonText: 'Guardar',
			showLoaderOnConfirm: true,
			preConfirm: function (text) {
				return new Promise(function (resolve, reject) {
					setTimeout(function() {
						nombreC=$("#nuevoGrupo > input").eq(0);
						nEstu=$("#nuevoGrupo > input").eq(1);
						materia=$("#materia");
						var data = new FormData($("#nuevoGrupo")[0]);
						$.ajax({
							url: 'nuevoGrupo',
							type: 'POST',
							data:data,
							contentType: false,
							processData: false,
							success: function(datos)
							{	
								if (datos>0) {
									resolve();
								}
							}
						});
					}, 2000)
				})
			},
			allowOutsideClick: false
		}).then(function (text) {
			swal({
				type: 'success',
				title: 'Bien!',
				html: 'Grupo '+nombreC.val()+' agregado'
			})
		})
	});

	//End Nuevo Grupo
	//Ver, actualizar y eliminar
	tablagrupos=$("#bodyVerGrupos");
	btnVerGrupos.click(function(e){
		$.ajax({
			url: 'verGrupos',
			type: 'POST',
			contentType: false,
			processData: false,
			success: function(datos)
			{
				// tablaVer.append('<tr><td>'+estudiante.codigo+'</td><td>'+estudiante.nombre+' '+estudiante.apellido+'</td><td>'+estudiante.carrera+'</td></tr>');
				json=$.parseJSON(datos);
				for(grupo of json){
					tablaGrupos.append('<tr><td>'+grupo["Numero"]+'</td><td>'+grupo["numeroDeEstudiantes"]+'</td><td>'+grupo["Nombre"]+'</td><td><a class="btn btn-info" name="Editar" id="'+grupo["idGrupos"]+'"><i class="material-icons">create</i></a></td><td><a class="btn btn-danger" name="Eliminar" id="'+grupo["idGrupos"]+'"><i class="material-icons">clear</i></a></td></tr>');
				}
			}
		});
	});
	tablaGrupos.on("click", 'td', function(){
		var nombreC=$(this).siblings('td').eq(0).html();
		var nEstu=$(this).siblings('td').eq(1).html();
		var idEnUso=$(this).find('a').attr('id');
		form4=	'<form id="editarGrupo">'+
		'<label class="control-label">Numero</label><input value="'+nombreC+'" name="nGrupo" required="" type="number" class="form-control">'+
		'<label class="control-label">Número de estudiantes</label><input value="'+nEstu+'" name="nEstu" required="" type="number" class="form-control">'+
		'</form>';
		if($(this).find('a').attr('name')=="Eliminar"){
			id=$(this).find('a').attr('id');
			$.post('eliminarGrupo',{id:id},function(msg){
				console.log(msg);
				if(msg>0){
					swal({
						type: 'success',
						title: 'Bien',
						html: "Grupo Eliminado"
					});
					ocultar=$("#cerrarVerTodos");
					ocultar.trigger('click');
					tablaGrupos.html(null);
				}
			});
		}else if($(this).find('a').attr('name')=="Editar"){
			var nombre, nEst;
			swal({
				title: 'Editar Grupo '+nombreC,
				html: form4,
				showCancelButton: true,
				confirmButtonText: 'Actualizar',
				showLoaderOnConfirm: true,
				preConfirm: function () {
					return new Promise(function (resolve, reject) {
						setTimeout(function() {
							nombre=$("#editarGrupo > input").eq(0);
							nEstu=$("#editarGrupo > input").eq(1);
							// console.log();
							if(nombre.val().length>0 && nEstu.val().length>0){
								resolve()
							}else{
								reject('Por favor rellene todos los campos.');
							}
							
						}, 1000)
					})
				},
				allowOutsideClick: false
			}).then(function () {
				var data=new FormData($("#editarGrupo")[0]);
				data.append("idGrupos", idEnUso);
				$.ajax({
					url: 'editarGrupo',
					type: 'POST',
					data:data,
					contentType: false,
					processData: false,
					success: function(datos)
					{	console.log(datos)
						swal({
							type: 'success',
							title: 'Actualizado',
							html: "Grupo "+nombre.val()+" actualizado"
						});
						ocultar=$("#cerrarVerTodos");
						ocultar.trigger('click');
						tablaGrupos.html(null);
					}
				});
			})
		}
	});

	//End Ver, actualizar y eliminar
	//End Grupos

	//HORAIO
	//NUEVO HORARIO
	modificarHorario=$("#modificar");
	var grupos=new Array();
	var dias=["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"];
	var rellenarTabla;
	// copia=$(".preHorario");
	// real=$(".horarioReal");
	$.post('getHorarioEst',function(msg){
		var json=$.parseJSON(msg);
		// console.log(json);
		add = $(".horarioReal tr");
		for(mat of json){
			dia=mat["Dias"]-1;
			add.after("<tr><th>"+mat["NombreMateria"]+"</th><th>"+mat["Nombre"]+' '+mat["Apellido"]+"</th><th>"+mat["Numero"]+"</th><th>"+dias[dia]+"</th><th>"+mat["horaInicio"][0]+""+mat["horaInicio"][1]+" - "+mat["horaFin"][0]+""+mat["horaFin"][1]+"</th></tr>")
		}
		$.post('getDatos',function(msg){
			// </tbody></table>'
			json1=$.parseJSON(msg);
			rellenarTabla=json1;
			// console.log(json1)
			i=0;
			for(todo of json1){
				for(j=0;j<json.length;j++){
					if(json[j]["NombreMateria"]==todo["NombreMateria"]){
						delete json1[i];
					}
				}
				// if (json[i]) {
				// 	if(json[i]["NombreMateria"]==todo["NombreMateria"]){
				// 		console.log(todo["NombreMateria"])
				// 	}
				// }
				i++;
			}
			copia=$(".preHorario");
			real=$(".horarioReal");
			copia.html(real.html())
			// json1.splice(0, 1);
			console.log(json1)
			for(todo of json1){
				if(todo!=null){
					dia=todo["Dias"]-1;
					formAsignatura+='<tr><th width="260px" class="bg-warning">'+todo["NombreMateria"]+'</th><th class="bg-warning">'+todo["Nombre"]+' '+todo["Apellido"]+'</th><th width="30px" class="bg-warning">'+todo["Numero"]+'</th>';
					formAsignatura+='<th width="260px" class="bg-warning">'+dias[dia]+'</th><th class="bg-warning">'+todo["horaInicio"][0]+''+todo["horaInicio"][1]+' - '+todo["horaFin"][0]+''+todo["horaFin"][1]+'</th><th class="bg-warning"><a href="#" id='+todo["idGrupos"]+'><i class="material-icons">done</i></a></th></tr>';
				}
			}
			// for(todo of json1){
			// 	console.log(todo["NombreMateria"])
			// }

				// 	if(json[i]["NombreMateria"]!=todo["NombreMateria"]){
				// 		dia=todo["Dias"]-1;
				// 		formAsignatura+='<tr><th width="260px" class="bg-warning">'+todo["NombreMateria"]+'</th><th class="bg-warning">'+todo["Nombre"]+' '+todo["Apellido"]+'</th><th width="30px" class="bg-warning">'+todo["Numero"]+'</th>';
				// 		formAsignatura+='<th width="260px" class="bg-warning">'+dias[dia]+'</th><th class="bg-warning">'+todo["horaInicio"][0]+''+todo["horaInicio"][1]+' - '+todo["horaFin"][0]+''+todo["horaFin"][1]+'</th><th class="bg-warning"><a href="#" id='+todo["idGrupos"]+'><i class="material-icons">done</i></a></th></tr>';
				// 	}
				// }else{
				// 	
				// }
				formAsignatura+="</tbody></table>";
			})
	})
	var formAsignatura='<table class="table table-condensed matAgregar" id="cabecera">'+
	'<tbody>'+
	'<tr><th width="260px" class="bg-warning">ASIGNATURA</th><th class="bg-warning">DOCENTE</th><th width="30px" class="bg-warning">G</th>'+
	'<th width="45px" class="bg-warning">Diá</th><th width="45px" class="bg-warning">Horario</th><th width="45px" class="bg-warning">+</th></tr>';
	modificarHorario.click(function(event) {
		swal({
			title: 'Modificar horario',
			html: formAsignatura,
			showCancelButton: false,
			confirmButtonText: 'Cancelar',
			showLoaderOnConfirm: true,
			preConfirm: function () {
				return new Promise(function (resolve, reject) {
					setTimeout(function() {
						resolve();
					}, 1000)
				})
			},
			allowOutsideClick: false
		}).then(function () {
			ocultar=$("#cerrarVerTodos");
			ocultar.trigger('click');
		})

		tablamatAgregar=$(".matAgregar");
		tablamatAgregar.on("click", 'tr', function(e){
			e.preventDefault();
			agregar=$(this).find('a').attr('id');
			n=objectFindByKey(rellenarTabla, 'idGrupos', agregar);
			grupos.push(agregar);
			console.log(grupos)
			tablaPre=$(".preHorario tr:last");
			dia=n["Dias"]-1;
			tablaPre.after("<tr><th>"+n["NombreMateria"]+"</th><th>"+n["Nombre"]+' '+n["Apellido"]+"</th><th>"+n["Numero"]+"</th><th>"+dias[dia]+"</th><th>"+n["horaInicio"][0]+""+n["horaInicio"][1]+" - "+n["horaFin"][0]+""+n["horaFin"][1]+"</th></tr>")
			ocultar=$(".swal2-confirm");
			ocultar.trigger('click');
		});
	});

	guardarHorario=$("#guardarHorario");
	guardarHorario.click(function(){
		tablaPre=$(".preHorario tr");
		copia=$(".preHorario");
		real=$(".horarioReal");
		if (tablaPre.length>1) {
			$.post("guardarHorario",{idsGrupos:grupos}, function(msg){
				json=$.parseJSON(msg);
				if(json>0){
					swal({
						type: 'success',
						title: 'Bien',
						html: "Horario guardado"
					});
					real.html(copia.html());
					copia.html(null);
					$(".oculto").css({
						display: 'none'
					});
				}
			});
		}else{
			swal({
				type: 'error',
				title: 'Error',
				html: "No hay nada que guardar"
			});
		}
	});
	//END NUEVO HORARIO
	//END HORARIO
});