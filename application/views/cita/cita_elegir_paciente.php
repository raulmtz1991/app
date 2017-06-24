<div class="legend">
	<h2>Cita: Agregar Cita</h2>
</div>
<br/>
<ul class="tabs">
	<li class="nuevo_paciente">
		<a href="#nuevo">Paciente nuevo</a>
	</li>
	<li class="recurrente_paciente">
		<a href="#recurrente">Paciente Recurrente</a>
	</li>
</ul>
<div class="content">
	<div id="nuevo" class="content_tab">
		<form>
			<fieldset style="min-width:1053px;">
				<legend>
					Datos Personales
				</legend>
				<div class="area">
					<div class="posicion1" >
						<div style="float:left; width:250px; height:60px;">
							<label>Nombre Paciente :</label>
							<br/>
							<input type="text" name="txtnombre" value="<?=@$paciente->nombre;?>"  placeholder="Escriba Nombres" required="" />
						</div>
					</div>
		
					<div class="posicion1" >
						<div style="float:left; width:250px; height:60px;">
							<label>Apellido Paterno :</label>
							<br/>
							<input type="text" name="txtapePaterno" value="<?=@$paciente->apepaterno;?>" placeholder="Escriba Ape. Paterno" required=""/>
						</div>
					</div>
		
					<div class="posicion1" >
						<div style="float:left; width:250px; height:60px;">
							<label>Apellido Materno :</label>
							<br/>
							<input type="text" name="txtapeMaterno" value="<?=@$paciente->apematerno;?>" placeholder="Escriba Ape. Materno" required=""/>
						</div>
					</div>
					<div class="posicion1" >
						<div style="float:left; width:250px; height:60px;">
							<label>Estado Civil:</label>
							<br/>
							<select name="list_estado" required="">
								<option  selected="" value="">Seleccionar...</option>
								<?php
								foreach ($estadocivil as $key => $value) {
									echo '<option value="' . $key . '">' . $value . '</option>';
								}
								?>
							</select>
						</div>
		
					</div>
					<br/>
					<br/>
					<br/>
					<div class="posicion1" >
						<div style="float:left; width:250px; height:60px;">
							<label>Edad Paciente:</label>
							<br/>
							<input type="text" name="txtedad" value="<?=@$paciente->edad;?>" placeholder="Escriba Edad" required=""/>
						</div>
					</div>
					<div class="posicion1" >
						<div style="float:left; width:250px; height:60px;">
							<label>Ocupacion:</label>
							<br/>
							<input type="text" name="txtocupacion" value="<?=@$paciente->ocupacion;?>" placeholder="Escribe Ocupacion" required="" />
						</div>
					</div>
					<div class="posicion1" >
						<div style="float:left; width:509px; height:60px;">
							<label>Domicilio:</label>
							<br/>
							<input style="width: 503px" type="text" name="txtdomicilio" value="<?=@$paciente->domicilio;?>" placeholder="Escribe Domicilio" required="" />
						</div>
					</div>
					<br/>
					<br/>
					<br/>
					<div class="posicion1" >
						<div style="float:left; width:250px; height:60px;">
							<label>Telefono:</label>
							<br/>
							<input type="text" name="txttelefono" value="<?=@$paciente->telefono;?>" placeholder="Escribe Telefono" required=""/>
						</div>
					</div>
		
					<div class="posicion1" >
						<div style="float:left; width:250px; height:60px;">
							<label>Lugar de Nacimiento:</label>
							<br/>
							<input type="text" name="txtLugarNac" value="<?=@$paciente->lugarnac;?>" placeholder="Escribe Lugar Nac." required=""/>
						</div>
					</div>
					<div class="posicion1" >
						<div style="float:left; width:250px; height:60px;">
							<label>Lugar de Procedencia:</label>
							<br/>
							<input type="text" name="txtLugaProc" value="<?=@$paciente->lugarproc;?>" placeholder="Escribe Lugar Proc." required=""/>
						</div>
					</div>
					<br/>
					<br/>
					<br/>
				</div>
			</fieldset>
			<div class="posicion1" style="float: right;" >
				<div style="float:left;  height:60px;">
					<input type="submit" value="Guardar"  class="button red" />
					<input type="reset" value="Reset" class="button red"/>
				</div>
			</div>
		</form>
	</div>
	<div id="recurrente" class="content_tab">
		<form style="min-width: 1081px;">
		    <fieldset class="informacion" style="min-width: 1053px;">
		        <legend>
		            Información
		        </legend>
		        <div class="area" style="display: table;">
		            <div class="posicion1">
		                <div style="float:left; width:350px; height:60px;">
		                    <label>Buscar :</label>
		                    <input type="text" id="txtbuscarPaciente" placeholder="Escriba primer apellido" required="" />
		                </div>
		            </div>
		            <br><br>
		        </div>
		    </fieldset>
		</form>
	</div>
	<div id="agregar_cita" class="content_tab agregar_cita">
		<form method="post" action="<?=base_url().'cita/cita/addOrUpdate'?>">
			<fieldset style="min-width:1053px;">
				<legend>
					Información de la cita
				</legend>
				<div class="area" style="width: 400px">
					<input type="hidden" name="hdnpacienteid"/>
					<input type="hidden" name="hdnfecha_actual"/>
					<div class="posicion1" >
						<div style="float:left; width:305px; height:60px;">
							<label>Paciente :</label>
							<br/>
							<input type="text" name="txtnombre" style="width: 300px" required="" disabled=""/>
						</div>
					</div>
					<br/>
					<br/>
					<br/>
					<div class="posicion1" >
						<div style="float:left; width:305px; height:60px;">
							<label>Especialidad:</label>
							<br/>
							<select id="cboEspecialidad" name="list_especialidad" required="" style="width: 305px">
								<option  value="">Seleccionar...</option>
								<?php
									foreach ($especialidades as $especialidad) {
										echo '<option value="'.$especialidad->especialidad.'">'.$especialidad->especialidad.'</option>';
									}
								?>
							</select>
						</div>
					</div>
					<br/>
					<br/>
					<br/>
					<div class="posicion1" >
						<div style="float:left; width:305px; height:60px;">
							<label>Médico:</label>
							<br/>
							<select id="cboMedico" name="list_medico" required="" style="width: 305px">
							</select>
						</div>
					</div><br/>
					<div class="posicion1" >
						<div style="float:left; width:305px; height:60px;">
							<label>Incio de la Cita:</label>
							<br/>
							<select name="list_horas_i" required="" style="width: 99px">
								<option  value="1">1</option>
								<option  value="2">2</option>
								<option  value="3">3</option>
								<option  value="4">4</option>
								<option  value="5">5</option>
								<option  value="6">6</option>
								<option  value="7">7</option>
								<option  value="8">8</option>
								<option  value="9">9</option>
								<option  value="10">10</option>
								<option  value="11">11</option>
								<option  value="12">12</option>
							</select>
							<select name="list_minutos_i" required="" style="width: 99px">
								<option  value="00">00</option>
								<option  value="05">05</option>
								<option  value="10">10</option>
								<option  value="15">15</option>
								<option  value="20">20</option>
								<option  value="25">25</option>
								<option  value="30">30</option>
								<option  value="35">35</option>
								<option  value="40">40</option>
								<option  value="45">45</option>
								<option  value="50">50</option>
								<option  value="55">55</option>
							</select>
							<select name="list_meridiano_i" required="" style="width: 99px">
								<option  value="am">a.m</option>
								<option  value="pm">p.m</option>
							</select>
						</div>
					</div>
					<br/>
					<br/>
					<br/>
					<div class="posicion1" >
						<div style="float:left; width:305px; height:60px;">
							<label>Fin de la Cita:</label>
							<br/>
							<select name="list_horas_f" required="" style="width: 99px">
								<option  value="1">1</option>
								<option  value="2">2</option>
								<option  value="3">3</option>
								<option  value="4">4</option>
								<option  value="5">5</option>
								<option  value="6">6</option>
								<option  value="7">7</option>
								<option  value="8">8</option>
								<option  value="9">9</option>
								<option  value="10">10</option>
								<option  value="11">11</option>
								<option  value="12">12</option>
							</select>
							<select name="list_minutos_f" required="" style="width: 99px">
								<option  value="00">00</option>
								<option  value="05">05</option>
								<option  value="10">10</option>
								<option  value="15">15</option>
								<option  value="20">20</option>
								<option  value="25">25</option>
								<option  value="30">30</option>
								<option  value="35">35</option>
								<option  value="40">40</option>
								<option  value="45">45</option>
								<option  value="50">50</option>
								<option  value="55">55</option>
							</select>
							<select name="list_meridiano_f" required="" style="width: 99px">
								<option  value="am">a.m</option>
								<option  value="pm">p.m</option>
							</select>
						</div>
					</div>
					<br/>
					<br/>
					<br/>
				</div>
			</fieldset>
			<div class="posicion1" style="float: left; padding-left: 0" >
				<div style="float:left;  height:60px;">
					<input type="submit" value="Crear Cita"  class="button red" />
				</div>
			</div>
		</form>
	</div>
</div>