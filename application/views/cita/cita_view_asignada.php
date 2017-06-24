<div class="legend">
	<h2>Cita: Elegir Cita</h2>
</div>
<br>
<div class="area" style="display: table;">
	<div class="posicion1">
		<div style="float:left; width:410px; height:50px;">
			<label>Buscar :</label>
			<input type="text" id="buscarCita" placeholder="Escriba primer apellido" required="" style="width:400px;"/>
		</div>
	</div>
	<br><br><br>
	<!--<div>
		<label style="font-size:20px"></label>
	</div>
	<br>
	<ul class="tabs">
		<li class="citas_atendidas">
			<a href="#atendido">Citas Atendidas</a>
		</li>
		<li class="citas_pendientes">
			<a href="#pendiente">Citas Pendientes</a>
		</li>
	</ul>
	<div class="content">
		<div id="atendido" class="content_tab">
			<div class="area">
				<div class="posicion1" >
					<div style="float:left; width:250px; height:60px;">
						<label>Nombre Paciente :</label>
						<br/>
						<input type="text" name="txtnombre" value="<?=@$paciente->nombre;?>"  placeholder="Escriba Nombres" required="" />
					</div>
				</div>	
			</div>
		</div>
		<div id="pendiente" class="content_tab">Hola de nuevo</div>
	</div>-->
	<div class="posicion1" style="float: left; padding-left: 8px" >
		<div style="float:left;  height:50px;">
			<a id="c_atendidas" target="_blank"><input type="button" value="Citas Atendidas"  class="button red" style="width:auto;"/></a>
		</div>
		<div style="float:left;  height:50px;">
			<a id="c_pendientes" target="_blank"><input type="button" value="Citas Pendientes"  class="button red" style="width:auto;"/></a>
		</div>
	</div>
</div>