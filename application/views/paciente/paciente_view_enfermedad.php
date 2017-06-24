<button type="button" class="btn btn-agregar" name="btn-agregar-enfermedad">
	<i class="glyphicon glyphicon-plus-sign"></i>
</button>
<?php if(@$mensaje):?>
	<div class="alert alert-success alert-dismissable" style="margin-top:10px">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong><?=$mensaje?></strong>
	</div>
<?php elseif(@$error):?>
	<div class="alert alert-warning alert-dismissable" style="margin-top:10px">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong><?=$error?></strong>
	</div>
<?php endif;?>
<div class="panel panel-default">
	<div class="panel-heading"><h3 class="panel-title">Lista de diagnosticos</h3></div>
	<div class="panel-body">
		<div class="tabla-enfermedad">
			<table class="table table-striped table-bordered table-hover" id="tbl-enfermedad" width:"100%">
				<thead>
					<tr>
						<th style="width:12%!important">Fecha</th>
						<th style="width:20%!important">T. enfermedad</th>
						<th style="width:60%!important">Relato</th>
						<th style="width:8%!important">Editar</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($diagnosticos as $diagnostico):?>
					<tr>
						<td><?=@$diagnostico->fecha?></td>
						<td><?=@$diagnostico->tiemenferm?></td>
						<td><?=@$diagnostico->relato?></td>
						<td><center><a name="editar-enfermedad" value="<?=$diagnostico->diagnosticoid?>" style="cursor:pointer"><i class="glyphicon glyphicon-pencil"></i></a></center></td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
