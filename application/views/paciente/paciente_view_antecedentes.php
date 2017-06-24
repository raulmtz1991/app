<h4 class="page-header">Antecedentes</h4>
<div class="col-md-6">
	<div class="form-group input-group-sm">
		<label class="control-label">Médicos</label>
		<input type="text" class="form-control" name="txtmedicos" value="<?=@$historia->medicos?>">
	</div>
</div>
<div class="col-md-6">
	<div class="form-group input-group-sm">
		<label class="control-label">Quirúrgicos</label>
		<input type="text" class="form-control" name="txtquirurgicos" value="<?=@$historia->quirurgicos?>">
	</div>
</div>
<div class="col-md-12">
	<div class="form-group input-group-sm">
		<label class="control-label">Alérgicos</label>
		<input type="text" class="form-control" name="txtalergicos" value="<?=@$historia->alergicos?>">
	</div>
</div>
<div class="col-md-3">
	<div class="form-group input-group-sm">
		<label class="control-label">Ginecólogos</label>
	</div>
</div>
<div class="col-md-3">
	<div class="form-group input-group-sm">
		<label class="control-label">FUR</label>
		<input type="date" class="form-control" name="txtfur" value="<?=@$historia->fur?>">
	</div>
</div>
<div class="col-md-3">
	<div class="form-group input-group-sm">
		<label class="control-label">Menarquia</label>
		<input type="text" class="form-control" name="txtmenarquia" value="<?=@$historia->menarquia?>">
	</div>
</div>
<div class="col-md-3">
	<div class="form-group input-group-sm">
		<label class="control-label">R.S.</label>
		<select class="form-control" name="txtrs">
			<option selected value>Elegir...</option>
			<option value="activo">Activo</option>
			<option value="no activo">No activo</option>
		</select>
		<!--<input type="text" class="form-control" name="txtrs" value="<?=@$historia->rs?>">-->
	</div>
</div>
<div class="col-md-3">
	<div class="form-group input-group-sm">
	</div>
</div>
<div class="col-md-3">
	<div class="form-group input-group-sm">
		<label class="control-label">R.C.</label>
		<select class="form-control" name="txtrc">
			<option selected value>Elegir...</option>
			<option value="regular">Regular</option>
			<option value="irregular">Irregular</option>
		</select>
		<!--<input type="text" class="form-control" name="txtrc" value="<?=@$historia->rc?>">-->
	</div>
</div>
<div class="col-md-1">
	<div class="form-group input-group-sm">
		<label class="control-label">G</label>
		<input type="text" class="form-control" name="txtg" value="<?=@$historia->g?>">
	</div>
</div>
<div class="col-md-1">
	<div class="form-group input-group-sm">
		<label class="control-label">P</label>
		<input type="text" class="form-control" name="txtp" value="<?=@$historia->p?>">
	</div>
</div>
<div class="col-md-1">
</div>
<div class="col-md-3">
	<div class="form-group input-group-sm">
		<label class="control-label">M.A.</label>
		<input type="text" class="form-control" name="txtma" value="<?=@$historia->ma?>">
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="control-label">Hospitalización</label>
		<textarea class="form-control" rows="3" name="txthospitalizacion"><?=@$historia->hospitalizacion?></textarea>
		<!--<input type="text" class="form-control" name="txthospitalizacion" value="">-->
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label class="control-label">Hábitos Nocivos</label>
		<textarea class="form-control" rows="3" name="txthnocivos"><?=@$historia->habitosnocivos?></textarea>
		<!--<input type="text" class="form-control" name="txthnocivos" value="">-->
	</div>
</div>