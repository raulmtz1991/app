<div class="tab-pane active" id="home">
	<form id="frm-Anamnesis" action="<?=base_url();?>guardar-paciente" method="POST">
		<input type="hidden" name="hdnpacienteid" value="<?=@$paciente->pacienteid?>">
		<input type="hidden" name="hdnhistoriaclinicaid" value="<?=@$historia->historiaclinicaid?>">
		<h4 class="page-header" style="margin-top:20px;">Filiación</h4>
		<div class="col-md-3">
			<div class="form-group input-group-sm">
				<label class="control-label">Nombres</label>
				<input type="text" class="form-control" name="txtnombre" value="<?=@$paciente->nombre?>" <?=$valor?>>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group input-group-sm">
				<label class="control-label">Apellido Paterno</label>
				<input type="text" class="form-control" name="txtapePaterno" value="<?=@$paciente->apepaterno?>" <?=$valor?>>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group input-group-sm">
				<label class="control-label">Apellido Materno</label>
				<input type="text" class="form-control" name="txtapeMaterno" value="<?=@$paciente->apematerno?>" <?=$valor?>>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group input-group-sm">
				<label class="label-control">Estado Civil</label>
				<input type="hidden" name="hdnestadocivil" value="<?=@$paciente->estadocivilid?>">
				<select class="form-control" name="list_estado" <?=$valor?>>
					<option selected value>Elegir estado civil...</option>
					<?php foreach ($estadocivil as $estado):?>
						<option value='<?=$estado->estadocivilid?>'><?=$estado->nombre?></option>
					<?php endforeach?>
				</select>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group input-group-sm">
				<label class="control-label">Edad</label>
				<input type="text" class="form-control" name="txtedad" value="<?=@$paciente->edad?>" <?=$valor?>>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group input-group-sm">
				<label class="control-label">Ocupación</label>
				<input type="text" class="form-control" name="txtocupacion" value="<?=@$paciente->ocupacion?>" <?=$valor?>>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group input-group-sm">
				<label class="control-label">Teléfono</label>
				<input type="text" class="form-control" name="txttelefono" value="<?=@$paciente->telefono?>" <?=$valor?>>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group input-group-sm">
				<label class="control-label">Celular</label>
				<input type="text" class="form-control" name="txtcelular" value="<?=@$paciente->celular?>" <?=$valor?>>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group input-group-sm">
				<label class="control-label">Domicilio</label>
				<input type="text" class="form-control" name="txtdomicilio" value="<?=@$paciente->domicilio?>" <?=$valor?>>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group input-group-sm">
				<label class="control-label">Lugar de nacimiento</label>
				<input type="text" class="form-control" name="txtLugarNac" value="<?=@$paciente->lugarnac?>" <?=$valor?>>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group input-group-sm">
				<label class="control-label">Lugar de procedencia</label>
				<input type="text" class="form-control" name="txtLugaProc" value="<?=@$paciente->lugarproc?>" <?=$valor?>>
			</div>
		</div>
		<?=@$antecedentes?>
		<div class="col-md-12 pie-formulario">
			<div class="col-md-8"></div>
			<div class="col-md-4" style="padding-right: 0px;">
				<div class="contenedor-botones">
					<button type="submit" class="btn botones">Guardar</button>
					<?php if(@$paciente->pacienteid==NULL):?>
						<button type="reset" class="btn botones">Limpiar</button>
					<?php endif;?>
				</div>
			</div>
		</div>
	</form>
</div>