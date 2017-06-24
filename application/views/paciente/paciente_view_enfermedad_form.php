<div>
	<button type="button" class="btn btn-agregar" name="btn-atras-enfermedad">
		<i class="glyphicon glyphicon-circle-arrow-left"></i>
	</button>
</div>
<h4 class="page-header" style="margin-top: 20px">Enfermedad actual</h4>
<form id="form-agregar-enfermedad" style="overflow: hidden;">
	<input type="hidden" name="hdndiagnosticoid" value="<?=@$enfermedad->diagnosticoid?>">
	<input type="hidden" name="hdnhistoriaid" value="<?=(@$enfermedad->historiaclinicaid!=NULL)?@$enfermedad->historiaclinicaid:@$historiaid?>">
	<div class="col-md-4 col-md-offset-8">
		<div class="form-group input-group-sm">
			<label class="control-label">Fecha</label>
			<input type="date" class="form-control" name="txtFecha" value="<?=@$enfermedad->fecha?>">
		</div>
	</div>
	<div class="col-md-5">
		<div class="form-group input-group-sm">
			<label class="control-label">Tiempo enfermedad</label>
			<input type="text" class="form-control" name="txtTiempo" value="<?=@$enfermedad->tiemenferm?>">
		</div>
	</div>
	<div class="col-md-5 col-md-offset-2">
		<div class="form-group input-group-sm">
			<label class="control-label">S.P</label>
			<input type="text" class="form-control" name="txtsp" value="<?=@$enfermedad->sp?>">
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Relato</label>
			<textarea class="form-control" rows="3" name="txtRelato"><?=@$enfermedad->relato?></textarea>
		</div>
	</div>
	<div id="tbl-analisis" class="col-md-12">
		<div class="col-md-2 titulo" style="text-align:left;">
			<label class="control-label">Funciones Vitales</label>
		</div>
		<div class="col-md-2">
			<div class="form-group input-group-sm">
				<label class="control-label">F.C</label>
				<input type="text" class="form-control" name="txtFC" value="<?=@$enfermedad->fc?>">
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group input-group-sm">
				<label class="control-label">P.A</label>
				<input type="text" class="form-control" name="txtPA" value="<?=@$enfermedad->pa?>">
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group input-group-sm">
				<label class="control-label">F.R</label>
				<input type="text" class="form-control" name="txtFR" value="<?=@$enfermedad->fr?>">
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group input-group-sm">
				<label class="control-label">T.</label>
				<input type="text" class="form-control" name="txtT" value="<?=@$enfermedad->temperatura?>">
			</div>
		</div>
		<div class="col-md-2 last">
			<div class="form-group input-group-sm">
				<label class="control-label">Peso</label>
				<input type="text" class="form-control" name="txtPeso" value="<?=@$enfermedad->peso?>">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group input-group-sm">
				<label class="control-label">General</label>
				<input type="text" class="form-control" name="txtGeneral" value="<?=@$enfermedad->general?>">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group input-group-sm">
				<label class="control-label">Cabeza</label>
				<input type="text" class="form-control" name="txtCabeza" value="<?=@$enfermedad->cabeza?>">
			</div>
		</div>
		<div class="col-md-4 last">
			<div class="form-group input-group-sm">
				<label class="control-label">Cuello</label>
				<input type="text" class="form-control" name="txtCuello" value="<?=@$enfermedad->cuello?>">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group input-group-sm">
				<label class="control-label">Torax y Pulmones</label>
				<input type="text" class="form-control" name="txtTorax" value="<?=@$enfermedad->toraxpulmones?>">
			</div>
		</div>
		<div class="col-md-6 last">
			<div class="form-group input-group-sm">
				<label class="control-label">Cardiovascular</label>
				<input type="text" class="form-control" name="txtCardio" value="<?=@$enfermedad->cardiovascular?>">
			</div>
		</div>
		<div class="col-md-4 titulo">
			<label class="control-label">Abdomen</label>
		</div>
		<div class="col-md-8 last">
			<div class="form-group">
				<textarea class="form-control" name="txtAbdomen"><?=@$enfermedad->abdomen?></textarea>
			</div>
		</div>
		<div class="col-md-4 titulo">
			<label class="control-label">Genito-Unitario</label>
		</div>
		<div class="col-md-8 last">
			<div class="form-group">
				<textarea class="form-control" name="txtGenito"><?=@$enfermedad->genitourinario?></textarea>
			</div>
		</div>
		<div class="col-md-4 titulo">
			<label class="control-label">Locomotor y Neurológico</label>
		</div>
		<div class="col-md-8 last">
			<div class="form-group">
				<textarea class="form-control" name="txtLocoNeuro"><?=@$enfermedad->loconeurolo?></textarea>
			</div>
		</div>
		<div class="col-md-4 titulo">
			<label class="control-label">Dx.</label>
		</div>
		<div class="col-md-8 last">
			<div class="col-md-6 tratamiento izquierda">
				<div class="form-group input-group-sm">
					<input type="text" class="form-control" placeholder="1." name="txtDiagnostico1" value="<?=@$enfermedad->dx1?>">
				</div>
			</div>
			<div class="col-md-6 tratamiento derecha">
				<div class="form-group input-group-sm">
					<input type="text" class="form-control" placeholder="2." name="txtDiagnostico2" value="<?=@$enfermedad->dx2?>">
				</div>
			</div>
			<div class="col-md-6 tratamiento izquierda">
				<div class="form-group input-group-sm">
					<input type="text" class="form-control" placeholder="3." name="txtDiagnostico3" value="<?=@$enfermedad->dx3?>">
				</div>
			</div>
			<div class="col-md-6 tratamiento derecha">
				<div class="form-group input-group-sm">
					<input type="text" class="form-control" placeholder="4." name="txtDiagnostico4" value="<?=@$enfermedad->dx4?>">
				</div>
			</div>
		</div>
		<div class="col-md-4 last-r titulo">
			<label class="control-label">Tratamiento</label>
		</div>
		<div class="col-md-8 last last-r">
			<div class="col-md-6 tratamiento izquierda">
				<div class="form-group input-group-sm">
					<input type="text" class="form-control" placeholder="1." name="txtTratamiento1" value="<?=@$enfermedad->tratamiento1?>">
				</div>
			</div>
			<div class="col-md-6 tratamiento derecha">
				<div class="form-group input-group-sm">
					<input type="text" class="form-control" placeholder="2." name="txtTratamiento2" value="<?=@$enfermedad->tratamiento2?>">
				</div>
			</div>
			<div class="col-md-6 tratamiento izquierda">
				<div class="form-group input-group-sm">
					<input type="text" class="form-control" placeholder="3." name="txtTratamiento3" value="<?=@$enfermedad->tratamiento3?>">
				</div>
			</div>
			<div class="col-md-6 tratamiento derecha">
				<div class="form-group input-group-sm">
					<input type="text" class="form-control" placeholder="4." name="txtTratamiento4" value="<?=@$enfermedad->tratamiento4?>">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Exámenes auxiliares</label>
			<textarea class="form-control" rows="3" name="txtExa"><?=@$enfermedad->exauxiliares?></textarea>
		</div>
	</div>
	<div class="col-md-12 pie-formulario">
		<div class="col-md-4 col-md-offset-8" style="padding-right: 0px;">
			<div class="contenedor-botones">
				<button type="submit" class="btn botones" name="btnGuardarEnfer">Guardar</button>
				<?php if(@$enfermedad->diagnosticoid==null):?>
					<button type="reset" class="btn botones">Limpiar</button>
				<?php endif;?>
			</div>
		</div>
	</div>
</form>