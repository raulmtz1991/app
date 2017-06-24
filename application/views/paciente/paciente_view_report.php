<!DOCTYPE html>
<html style="margin: 0px;">
	<head>
		<title>Historia Clinica</title>
		<style>
			.tbl-funciones td {
				padding-top: 5px;
				font-family: Verdana;
				font-size: 14px;
				font-weight: 500;
				border: 1px solid;
				padding-left: 5px;
			}
		</style>
	</head>
	<body style="background: #E3E2A8;">
		<div style="padding: 50px;">
			<div style="width: 100%;">
				<div style="width: 50%;float: left;">
					<h2>HISTORIA CLINICA</h2>
				</div>
				<div style="width: 50%; border: 1px solid; float: left; padding-bottom: 5px; padding-top: 5px; padding-left: 10px; padding-right: 10px;">
					<label style="display: inline-block; width: 26%">APELLIDOS:</label>
					<label style="display: inline-block;width: 74%; border-bottom: 1px solid;"><?=@$paciente->apepaterno.' '.@$paciente->apematerno?></label>
					<br><br>
					<label style="display: inline-block; width: 23%">NOMBRES:</label>
					<label style="display: inline-block;width: 77%; border-bottom: 1px solid;"><?=$paciente->nombre?></label>
				</div>
			</div>
			<div style="clear: both"></div>
			<div style="width: 100%;">
				<div>
					<h4>I. ANAMNESIS:</h4>
					<h4>1. FILIACION:</h4>
					<div class="posicion1" style="float: left;" >
						<div style="float:left; width:33%; height:25px;"></div>
					</div>
					<div class="posicion1" style="float: left;" >
						<div style="float:left; width:33%; height:25px;"></div>
					</div>
					<div class="posicion1" style="float: left;" >
						<div style="float:left; width:34%; height:25px;">
							<?php
								switch ($paciente->estadocivilid) {
									case 1:
										$estado_civil='Soltero';
										break;
									case 2:
										$estado_civil='Casado';
										break;
									case 3:
										$estado_civil='Divorciado';
										break;
									case 4:
										$estado_civil='Viudo';
										break;
								}
							?>
							<label style="display: inline-block; width: 35%">Estado Civil:</label>
							<label style="display: inline-block;width: 65%; border-bottom: 1px solid;"><?=$estado_civil?></label>
						</div>
					</div>
					<br>
					<br>
					<div class="posicion1" style="float: left;" >
						<div style="float:left; width:33%; height:25px;">
							<label style="display: inline-block; width: 16%">Edad:</label>
							<label style="display: inline-block;width: 80%; border-bottom: 1px solid;"><?=$paciente->edad?></label>
						</div>
					</div>
					<div class="posicion1" style="float: left;" >
						<div style="float:left; width:33%; height:25px;">
							<label style="display: inline-block; width: 31%">Ocupación:</label>
							<label style="display: inline-block;width: 64%; border-bottom: 1px solid;"><?=$paciente->ocupacion?></label>
						</div>
					</div>
					<div class="posicion1" style="float: left;" >
						<div style="float:left; width:34%; height:25px;">
							<label style="display: inline-block; width: 40%">Lugar de Nac.:</label>
							<label style="display: inline-block;width: 60%; border-bottom: 1px solid;"><?=$paciente->lugarnac?></label>
						</div>
					</div>
					<br>
					<br>
					<div class="posicion1" style="float: left;" >
						<div style="float:left; width:41%; height:25px;">
							<label style="display: inline-block; width: 24%">Domicilio:</label>
							<label style="display: inline-block;width: 71%; border-bottom: 1px solid;"><?=$paciente->domicilio?></label>
						</div>
					</div>
					<div class="posicion1" style="float: left;" >
						<div style="float:left; width:25%; height:25px;">
							<label style="display: inline-block; width: 35%">Teléfono:</label>
							<label style="display: inline-block;width: 60%; border-bottom: 1px solid;"><?=$paciente->telefono?></label>
						</div>
					</div>
					<div class="posicion1" style="float: left;" >
						<div style="float:left; width:34%; height:25px;">
							<label style="display: inline-block; width: 42%">Lugar de Proc.:</label>
							<label style="display: inline-block;width: 58%; border-bottom: 1px solid;"><?=$paciente->lugarproc?></label>
						</div>
					</div>
				</div>
				<div style="clear: both"></div>
				<div style="width: 100%">
					<h4>2. ANTECEDENTES</h4>
					<div class="posicion1" style="float: left;" >
						<div style="float:left; width:50%; height:25px;">
							<label style="display: inline-block; width: 17%">Médicos:</label>
							<label style="display: inline-block;width: 78%;  height: 20px; border-bottom: 1px solid;"><?=$historia->medicos?></label>
						</div>
					</div>
					<div class="posicion1" style="float: left;" >
						<div style="float:left; width:50%; height:25px;">
							<label style="display: inline-block; width: 23%">Quirúrgicos:</label>
							<label style="display: inline-block;width: 77%;  height: 20px; border-bottom: 1px solid;"><?=$historia->quirurgicos?></label>
						</div>
					</div>
					<br>
					<br>
					<div class="posicion1" style="float: left;" >
						<div style="float:left; width:50%; height:25px;">
							<label style="display: inline-block; width: 23%">Alergicos:</label>
							<label style="display: inline-block;width: 77%;  height: 20px; border-bottom: 1px solid;"><?=$historia->alergicos?></label>
						</div>
					</div>
					<br>
					<br>
					<div class="posicion1" style="float: left">
						<div style="float:left; width:25%; height:25px;">
							<label>Ginecologos:</label>
						</div>
					</div>
					<div class="posicion1" style="float: left">
						<div style="float:left; width:23%; height:25px;">
							<label style="display: inline-block; width: 21%">FUR:</label>
							<label style="display: inline-block;width: 74%;  height: 20px; border-bottom: 1px solid;"><?=$historia->fur?></label>
						</div>
					</div>
					<div class="posicion1" style="float: left">
						<div style="float:left; width:27%; height:25px;">
							<label style="display: inline-block; width: 52%">MENARQUIA:</label>
							<label style="display: inline-block;width: 43%; height: 20px; border-bottom: 1px solid;"><?=$historia->menarquia?></label>
						</div>
					</div>
					<div class="posicion1" style="float: left">
						<div style="float:left; width:25%; height:25px;">
							<label style="display: inline-block; width: 16%">R.S:</label>
							<label style="display: inline-block;width: 84%; height: 20px; border-bottom: 1px solid;"><?=$historia->rs?></label>
						</div>
					</div>
					<br/>
					<br/>
					<div class="posicion1" style="float: left">
						<div style="float:left; width:25%; height:25px;"></div>
					</div>
					<div class="posicion1" style="float: left">
						<div style="float:left; width:25%; height:25px;">
							<label style="display: inline-block; width: 16%">R.C:</label>
							<label style="display: inline-block;width: 79%; height: 20px; border-bottom: 1px solid;"><?=$historia->rc?></label>
						</div>
					</div>
					<div class="posicion1" style="float: left">
						<div style="float:left; width:18%; height:25px;">
							<div class="posicion1" style="float: left;">
								<div style="float:left; width:50px; height:25px;">
									<label style="display: inline-block; width: 16%">G</label>
									<label style="display: inline-block;width: 77%; height: 20px; border-bottom: 1px solid;"><center><?=$historia->g?></center></label>
								</div>
								<div style="float:left; width:50px; height:25px;margin-left: 51px;">
									<label style="display: inline-block; width: 16%">P</label>
									<label style="display: inline-block;width: 77%; height: 20px;border-bottom: 1px solid;"><center><?=$historia->p?></center></label>
								</div>
							</div>
						</div>
					</div>
					<div class="posicion1" style="float: left">
						<div style="float:left; width:25%; height:25px;">
							<label style="display: inline-block; width: 18%">M.A:</label>
							<label style="display: inline-block;width: 82%; height: 20px; border-bottom: 1px solid;"><?=$historia->ma?></label>
						</div>
					</div>
					<br>
					<br>
					<div class="posicion1" style="float: left;" >
						<div style="float:left; width:50%; height:25px;">
							<label style="display: inline-block; width: 29%">Hospitalización:</label>
							<label style="display: inline-block;width: 66%; height: 20px; border-bottom: 1px solid;"><?=$historia->hospitalizacion?></label>
						</div>
					</div>
					<div class="posicion1" style="float: left;" >
						<div style="float:left; width:50%; height:25px;">
							<label style="display: inline-block; width: 32%">Hábitos Nocivos:</label>
							<label style="display: inline-block;width: 68%; height: 20px; border-bottom: 1px solid;"><?=$historia->habitosnocivos?></label>
						</div>
					</div>
				</div>
				<?php foreach($enfermedad as $diag):?>
				<div style="clear: both"></div>
				<div style="width: 100%; margin-bottom: 120px;">
					<h4>II. ENFERMEDAD ACTUAL:</h4>
					<div class="posicion1" style="float: left;" >
						<div style="float:left; width:33%; height:25px;"></div>
					</div>
					<div class="posicion1" style="float: left;" >
						<div style="float:left; width:33%; height:25px;"></div>
					</div>
					<div class="posicion1" style="float: left;" >
						<div style="float:left; width:34%; height:25px;">
							<label style="display: inline-block; width: 17%">Fecha:</label>
							<label style="display: inline-block;width: 83%; border-bottom: 1px solid; height: 20px;"><?=$diag->fecha?></label>
						</div>
					</div>
					<br><br>
					<div class="posicion1" style="float: left;" >
						<div style="float:left; width:50%; height:25px;">
							<label style="display: inline-block; width: 53%">Tiempo de Enfermedad(T.E):</label>
							<label style="display: inline-block;width: 42%;  height: 20px; border-bottom: 1px solid;"><?=$diag->tiemenferm?></label>
						</div>
					</div>
					<div class="posicion1" style="float: left;" >
						<div style="float:left; width:50%; height:25px;">
							<label style="display: inline-block; width: 6%">SP:</label>
							<label style="display: inline-block;width: 94%;  height: 20px; border-bottom: 1px solid;"><?=$diag->sp?></label>
						</div>
					</div>
					<br><br>
					<div class="posicion1" style="float: left;" >
						<div style="float:left; width:100%; height:25px;">
							<label style="display: inline-block; width: 7%">Relato:</label>
							<label style="display: inline-block;width: 92%; height: 20px; border-bottom: 1px solid;"><?=$diag->relato?></label>
						</div>
					</div>
					<br><br>
					<div class="posicion1" style="float: left;" >
						<div style="float:left; width:100%; height:25px;">
							<label style="display: inline-block;width: 100%; height: 20px; border-bottom: 1px solid;"></label>
						</div>
					</div>
					<br><br>
					<div class="posicion1" >
						<div style="float:left; width:100%; height:auto;">
							<table class="tbl-funciones" style="width:100%;border: 1px solid; border-collapse: collapse;">
								<tr class="row1">
									<td width="25%">FUNCIONES VITALES:</td>
									<td width="15%">F.C. <?=$diag->fc?></td>
									<td width="15%">P.A. <?=$diag->pa?></td>
									<td width="15%">F.R. <?=$diag->fr?></td>
									<td width="15%">T. <?=$diag->temperatura?></td>
									<td width="15%">PESO <?=$diag->peso?></td>
								</tr>
								<tr class="row2">
									<td colspan="2" width="33%">GENERAL</td>
									<td colspan="2" width="33%">CABEZA: <?=$diag->cabeza?></td>
									<td colspan="2" width="34%">CUELLO: <?=$diag->cuello?></td>
								</tr>
								<tr class="row3">
									<td colspan="3" width="50%">TORAX Y PULMONES: <?=$diag->toraxpulmones?></td>
									<td colspan="3" width="50%">CARDIOVASCULAR <?=$diag->cardiovascular?></td>
								</tr>
								<tr>
									<td colspan="2" width="33%" valign="middle" align="center">ABDOMEN</td>
									<td colspan="4" width="67%"><?=$diag->abdomen?></td>
								</tr>
								<tr>
									<td colspan="2" valign="middle" align="center">GENITO-UNITARIO</td>
									<td colspan="4"><?=$diag->genitourinario?></td>
								</tr>
								<tr>
									<td colspan="2" valign="middle" align="center">LOCOMOTOR Y NEUROLOGICO</td>
									<td colspan="4"><?=$diag->loconeurolo?></td>
								</tr>
								<tr>
									<td colspan="2" valign="middle" align="center">Dx.</td>
									<td colspan="4"><?=$diag->dx1.' '.$diag->dx2.' '.$diag->dx3.' '.$diag->dx4?></td>
								</tr>
								<tr>
									<td colspan="2" valign="middle" align="center">TRATAMIENTO</td>
									<td colspan="4"><?=$diag->tratamiento1.' '.$diag->tratamiento2.' '.$diag->tratamiento3.' '.$diag->tratamiento4?></td>
								</tr>
							</table>
						</div>
					</div>
					<br><br><br><br><br><br><br><br><br><br><br>
					<div class="posicion1" style="float: left;" >
						<div style="float:left; width:100%; height:25px;">
							<label style="display: inline-block; width: 20%">Examenes Auxiliares:</label>
							<label style="display: inline-block;width: 79%; height: 20px; border-bottom: 1px solid;"><?=$diag->exauxiliares?></label>
						</div>
					</div>
					<br><br>
					<div class="posicion1" style="float: left;" >
						<div style="float:left; width:100%; height:25px;">
							<label style="display: inline-block;width: 100%; height: 20px; border-bottom: 1px solid;"></label>
						</div>
					</div>
				</div>
				<?php endforeach?>
			</div>
		</div>
	</body>
</html>