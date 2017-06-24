var err_map=new Object();
var _popover;
jQuery.validator.addMethod('jword',function(value, element){
	return this.optional(element) || /^[a-z_ñáéíóúüA-Z_ÑÁÉÍÓÚÜÑ\s]*$/.test(value);
},'Ingrese un nombre válido');
jQuery.validator.addMethod('jaddress',function(value, element){
	return this.optional(element) || /^[a-z_ñáéíóúü#0-9.\-A-Z_ÑÁÉÍÓÚÜÑ0_9\s]*$/.test(value);
},'Ingrese una dirección válida');
jQuery.validator.addMethod('jnumberword',function(value, element){
	return this.optional(element) || /^[a-z_ñáéíóúü,.#0-9.\-A-Z_ÑÁÉÍÓÚÜÑ0_9\s]*$/.test(value);
},'Ingrese un valor alfanumérico');
$.validator.setDefaults({
	showErrors: function(errorMap, errorList){
		$.each(this.successList, function(index, value){
			if (value.id in err_map){
				var k = err_map[value.id];
				delete err_map[value.id];
				k.popover('destroy');
			}
		});
		return $.each(errorList, function(index, value){
			var element = $(value.element);
			if( ! (value.element.id in err_map)){
				console.log(value.message);
				_popover = element.popover({
					trigger: 'manual',
					placement: 'top',
					content: value.message,
					container:'div.padre-popover'
				});
				_popover.data('bs.popover').options.content = value.message;
				err_map[value.element.id] = _popover;
				return err_map[value.element.id].popover('show');
			}
			else{
				_popover.data('bs.popover').options.content = value.message;
				err_map[value.element.id] = _popover;
				return err_map[value.element.id].popover('show');
			}
		});
	}
});
$(function(){
	$('#frm-Anamnesis').validate({
		rules:{
			txtnombre:{required:true,jword:true,maxlength:50},
			txtapePaterno:{required:true,jword:true,maxlength:30},
			txtapeMaterno:{required:true,jword:true,maxlength:30},
			list_estado:{required:true},
			txtedad:{required:true,digits:true,minlength:1,maxlength:3,max:123},
			txtocupacion:{required:true,maxlength:50,jword:true},
			txttelefono:{required:false,digits:true},
			txtcelular:{required:false,digits:true},
			txtdomicilio:{required:true,maxlength:150,jaddress:true},
			txtLugarNac:{required:true,maxlength:50,jword:true},
			txtLugaProc:{required:true,maxlength:50,jword:true},
			txtmedicos:{maxlength:150,required:true,jnumberword:true},
			txtquirurgicos:{maxlength:200,required:true, jnumberword:true},
			txtalergicos:{maxlength:200,required:true,jnumberword:true},
			txtfur:{maxlength:100,jnumberword:true},
			txtmenarquia:{maxlength:100,digits:true,min:10,max:16},
			txtrs:{maxlength:100,jnumberword:true},
			txtrc:{maxlength:100,jnumberword:true},
			txtg:{maxlength:3,digits:true,jnumberword:true},
			txtp:{maxlength:3,digits:true,jnumberword:true},
			txtma:{maxlength:100,jnumberword:true},
			txthospitalizacion:{maxlength:200,jnumberword:true},
			txthnocivos:{maxlength:200,required:true,jnumberword:true}
		},
		messages:{
			txtnombre:{
				required:'Campo requerido',
				jword:'Ingrese un nombre válido',
				maxlength:$.validator.format('Por favor no ingrese mas de {0} caracteres')
			},
			txtapePaterno:{
				required:'Campo requerido',
				jword:'Ingrese un apellido válido',
				maxlength:$.validator.format('Por favor no ingrese mas de {0} caracteres')
			},
			txtapeMaterno:{
				required:'Campo requerido',
				jword:'Ingrese un apellido válido',
				maxlength:$.validator.format('Por favor no ingrese mas de {0} caracteres')
			},
			list_estado:{required:'Campo requerido'},
			txtedad:{
				required:'Campo requerido',
				digits:'Ingrese una edad válida',
				minlength:'Ingrese una edad válida',
				maxlength:'Ingrese una edad válida',
				max:$.validator.format('Ingrese una edad menor o igual a {0}')
			},
			txtocupacion:{
				required:'Campo requerido',
				maxlength:$.validator.format('Por favor no ingrese mas de {0} caracteres'),
			},
			txttelefono:{
				digits:'Ingrese un número válido',
				minlength:'Ingrese un número válido',
				maxlength:'Ingrese un número válido'
			},
			txtcelular:{
				required:'Campo requerido',
				digits:'Ingrese un número válido',
				minlength:'Ingrese un número válido',
				maxlength:'Ingrese un número válido'
			},
			txtLugarNac:{required:'Campo requerido',maxlength:$.validator.format('Por favor no ingrese mas de {0} caracteres')},
			txtLugaProc:{required:'Campo requerido',maxlength:$.validator.format('Por favor no ingrese mas de {0} caracteres')},
			txtmedicos:{maxlength:$.validator.format("Por favor no ingrese mas de {0} caracteres."),required:'Campo requerido'},
			txtquirurgicos:{maxlength:$.validator.format("Por favor no ingrese mas de {0} caracteres."),required:'Campo requerido'},
			txtalergicos:{maxlength:$.validator.format("Por favor no ingrese mas de {0} caracteres."),required:'Campo requerido'},
			txtfur:{maxlength:$.validator.format("Por favor no ingrese mas de {0} caracteres.")},
			txtmenarquia:{maxlength:$.validator.format("Por favor no ingrese mas de {0} caracteres."),digits:'Ingrese una edad válida',min:'No tiene que ser menor que 11', max:'No tiene que ser mayor que 16'},
			txtrs:{maxlength:$.validator.format("Por favor no ingrese mas de {0} caracteres.")},
			txtrc:{maxlength:$.validator.format("Por favor no ingrese mas de {0} caracteres.")},
			txtg:{maxlength:$.validator.format("Por favor no ingrese mas de {0} caracteres."),digits:'Solo se permiten números'},
			txtp:{maxlength:$.validator.format("Por favor no ingrese mas de {0} caracteres."),digits:'Solo se permiten números'},
			txtma:{maxlength:$.validator.format("Por favor no ingrese mas de {0} caracteres.")},
			txthospitalizacion:{maxlength:$.validator.format("Por favor no ingrese mas de {0} caracteres.")},
			txthnocivos:{maxlength:$.validator.format("Por favor no ingrese mas de {0} caracteres."),required:'Campo requerido'}
		}
	});
	$('#frm-secretaria').validate({
		rules:{
			txtdni:{required:true, digits:true, minlength:8, maxlength:8},
			txtnombre:{required:true,jword:true,maxlength:50},
			txtapepaterno:{required:true,jword:true,maxlength:30},
			txtapematerno:{required:true,jword:true,maxlength:30},
			txtfecha:{required:true},
			list_estado:{required:true},
			txttelefono:{required:true,digits:true,minlength:7,maxlength:7},
			txtcelular:{required:true,digits:true,minlength:9,maxlength:9},
			list_departamento:{required:true},
			list_provincia:{required:true},
			list_distrito:{required:true},
			txtdireccion:{required:true,maxlength:100,jaddress:true}
		},
		messages:{
			txtdni:{
				required:'Campo requerido',
				digits:'Ingrese una CEDULA válido',
				minlength:'Ingrese una CEDULA válido',
				maxlength:'Ingrese una CEDULA válido'
			},
			txtnombre:{
				required:'Campo requerido',
				jword:'Ingrese un nombre válido',
				maxlength:$.validator.format('Por favor no ingrese mas de {0} caracteres')
			},
			txtapepaterno:{
				required:'Campo requerido',
				jword:'Ingrese un apellido válido',
				maxlength:$.validator.format('Por favor no ingrese mas de {0} caracteres')
			},
			txtapematerno:{
				required:'Campo requerido',
				jword:'Ingrese un apellido válido',
				maxlength:$.validator.format('Por favor no ingrese mas de {0} caracteres')
			},
			txtfecha:{
				required:'Campo requerido'
			},
			list_estado:{
				required:'Campo requerido'
			},
			txttelefono:{
				required:'Campo requerido',
				digits:'Ingrese un número válido',
				minlength:'Ingrese un número válido',
				maxlength:'Ingrese un número válido'
			},
			txtcelular:{
				required:'Campo requerido',
				digits:'Ingrese un número válido',
				minlength:'Ingrese un número válido',
				maxlength:'Ingrese un número válido'
			},
			list_departamento:{
				required:'Campo requerido'
			},
			list_provincia:{
				required:'Campo requerido'
			},
			list_distrito:{
				required:'Campo requerido'
			},
			txtdireccion:{
				required:'Campo requerido',
				maxlength:$.validator.format('Por favor no ingrese mas de {0} caracteres'),
				jaddress:'Ingrese una dirección válida'
			}
		}
	});
	$('#frm-medico').validate({
		rules:{
			txtdni:{required:true, digits:true},
			txtespecialidad:{required:true,jword:true,maxlength:100},
			txtnombre:{required:true,jword:true,maxlength:50},
			txtapepaterno:{required:true,jword:true,maxlength:30},
			txtapematerno:{required:true,jword:true,maxlength:30},
			txtfecha:{required:true},
			list_estado:{required:true},
			txttelefono:{required:true,digits:true,minlength:7,maxlength:7},
			txtcelular:{required:true,digits:true,minlength:9,maxlength:9},
			list_departamento:{required:true},
			list_provincia:{required:true},
			list_distrito:{required:true},
			txtdireccion:{required:true,maxlength:100,jaddress:true}
		},
		messages:{
			txtdni:{
				required:'Campo requerido',
				digits:'Ingrese una CEDULA válido',
				minlength:'Ingrese una CEDULA válido',
				maxlength:'Ingrese una CEDULA válido'
			},
			txtespecialidad:{
				required:'Campo requerido',
				jword:'Ingrese una especialidad válida',
				maxlength:$.validator.format('Por favor no ingrese mas de {0} caracteres')
			},
			txtnombre:{
				required:'Campo requerido',
				jword:'Ingrese un nombre válido',
				maxlength:$.validator.format('Por favor no ingrese mas de {0} caracteres')
			},
			txtapepaterno:{
				required:'Campo requerido',
				jword:'Ingrese un apellido válido',
				maxlength:$.validator.format('Por favor no ingrese mas de {0} caracteres')
			},
			txtapematerno:{
				required:'Campo requerido',
				jword:'Ingrese un apellido válido',
				maxlength:$.validator.format('Por favor no ingrese mas de {0} caracteres')
			},
			txtfecha:{
				required:'Campo requerido'
			},
			list_estado:{
				required:'Campo requerido'
			},
			txttelefono:{
				required:'Campo requerido',
				digits:'Ingrese un número válido',
				minlength:'Ingrese un número válido',
				maxlength:'Ingrese un número válido'
			},
			txtcelular:{
				required:'Campo requerido',
				digits:'Ingrese un número válido',
				minlength:'Ingrese un número válido',
				maxlength:'Ingrese un número válido'
			},
			list_departamento:{
				required:'Campo requerido'
			},
			list_provincia:{
				required:'Campo requerido'
			},
			list_distrito:{
				required:'Campo requerido'
			},
			txtdireccion:{
				required:'Campo requerido',
				maxlength:$.validator.format('Por favor no ingrese mas de {0} caracteres'),
				jaddress:'Ingrese una dirección válida'
			}
		}
	});
	$('#frm-usuario').validate({
		rules:{
			txtusuario:{
				required:true,
				minlength:3,
				maxlength:20
			},
			txtcontrasenia:{
				required:true,
				minlength:6,
				maxlength:20
			},
			list_tipousuario:{
				required:true
			}
		},
		messages:{
			txtusuario:{
				required:'Campo requerido',
				minlength:'Debe tener al menos 3 caracteres',
				maxlength:'Debe tener menos de 20 caracteres'
			},
			txtcontrasenia:{
				required:'Campo requerido',
				minlength:'Debe tener al menos 6 caracteres',
				maxlength:'Debe tener menos de 20 caracteres'
			},
			list_tipousuario:{
				required:'Campo requerido'
			}
		}
	});
	$('#frm-cita-medica').validate({
		rules:{
			txtBuscarPaciente:{
				required:true
			},
			cboEspecialidad:{
				required:true
			},
			cboMedico:{
				required:true
			},
			list_horas_i:{
				required:true
			},
			list_minutos_i:{
				required:true
			}
		},
		messages:{
			txtBuscarPaciente:{
				required:'Campo requerido'
			},
			cboEspecialidad:{
				required:'Campo requerido'
			},
			cboMedico:{
				required:'Campo requerido'
			},
			list_horas_i:{
				required:'Campo requerido'
			},
			list_minutos_i:{
				required:'Campo requerido'
			}
		}
	});
});