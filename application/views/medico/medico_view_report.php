<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Lista de Medicos</title>
		<link rel="stylesheet" href="<?= CSS . 'table.css' ?>">
	</head>
	<body>
		<div class="legend"style="width: 100%; height: 2em; background-color: #666666;">
			<h2 style="font-size: 16px; font-family: Verdana; color: white; padding-bottom: 15px; padding-left: 10px;">Medico: Lista de Medicos</h2>
		</div>
		<br>
		<table id="gradient-style" style="width:100%;">
			<thead>
				<tr>
					<th style="width: 10%;">DNI</th>
					<th style="width: 25%;">Nombres</th>
					<th style="width: 25%;">Apellidos</th>
					<th style="width: 30%;">Domicilio</th>
					<th style="width: 10%;">Teléfono</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($medicos as $medico): ?>
					<tr>
						<td><?= $medico->dni; ?></td>
                        <td><?= $medico->nombres; ?></td>
                        <td><?= $medico->apepaterno . ' ' . $medico->apematerno; ?></td>
                        <td><?= $medico->domicilio; ?></td>
                        <td><?= $medico->telefono; ?></td>
                    </tr>
                <?php endforeach; ?>
			</tbody>
		</table>
	</body>
</html>