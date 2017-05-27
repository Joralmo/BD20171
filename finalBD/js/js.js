jQuery(document).ready(function($) {


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
				if(datos=="[]"){
					swal('Bien!','Estudiante creado con exito','success');
				}else{
					swal('Error','Ya existe un estudiante con el codigo o documento ingrasados','error');
					console.log(data);
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
		'<label class="control-label">Nombre</label><input value="'+nombreC+'" name="data[Nombre]" required="" type="text" class="form-control">'+
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
		'<label class="control-label">Nombre</label><input value="'+nombreC+'" name="data[descripcion]" required="" type="text" class="form-control">'+
		'</form>';
		if($(this).find('a').attr('name')=="Eliminar"){
			id=$(this).find('a').attr('id');
			$.post('eliminarFacultad',{id:id},function(msg){
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
						tablaMaterias.html(null);
					}
				});
			})
		}
	});
	//End Ver, Actualizar y Eliminar
	//End Facultades
});