<div class="row">
    <h4 class="page-header page-header-cita">Buscar cita</h4>
    <div class="col-lg-3 col-md-3"></div>
    <div class="col-lg-3 col-md-3">
				<div>
			<a href="calendario-citas" >Ver todas las citas</a>
		</div>
		<div class="form-group">
			<input placeholder="busque su cita por..." type="text" class="form-control" name="txtBusqueda" 
                               
			<span class="input-group-btn">
				<button class="btn btn-default" type="button" name="btnBuscar"><i class="glyphicon glyphicon-search"></i></button>
			</span>
		</div>
                </div>
                   <div class="col-lg-3 col-md-3">
		<div class="radio">
			<label><input type="radio" checked value="especialidad" name="busqueda"> Especialidad</label>
		</div>
		<div class="radio">
			<label><input type="radio" value="nombcompleto" name="busqueda"> Médico</label>
		</div>
                </div>      
    <div class="col-lg-3 col-md-3"></div>
    </div>
		
<div class="row content-calendar">
	
	<div class="col-lg-12 col-md-12">
		<div id="citas"></div>
	</div>
</div>


<div class="modal fade" id="modal-cita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-md">
				<form id="frm-cita-medica" action="agregar-cita" method="post">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">Agregar cita médica</h4>
						</div>
						<div class="modal-body padre-popover">
							<input type="hidden" name="hdnfechaCita">
							<input type="hidden" name="hdnpacienteid">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group input-group-sm">
										<label class="control-label">Paciente</label>
										<div class="paciente-autocomplete">
											<input type="text" class="form-control typeahead" name="txtBuscarPaciente">
										</div>
									</div>
									<div class="form-group input-group-sm">
										<label class="control-label">Especialidad</label>
										<select class="form-control" name="cboEspecialidad">
											<option selected value>Elegir especialidad...</option>
											<?php
												foreach (@$especialidades as $especialidad){
													echo "<option value='$especialidad->especialidad'>$especialidad->especialidad</option>";
												}
											?>
										</select>
									</div>
									<div class="form-group input-group-sm">
										<label class="control-label">Médico</label>
										<select class="form-control" name="cboMedico">
											<option selected value>Elegir médico...</option>
										</select>
									</div>
									<div class="form-group input-group-sm">
										<div class="row">
											<div class="col-md-12">
												<label class="control-label">Horario</label>
											</div>
											<div class="col-md-6">
												<select class="form-control input-sm" name="list_horas_i">
													<option selected value>Horas</option>
													<?php for($i=7;$i<21;$i++):?>
														<option value=<?=($i+1)?>><?=($i+1)?></option>
													<?php endfor;?>
												</select>
											</div>
											<div class="col-md-6">
												<select class="form-control input-sm" name="list_minutos_i">
													<option selected value>Minutos</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Guardar</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	
	<div class="modal fade" id="modal-eliminar-cita" tabindex="-1" role="dialog" aria-labelledby="modalEliminarCitas" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Cuadro de diálogo</h4>
				</div>
				<div class="modal-body">¿Está seguro que desea eliminar el registro?</div>
				<div class="modal-footer">
					<button type="button" id="sicita" class="btn btn-primary">Si</button>
	                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
	            </div>
	        </div>
	    </div>
	</div>  
