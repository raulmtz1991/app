<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Lista de citas atendidas</title>
		<link rel="stylesheet" href="<?= CSS . 'table.css' ?>">
	</head>
	<body>
		<div class="legend"style="width: 100%; height: 2em; background-color: #666666;">
			<h2 style="font-size: 16px; font-family: Verdana; color: white; padding-bottom: 15px; padding-left: 10px;">Medico: <?=str_replace('%20',' ',$this->uri->segment(6));?></h2>
		</div>
		<br>
		<table id="gradient-style" style="width:100%;">
			<thead>
				<tr>
					<th style="width: 25%;">Fecha</th>
					<th style="width: 50%;">Paciente</th>
					<th style="width: 25%;">Horario de Atencion</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($citas as $cita): ?>
					<tr>
						<td><?= $cita->fecha; ?></td>
                        <td><?= $cita->nombpaciente; ?></td>
                        <td><?= $cita->horainicio; ?></td>
                    </tr>
                <?php endforeach; ?>
			</tbody>
		</table>
	</body>
</html>>