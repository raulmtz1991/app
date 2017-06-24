
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default padre-popover">
			<div class="panel-heading"><h3 class="panel-title">Agregar médico</h3></div>
			<form role="form" id="frm-medico" action="<?=base_url();?>guardar-medico" method="POST">
				<div class="panel-body">
					<input type="hidden" name="hdnpersonaid" value="<?=@$medico->personaid?>">
					<input type="hidden" name="hdnmedicoid" value="<?=@$medico->medicoid?>">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group input-group-sm">
								<label class="label-control">Cedula Profecional</label>
								<input class="form-control" type="text" name="txtdni" value="<?=@$medico->dni?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group input-group-sm">
								<label class="label-control">Especialidad</label>
								<input type="text" class="form-control" name="txtespecialidad" value="<?=@$medico->especialidad?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group input-group-sm" style="height:55px">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group input-group-sm">
								<label class="label-control">Nombres</label>
								<input type="text" class="form-control" name="txtnombre" value="<?=@$medico->nombres?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group input-group-sm">
								<label class="label-control">Apellido Paterno</label>
								<input type="text" class="form-control" name="txtapepaterno" value="<?=@$medico->apepaterno?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group input-group-sm">
								<label class="label-control">Apellido Materno</label>
								<input type="text" class="form-control" name="txtapematerno" value="<?=@$medico->apematerno?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group input-group-sm">
								<label class="label-control">Fecha de Nacimiento</label>
								<input type="date" class="form-control" name="txtfecha" value="<?=@$medico->fechnacimiento?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group input-group-sm">
								<label class="label-control">Estado Civil</label>
								<input type="hidden" name="hdnestadocivil" value="<?=@$medico->estadocivilid?>">
								<select class="form-control" name="list_estado">
									<option selected value>Elegir estado civil...</option>
									<?php foreach ($estadocivil as $estado):?>
										<option value='<?=$estado->estadocivilid?>'><?=$estado->nombre?></option>
									<?php endforeach?>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group input-group-sm">
								<label class="label-control">Teléfono</label>
								<input type="text" class="form-control" name="txttelefono" value="<?=@$medico->telefono?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group input-group-sm">
								<label class="label-control">Celular</label>
								<input type="text" class="form-control" name="txtcelular" value="<?=@$medico->celular?>">
							</div>
						</div>
						
						
						<div class="col-md-8">
							<div class="form-group input-group-sm">
								<label class="label-control">Dirección</label>
								<input type="text" class="form-control" name="txtdireccion" value="<?=@$medico->domicilio?>">
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer" style="background-color: white">
					<div class="row">
						<div class="col-md-8"></div>
						<div class="col-md-4">
							<div class="contenedor-botones">
								<button type="submit" class="btn botones">Guardar</button>
								<?php if($medico->medicoid==NULL):?>
									<button type="reset" class="btn botones">Limpiar</button>
								<?php endif;?>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>