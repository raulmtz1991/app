$(document).on('ready',function(){
    
    
   
  $('.dropdown > a[tabindex]').keydown(function(event) {
    // 13: Return

    if (event.keyCode == 13) {
      $(this).dropdown('toggle');
    }
  });


  $('.dropdown-submenu > a').submenupicker();

	$('input[name="txtdni"]').on('focusout',function(){
		var input = $(this);
		$.post('buscar-dni/'+$(this).val(),function(data){
			if(data[0].success){
				input.popover('destroy');
				input.popover({
					content:'El dni ya existe',
					placement:'top',
					trigger:'focus'
				});
				input.focus();
			}			
		},'json');
	});
	$('input[name="txtBuscarPaciente"]').on('focusout',function(){
		var input = $(this);
		$.post('buscar-paciente-existe/'+$(this).val(),function(data){
			if(data[0].success==false){
				input.popover('destroy');
				input.popover({
					content:'El paciente no existe',
					placement:'top',
					trigger:'focus'
				});
				input.focus();
			}
		},'json');
	});

	function cerrarModalRayosX(){
		$('#rayosx #modal-eliminar-rayo').modal('hide');
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();				
	}
	function cargarRayosX(){
		return $('#modalSubirRayos').on('click','button[name="btnCargarImagen"]',function(){
			$('#modalSubirRayos input[name="f_subir_rayosx"]').click();
		});
	}
	function cargarBotonRayosX(){
		return $('#modalSubirRayos button[name="btnHecho"]').on('click', function(){
			$('#modalSubirRayos button[name="btnHecho"]').css('display','none');
			$('#modalSubirRayos button[name="btnCargarImagen"]').css('display','inline-block');
			$('#modalSubirRayos button[name="btnCancelar"]').css('display','inline-block');
			$('#modalSubirRayos #mensaje-modal').css('display','block');
			$('#modalSubirRayos #progress-file').css('display','none');
			$('#modalSubirRayos #progress-file .info-file .img-listo #spinner_img').css({'display':'none'});
			$('#modalSubirRayos #progress-file .progress-bar').css('width',0);
			$('#modalSubirRayos #progress-file .info-file .info-imagen span').remove('.nombre-imagen');
			$('#modalSubirRayos #progress-file .info-file .info-imagen span').remove('.peso-imagen');
			$('#modalSubirRayos #progress-file .info-file .img-listo span').remove();
		});
	}
	function cargarBotonCancelarRayosX(){
		$('#modalSubirRayos button[name="btnCancelar"]').on('click',function(){
			$('#modalSubirRayos #mensaje-error').css('display','none');
			$('#modalSubirRayos #mensaje-modal').css('display','block');
		});
	}
	function cargarSubidaRayosX(){
		return $('input[name="f_subir_rayosx"]').fileupload({
			dataType:'json',
			acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
			formData:{
				historiaid:$('#frm-Anamnesis input[name="hdnhistoriaclinicaid"]').val()
			},
			start:function(e){
				$('#modalSubirRayos button[name="btnOcultar"]').css('display','inline-block');
				$('#modalSubirRayos button[name="btnCargarImagen"]').css('display','none');
				$('#modalSubirRayos button[name="btnCancelar"]').css('display','none');
			},
			progress:function(e,data){
				var progress = parseInt(data.loaded / data.total * 100, 10);
				$('#modalSubirRayos #mensaje-modal').css('display','none');
				$('#modalSubirRayos #mensaje-error').css('display','none');
				$('#modalSubirRayos #progress-file').css('display','block');
				$('#modalSubirRayos #progress-file .progress-bar').css('width',progress+'%');
				if(progress==100){
					$('#modalSubirRayos #progress-file .info-file .img-listo #spinner_img').css({'display':'block'});		
				}
			},
			done: function(e,data){
				$('#modalSubirRayos button[name="btnOcultar"]').css('display','none');
				$('#modalSubirRayos button[name="btnHecho"]').css('display','inline-block');
				$('#modalSubirRayos #progress-file .info-file .img-listo #spinner_img').css({'display':'none'});
				$('#modalSubirRayos #progress-file .info-file .img-listo').append('<span><i class="glyphicon glyphicon-ok-circle"></i></span>');
				console.log(data);
			},
			change:function(e, data){
				$.each(data.files,function(index,file){
					$('#modalSubirRayos .info-file .info-imagen').append('<span class="nombre-imagen">'+file.name+'</span>');
					$('#modalSubirRayos .info-file .info-imagen').append('<span class="peso-imagen"> - '+(file.size/1024).toFixed(2)+'kb.</span>');
				});
			}
		}).on('fileuploadprocessalways', function (e, data) {
	    	var currentFile = data.files[data.index];
	    	$('#modalSubirRayos #mensaje-error span').remove();
	    	if (data.files.error && currentFile.error) {
	    		$('#modalSubirRayos #mensaje-modal').css('display','none');
	    		$('#modalSubirRayos #mensaje-error').css('display','block');
	    		$('#modalSubirRayos #mensaje-error').append('<span>Error: Archivo no soportado</span>');
	    	}
	  	});
	}
	function cerrarModalEcografia(){
		$('#ecografia #modal-eliminar-ecografia').modal('hide');
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();				
	}
	function cargarEcografia(){
		return $('#modalSubirImagen').on('click','button[name="btnCargarImagen"]',function(){
			$('#modalSubirImagen input[name="f_subir_imagen"]').click();
		});
	}
	function cargarBotonEcografia(){
		return $('#modalSubirImagen button[name="btnHecho"]').on('click', function(){
			$('#modalSubirImagen button[name="btnHecho"]').css('display','none');
			$('#modalSubirImagen button[name="btnCargarImagen"]').css('display','inline-block');
			$('#modalSubirImagen button[name="btnCancelar"]').css('display','inline-block');
			$('#modalSubirImagen #mensaje-modal').css('display','block');
			$('#modalSubirImagen #progress-file').css('display','none');
			$('#modalSubirImagen #progress-file .info-file .img-listo #spinner_img').css({'display':'none'});
			$('#modalSubirImagen #progress-file .progress-bar').css('width',0);
			$('#modalSubirImagen #progress-file .info-file .info-imagen span').remove('.nombre-imagen');
			$('#modalSubirImagen #progress-file .info-file .info-imagen span').remove('.peso-imagen');
			$('#modalSubirImagen #progress-file .info-file .img-listo span').remove();
		});
	}
	function cargarBotonCancelarEcografia(){
		$('#modalSubirImagen button[name="btnCancelar"]').on('click',function(){
			$('#modalSubirImagen #mensaje-error').css('display','none');
			$('#modalSubirImagen #mensaje-modal').css('display','block');
		});
	}
	function cargarSubidaEcografia(){
		return $('input[name="f_subir_imagen"]').fileupload({
			dataType:'json',
			acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
			formData:{
				historiaid:$('#frm-Anamnesis input[name="hdnhistoriaclinicaid"]').val()
			},
			start:function(e){
				$('#modalSubirImagen button[name="btnOcultar"]').css('display','inline-block');
				$('#modalSubirImagen button[name="btnCargarImagen"]').css('display','none');
				$('#modalSubirImagen button[name="btnCancelar"]').css('display','none');
			},
			progress:function(e,data){
				var progress = parseInt(data.loaded / data.total * 100, 10);
				$('#modalSubirImagen #mensaje-modal').css('display','none');
				$('#modalSubirImagen #mensaje-error').css('display','none');
				$('#modalSubirImagen #progress-file').css('display','block');
				$('#modalSubirImagen #progress-file .progress-bar').css('width',progress+'%');
				if(progress==100){
					$('#modalSubirImagen #progress-file .info-file .img-listo #spinner_img').css({'display':'block'});		
				}
			},
			done: function(e,data){
				$('#modalSubirImagen button[name="btnOcultar"]').css('display','none');
				$('#modalSubirImagen button[name="btnHecho"]').css('display','inline-block');
				$('#modalSubirImagen #progress-file .info-file .img-listo #spinner_img').css({'display':'none'});
				$('#modalSubirImagen #progress-file .info-file .img-listo').append('<span><i class="glyphicon glyphicon-ok-circle"></i></span>');
				console.log(data);
			},
			change:function(e, data){
				$.each(data.files,function(index,file){
					$('#modalSubirImagen .info-file .info-imagen').append('<span class="nombre-imagen">'+file.name+'</span>');
					$('#modalSubirImagen .info-file .info-imagen').append('<span class="peso-imagen"> - '+(file.size/1024).toFixed(2)+'kb.</span>');
				});
			}
		}).on('fileuploadprocessalways', function (e, data) {
	    	var currentFile = data.files[data.index];
	    	$('#modalSubirImagen #mensaje-error span').remove();
	    	if (data.files.error && currentFile.error) {
	    		$('#modalSubirImagen #mensaje-modal').css('display','none');
	    		$('#modalSubirImagen #mensaje-error').css('display','block');
	    		$('#modalSubirImagen #mensaje-error').append('<span>Error: Archivo no soportado</span>');
	    	}
	  	});
	}
	function cerrarModalInforme(){
		$('#informe #modal-eliminar-informe').modal('hide');
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();
	}
	function cargarInforme(){
		return $('#modalSubirInforme').on('click','button[name="btnCargarInforme"]',function(){
			$('#modalSubirInforme input[name="f_subir_informe"]').click();
		}); 
	}
	function cargarBotonInforme(){
		return $('#modalSubirInforme button[name="btnHecho"]').on('click', function(){
			$('#modalSubirInforme button[name="btnHecho"]').css('display','none');
			$('#modalSubirInforme button[name="btnCargarInforme"]').css('display','inline-block');
			$('#modalSubirInforme button[name="btnCancelar"]').css('display','inline-block');
			$('#modalSubirInforme #mensaje-modal').css('display','block');
			$('#modalSubirInforme #progress-file').css('display','none');
			$('#modalSubirInforme #progress-file .info-file .img-listo #spinner_img').css({'display':'none'});
			$('#modalSubirInforme #progress-file .progress-bar').css('width',0);
			$('#modalSubirInforme #progress-file .info-file .info-imagen span').remove('.nombre-imagen');
			$('#modalSubirInforme #progress-file .info-file .info-imagen span').remove('.peso-imagen');
			$('#modalSubirInforme #progress-file .info-file .img-listo span').remove();
		});
	}
	function cargarBotonCancelarInforme(){
			$('#modalSubirInforme button[name="btnCancelar"]').on('click',function(){
			$('#modalSubirInforme #mensaje-error').css('display','none');
			$('#modalSubirInforme #mensaje-modal').css('display','block');
		});		
	}
	function cargarSubidaInforme(){
		return $('input[name="f_subir_informe"]').fileupload({
			acceptFileTypes: /(\.|\/)(doc|pdf|xls|docx|xlsx)$/i,
			dataType:'json',
			formData:{
				historiaid:$('#frm-Anamnesis input[name="hdnhistoriaclinicaid"]').val()
			},
			start:function(e){
				$('#modalSubirInforme button[name="btnOcultar"]').css('display','inline-block');
				$('#modalSubirInforme button[name="btnCargarInforme"]').css('display','none');
				$('#modalSubirInforme button[name="btnCancelar"]').css('display','none');
			},
			progress:function(e,data){
				var progress = parseInt(data.loaded / data.total * 100, 10);
				$('#modalSubirInforme #mensaje-modal').css('display','none');
				$('#modalSubirInforme #progress-file').css('display','block');
				$('#modalSubirInforme #progress-file .progress-bar').css('width',progress+'%');
				if(progress==100){
					$('#modalSubirInforme #progress-file .info-file .img-listo #spinner_img').css({'display':'block'});		
				}
			},
			done: function(e,data){
				$('#modalSubirInforme button[name="btnOcultar"]').css('display','none');
				$('#modalSubirInforme button[name="btnHecho"]').css('display','inline-block');
				$('#modalSubirInforme #progress-file .info-file .img-listo #spinner_img').css({'display':'none'});
				$('#modalSubirInforme #progress-file .info-file .img-listo').append('<span><i class="glyphicon glyphicon-ok-circle"></i></span>');
			},
			change:function(e, data){
				$.each(data.files,function(index,file){
					$('#modalSubirInforme .info-file .info-imagen').append('<span class="nombre-imagen">'+file.name+'</span>');
					$('#modalSubirInforme .info-file .info-imagen').append('<span class="peso-imagen"> - '+(file.size/1024).toFixed(2)+'kb.</span>');
				});
			}
		}).on('fileuploadprocessalways', function (e, data) {
			var currentFile = data.files[data.index];
    			$('#modalSubirInforme #mensaje-error span').remove();
    			if (data.files.error && currentFile.error) {
    				$('#modalSubirInforme #mensaje-modal').css('display','none');
    				$('#modalSubirInforme #mensaje-error').css('display','block');
    				$('#modalSubirInforme #mensaje-error').append('<span>Error: Archivo no soportado</span>');
    			}
  		});
	}
	
	function initTableDiag(){
		return $('#tbl-enfermedad').dataTable({
			'bRetrieve':true
		});
	}
	function initTableInforme(){
		return $('#tbl-informe').dataTable({
			'bRetrieve':true
		});
	}
	function  cargarAjaxLoader(){
		var opts={
			lines: 8,
	  		length: 2,
	  		width: 2,
	  		radius: 3,
	  		corners: 1,
	  		rotate: 0,
	  		direction: 1,
	  		color: '#000',
	  		speed: 1,
	  		trail: 60,
	  		shadow: false,
	  		hwaccel: false,
	  		className: 'spinner',
	  		zIndex: 2e9,
	  		top: '16px',
	  		left: '541px'
		};
		var target = document.getElementById('spinner_img');
		var spinner = new Spinner(opts).spin(target);
	}
	//objeto para cargar las citas sin filtros
	var sourceAll={
		url:URL_BASE+'listar-cita',
		type:'POST',
		data:{
			campo:'null',
			valor:'null'
		},
		error: function(){
			alert('No se econtraron eventos');
		}
	}
	/*Cargamos las tablas que usaremos en la aplicación*/
	$('#tbl-lista-medico').dataTable({
		'bServerSide':true,
		'sAjaxSource':'ver-medico',
		'sServerMethod':'POST'
	});
	$('#tbl-lista-secretaria').dataTable({
		'bServerSide':true,
		'sAjaxSource':'ver-secretaria',
		'sServerMethod': 'POST'
	});
	$('#tbl-lista-paciente').dataTable({
		'bRetrieve':true
		//'bServerSide':true,
		//'sAjaxSource':'ver-pacientes',
		//"sServerMethod": "POST"
	});
	
	initTableDiag();
	initTableInforme();
	//Agregamos las clases de bootstrap en los inputs filter y length de datatable.js
	$('div[class="dataTables_length"] label select, div[class="dataTables_filter"] label input').addClass('form-control');
	$('div[class="dataTables_length"] label select, div[class="dataTables_filter"] label input').addClass('input-sm');
	//Creamos el calendario de citas
	var citaMedica=$('#citas').fullCalendar({
		allDaySlot: false,
		slotMinutes:10,
		minTime:'8:00',
		maxTime:'22:00',
		events:sourceAll,
		editable:true,
		dayClick: function(date, allDay, jsEvent, view){
			var check = $.fullCalendar.formatDate(date,'yyyy-MM-dd');
			var today = $.fullCalendar.formatDate(new Date(),'yyyy-MM-dd');
			var checkHour=$.fullCalendar.formatDate(date,'HH:mm:ss');
			var todayHour=$.fullCalendar.formatDate(new Date(),'HH:mm:ss');
			if(check<today){
				alert('No puedes reservar citas en dias pasados');
			}else if(checkHour!='00:00:00'&&checkHour<todayHour){
				alert('No se puede registrar la cita');
			}
			else{
				$('#modal-cita').modal();
				$('[name=hdnfechaCita]').val($.fullCalendar.formatDate(date,'yyyy-MM-dd'));
			}
		},
		eventClick: function(event, jsEvent, view){
			$(this).popover({
				title:'<strong>'+event.title+'</strong>',
				placement:'left',
				trigger:'manual',
				html:true,
				content:'<div>'+$.fullCalendar.formatDate(event.start,"dddd d 'de' MMMM, ")+
						$.fullCalendar.formatDate(event.start,'h:mm tt')+' - '+$.fullCalendar.formatDate(event.end,'h:mm tt')+'</div>'+
						'<div class="popover-footer">'+
						'<a style="cursor:pointer;" id="eliminar-cita" url="eliminar-cita/'+event.id+'">Eliminar'+'</a>'+
						'<a class="last">Editar evento'+'</a>'+
						'</div>',
				container:'div.content-calendar'
			}).popover('toggle');
		},
		eventDrop: function(event, dayDelta, minuteDelta, allDay, revertfunc){
			var check=$.fullCalendar.formatDate(event.start,'yyyy-MM-dd');
			var today = $.fullCalendar.formatDate(new Date(),'yyyy-MM-dd');
			var checkHour=$.fullCalendar.formatDate(event.start,'HH:mm:ss');
			var todayHour=$.fullCalendar.formatDate(new Date(),'HH:mm:ss');
			if(check<today){
				alert('No puedes mover las citas a días pasados');
				console.log('entre a today');
				revertfunc();
			}
			else if(checkHour!='00:00:00'&&checkHour<todayHour&&check<today){
				console.log(checkHour);
				console.log('Entre a todayHour');
				alert('No se puede mover la cita');
				revertfunc();
			}
			else{
				if(dayDelta!=0 || minuteDelta!=0){
					$.post('mover-cita/'+event.id+'/'+dayDelta+'/'+minuteDelta);
					console.log(dayDelta);
				}
			}
		},
		eventResize: function(event, dayDelta, minuteDelta, revertFunc){
			if(dayDelta!=0 || minuteDelta!=0){
				$.post('agrsandar-cita/'+event.id+''+minuteDelta);
			}
		}
	});
	//Evento que cambia el valor de la variable campo_v cuando segun el radio que este seleccionado 
	var campo_v='especialidad';
	$('input[name="busqueda"]:radio').click(function(){
		campo_v=$('input[name="busqueda"]:radio:checked').val();
	});
	//Evento del boton de busqueda de citas
	$('button[name="btnBuscar"]').on('click',function(){
		if($('input[name="txtBusqueda"]').val()=='' || $('input[name="txtBusqueda"]').val()==null){
		}
		else{
			citaMedica.fullCalendar('removeEventSource',sourceAll);
			citaMedica.fullCalendar('removeEvents');
			citaMedica.fullCalendar('addEventSource',{
				url:URL_BASE+'listar-cita',
				type:'POST',
				data:{
					campo:campo_v,
					valor:$('input[name="txtBusqueda"]').val()
				},
				error: function(){
					alert('No se econtraron eventos');
				}
			});
		}
	});
	//Autocomplete para el input de busqueda de cita
	$('input[name="txtBusqueda"]').typeahead(null,{
		source: function(query, cb){
			$.ajax({
				url:URL_BASE+'buscar-cita',
				type:'POST',
				dataType:'json',
				data:{
					dato:query,
					campo:campo_v
				},
				success: function(data){
					cb(data);
				}
			})
		},
		name:'citas',
		displayKey:'query'
	}).on('typeahead:selected', function(event,object,dataset){
		citaMedica.fullCalendar('removeEventSource',sourceAll);
		citaMedica.fullCalendar('removeEvents');
		citaMedica.fullCalendar('addEventSource',{
			url:URL_BASE+'listar-cita',
			type:'POST',
			data:{
				campo:campo_v,
				valor:object.query
			},
			error: function(){
				alert('No se econtraron eventos');
			}
		});
	}).on('typeahead:autocompleted',function(event,object,dataset){
		citaMedica.fullCalendar('removeEventSource',sourceAll);
		citaMedica.fullCalendar('removeEvents');
		citaMedica.fullCalendar('addEventSource',{
			url:URL_BASE+'listar-cita',
			type:'POST',
			data:{
				campo:campo_v,
				valor:object.query
			},
			error: function(){
				alert('No se econtraron eventos');
			}
		});
	});
	//Autocomplete para el input busqueda de paciente
	$('.paciente-autocomplete .typeahead').typeahead(null,{
		source: function(query, cb){
			$.ajax({
				url:URL_BASE+'buscar-paciente/'+query,
				type:'POST',
				dataType:'json',
				success: function(data){
					cb(data);
				}
			})
		},
		name:'pacientes',
		displayKey:'nomcompleto'
	}).on('typeahead:selected', function(event,object,dataset){
		$('input[name=hdnpacienteid]').val(object.pacienteid);
	}).on('typeahead:autocompleted',function(event,object,dataset){
		$('input[name=hdnpacienteid]').val(object.pacienteid);
	});
	//Select dependiente de especialidad-medico
	$('select[name=cboEspecialidad]').on('change', function(){
		$('select[name=cboEspecialidad] option:selected').each(function(){
			console.log($(this).val());
			$.post('lista-por-especialidad',{especialidad:$(this).val()},function(data){
				var json = JSON.parse(data);
				$('select[name=cboMedico] option').remove();
				for(var i=0;i<json.length;i++){
					$('select[name=cboMedico]').append('<option value='+json[i].medicoid+'>'+json[i].nombcompleto+'</option>');
				}
			});
		});
	});
	//Select dependiente Departamento, Provincia y Distrito
	$('select[name="list_departamento"]').on('change', function(object){
		$('select[name="list_departamento"] option:selected').each(function(){
			$.post('lista-por-departamento',{departamentoid:$(this).val()},function(data){
				var json = JSON.parse(data);
				$('select[name="list_provincia"] option').remove();
				$('select[name="list_provincia"]').append('<option selected value>Elegir provincia...</option>');
				for(var j=0;j<json.length;j++){
					$('select[name="list_provincia"]').append('<option value='+json[j].provinciaid+'>'+json[j].nombre+'</option>');
				}
			});
		});
	});
	$('select[name="list_provincia"]').on('change', function(){
		$('select[name="list_provincia"] option:selected').each(function(){
			$.post('lista-por-provincia',{provinciaid:$('select[name="list_provincia"]').val()},function(data){
				var json = JSON.parse(data);
				$('select[name="list_distrito"] option').remove();
				$('select[name="list_distrito"]').append('<option selected value>Elegir distrito...</option>');
				for(var i=0;i<json.length;i++){
					$('select[name="list_distrito"]').append('<option value='+json[i].distritoid+'>'+json[i].nombre+'</option>');
				}
			});
		});
	});
	//Cargar select
	if($('input[name="hdnestadocivil"]').val()!=undefined){
		$('select[name="list_estado"] option[value='+$('input[name="hdnestadocivil"]').val()+']').attr('selected',true);
	}
	if($('input[name="hdntipousuario"]').val()!=undefined){
		$('select[name="list_tipousuario"] option[value='+$('input[name="hdntipousuario"]').val()+']').attr('selected',true);
	}
	if($('input[name="hdndistritoid"]').val()!=undefined){
		$('select[name="list_distrito"] option[value='+$('input[name="hdndistritoid"]').val()+']').attr('selected',true);
		$('select[name="list_provincia"] option[value='+$('input[name="hdnprovinciaid"]').val()+']').attr('selected',true);
		$('select[name="list_departamento"] option[value='+$('input[name="hdndepartamentoid"]').val()+']').attr('selected',true);
	}
	//Modal para el boton eliminar
	var urlEliminar;
	$('table tbody').on('click','#eliminar',function(){
		$('#modal-eliminar').modal();
		urlEliminar = $(this).attr('url');
		console.log(urlEliminar);	
	});
	$('.modal #si').on('click', function(){
		window.location=urlEliminar;
	});

	//Inicio de la funcion eliminar cita
	var urlEliminarCita;
	$('.content-calendar').on('click','#eliminar-cita',function(){
		$('#modal-eliminar-cita').modal();
		urlEliminarCita = $(this).attr('url');	
	});
	$('.modal #sicita').on('click', function(){
		window.location=urlEliminarCita;
	});	
	//Fin de la funcion eliminar cita

	cargarAjaxLoader();

    cargarBotonCancelarRayosX();
	cargarBotonRayosX();
	cargarSubidaRayosX();
	cargarRayosX();
	cerrarModalRayosX();

	cargarBotonCancelarEcografia();
	cargarBotonEcografia();
	cargarSubidaEcografia();
	cargarEcografia();
	cerrarModalEcografia();

  	cargarBotonCancelarInforme();
	cargarBotonInforme();
	cargarSubidaInforme();
	cargarInforme();
	cerrarModalInforme();

	//inicio de la funcion eliminar informe
	var urlEliminarInforme;
	$('#informe').on('click','#eliminar-informe',function(){
		$('#modal-eliminar-informe').modal();
		urlEliminarInforme = $(this).attr('url');
		console.log(urlEliminarInforme);	
	});
	$('#informe').on('click','button[name="btnsi"]', function(){
		$('#informe').load(urlEliminarInforme,function(){
			cargarBotonCancelarInforme();
			cargarAjaxLoader();
			cargarBotonInforme();
			cargarSubidaInforme();
			cargarInforme();
			initTableInforme();
			cerrarModalInforme();
			$('div[class="dataTables_length"] label select, div[class="dataTables_filter"] label input').addClass('form-control');
			$('div[class="dataTables_length"] label select, div[class="dataTables_filter"] label input').addClass('input-sm');
		});
	});
	//fin de la funcion eliminar informe
	//Inicio de funcion para subir informe
	$('#informe').on('click','button[name="btnHecho"]',function(){
		$('#informe').load(URL_BASE+'pacientes/paciente/getListaInforme/'+$('#frm-Anamnesis input[name="hdnhistoriaclinicaid"]').val(),function(){
			cargarBotonCancelarInforme();
			cargarAjaxLoader();
			cargarBotonInforme();
			cargarSubidaInforme();
			cargarInforme();
			initTableInforme();
			cerrarModalInforme();
			$('div[class="dataTables_length"] label select, div[class="dataTables_filter"] label input').addClass('form-control');
			$('div[class="dataTables_length"] label select, div[class="dataTables_filter"] label input').addClass('input-sm');
		});
	});
	//Fin de funcion para subir informe
	//Inicio de la funcion eliminar ecografia
	var urlEliminarEcografia;
	$('#ecografia').on('click','#eliminar-ecografia',function(){
		$('#modal-eliminar-ecografia').modal();
		urlEliminarEcografia = $(this).attr('url');
		console.log(urlEliminarEcografia);	
	});
	$('#ecografia').on('click','button[name="btnsi"]', function(){
		$('#ecografia').load(urlEliminarEcografia,function(){
			cargarBotonCancelarEcografia();
			cargarAjaxLoader();
			cargarBotonEcografia();
			cargarSubidaEcografia();
			cargarEcografia();
			cerrarModalEcografia();
		});
	});
	//Fin de la funcion eliminar ecografia
	//Inicio para la funcion de subir ecografia
	$('#ecografia').on('click','button[name="btnHecho"]',function(){
		$('#ecografia').load(URL_BASE+'ecografia/ecografia/getEcografia/'+$('#frm-Anamnesis input[name="hdnhistoriaclinicaid"]').val(),function(){
			cargarBotonCancelarEcografia();
			cargarAjaxLoader();
			cargarBotonEcografia();
			cargarSubidaEcografia();
			cargarEcografia();
			cerrarModalEcografia();
		});
	});
	//fin para la funcion subir ecografia
	//Inicio de la funcion eliminar rayosx
	var urlEliminarRayosX;
	$('#rayosx').on('click','#eliminar-rayo',function(){
		$('#modal-eliminar-rayo').modal();
		urlEliminarRayosX = $(this).attr('url');	
	});
	$('#rayosx').on('click','button[name="btnsi"]', function(){
		$('#rayosx').load(urlEliminarRayosX,function(){
			cargarBotonCancelarRayosX();
			cargarAjaxLoader();
			cargarBotonRayosX();
			cargarSubidaRayosX();
			cargarRayosX();
			cerrarModalRayosX();
		});
	});
	//Fin de la funcion eliminar rayosx
	//Inicio para la funcion de subir rayosx
	$('#rayosx').on('click','button[name="btnHecho"]',function(){
		$('#rayosx').load(URL_BASE+'rayosx/rayosx/getRayosx/'+$('#frm-Anamnesis input[name="hdnhistoriaclinicaid"]').val(),function(){
			cargarBotonCancelarRayosX();
			cargarAjaxLoader();
			cargarBotonRayosX();
			cargarSubidaRayosX();
			cargarRayosX();
			cerrarModalRayosX();
		});
	});
	//fin para la funcion subir rayosx
	//Funciones para el modulo de diagnostico
	$('#diagnostico').on('click','button[name="btn-agregar-enfermedad"]',function(){
            console.log(URL_BASE);
		$('#diagnostico').load(URL_BASE+'pacientes/paciente/getEnfermedad/'+$('#frm-Anamnesis input[name="hdnhistoriaclinicaid"]').val(),function(){
			$('#form-agregar-enfermedad').validate({
				rules:{
					txtFecha:{required:true},
					txtTiempo:{required:true,maxlength:30},
					txtRelato:{required:true,maxlength:300},
					txtsp:{maxlength:30},
					txtFC:{maxlength:20},
					txtPA:{maxlength:20},
					txtFR:{maxlength:10},
					txtT:{maxlength:2,digits:true},
					txtPeso:{maxlength:3,digits:true},
					txtGeneral:{maxlength:10},
					txtCabeza:{maxlength:10},
					txtCuello:{maxlength:10},
					txtTorax:{maxlength:10},
					txtCardio:{maxlength:5},
					txtAbdomen:{maxlength:300},
					txtGenito:{maxlength:300},
					txtLocoNeuro:{maxlength:300},
					txtDiagnostico1:{maxlength:50},
					txtDiagnostico2:{maxlength:50},
					txtDiagnostico2:{maxlength:50},
					txtDiagnostico4:{maxlength:50},
					txtTratamiento1:{maxlength:50},
					txtTratamiento2:{maxlength:50},
					txtTratamiento3:{maxlength:50},
					txtTratamiento4:{maxlength:50},
					txtExa:{maxlength:300}
				},
				messages:{
					txtFecha:{required:'Campo requerido'},
					txtTiempo:{required:'Campo requerido'},
					txtRelato:{required:'Campo requerido'}
				}
			});
		});
	});
	$('#diagnostico').on('click','button[name="btn-atras-enfermedad"]',function(){
		$('#diagnostico').load(URL_BASE+'pacientes/paciente/getListaEnfermedad/'+$('#frm-Anamnesis input[name="hdnhistoriaclinicaid"]').val(),function(){
			initTableDiag();
			$('div[class="dataTables_length"] label select, div[class="dataTables_filter"] label input').addClass('form-control');
			$('div[class="dataTables_length"] label select, div[class="dataTables_filter"] label input').addClass('input-sm');
		});
	});
	$('#diagnostico').on('click','a[name="editar-enfermedad"]',function(){
		$('#diagnostico').load(URL_BASE+'editar-enfermedad/'+$(this).attr('value'),function(){
			$('#form-agregar-enfermedad').validate({
				rules:{
					txtFecha:{required:true,jnumberword:true},
					txtTiempo:{required:true,maxlength:30,jnumberword:true},
					txtRelato:{required:true,maxlength:300,jnumberword:true},
					txtsp:{maxlength:30,jnumberword:true},
					txtFC:{maxlength:20,jnumberword:true},
					txtPA:{maxlength:20,jnumberword:true},
					txtFR:{maxlength:10,jnumberword:true},
					txtT:{maxlength:2,digits:true},
					txtPeso:{maxlength:3,digits:true},
					txtGeneral:{maxlength:10,jnumberword:true},
					txtCabeza:{maxlength:10,jnumberword:true},
					txtCuello:{maxlength:10,jnumberword:true},
					txtTorax:{maxlength:10,jnumberword:true},
					txtCardio:{maxlength:5,jnumberword:true},
					txtAbdomen:{maxlength:300,jnumberword:true},
					txtGenito:{maxlength:300,jnumberword:true},
					txtLocoNeuro:{maxlength:300,jnumberword:true},
					txtDiagnostico1:{maxlength:50,jnumberword:true},
					txtDiagnostico2:{maxlength:50,jnumberword:true},
					txtDiagnostico2:{maxlength:50,jnumberword:true},
					txtDiagnostico4:{maxlength:50,jnumberword:true},
					txtTratamiento1:{maxlength:50,jnumberword:true},
					txtTratamiento2:{maxlength:50,jnumberword:true},
					txtTratamiento3:{maxlength:50,jnumberword:true},
					txtTratamiento4:{maxlength:50,jnumberword:true},
					txtExa:{maxlength:300,jnumberword:true}
				},
				messages:{
					txtFecha:{required:'Campo requerido'},
					txtTiempo:{required:'Campo requerido'},
					txtRelato:{required:'Campo requerido'}
				}
			});
		});
	});
	$('#diagnostico').on('submit','#form-agregar-enfermedad',function(e){
		e.preventDefault();
		$.ajax({
			type:'POST',
			url:URL_BASE+'agregar-enfermedad',
			data:$(this).serialize(),
			success:function(){
				$('#diagnostico').load(URL_BASE+'pacientes/paciente/getListaEnfermedad/'+$('#frm-Anamnesis input[name="hdnhistoriaclinicaid"]').val(),function(){
					initTableDiag();
					$('div[class="dataTables_length"] label select, div[class="dataTables_filter"] label input').addClass('form-control');
					$('div[class="dataTables_length"] label select, div[class="dataTables_filter"] label input').addClass('input-sm');
				});
			}
		});
	});
	//Fin de las funciones para el modulo de diagnosticos
	$('select[name=list_horas_i]').on('change', function(){
		$('select[name=list_horas_i] option:selected').each(function(){
			if($(this).val()<21){
				$('select[name=list_minutos_i] option').remove();
				$('select[name=list_minutos_i]').append('<option selected value>Minutos</option>');
				for(var i=0;i<6;i++){
					$('select[name=list_minutos_i]').append('<option value='+(i+'0')+'>'+(i+'0')+'</option>');
				}
			}
			else{
				$('select[name=list_minutos_i] option').remove();
				$('select[name=list_minutos_i]').append('<option selected value>Minutos</option>');
				for(var i=0;i<4;i++){
					$('select[name=list_minutos_i]').append('<option value='+(i+'0')+'>'+(i+'0')+'</option>');
				}
			}
		});
	});
});