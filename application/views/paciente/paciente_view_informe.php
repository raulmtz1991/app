<!--<div class="tab-pane" id="informe">-->
	<div class="col-md-12">
		<div class="modal" id="modalSubirInforme" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<form method="POST" action="<?=base_url();?>subir-informe" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">Subir informe</h4>
						</div>
						<div class="modal-body">
							<p id="mensaje-modal">Eliga un informe que desea subir a la web.</p>
							<p id="mensaje-error" style="display:none"></p>
							<div id="progress-file" class="progress" style="display:none;">
								<div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100">
								</div>
								<div class="info-file">
									<div class="info-imagen">
										<span style="margin-right:5px;"><i class="glyphicon glyphicon-file"></i></span>
									</div>
									<div class="img-listo">
										<div id="spinner_img" style="display:none; height:35px;width:14px;"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="file" name="f_subir_informe" size="chars">
							<button type="button" class="btn btn-primary" name="btnHecho" data-dismiss="modal" style="display:none">Hecho</button>
							<button type="button" class="btn btn-primary" name="btnOcultar" data-dismiss="modal" style="display:none">Ocultar</button>
							<button type="button" class="btn btn-primary" name="btnCargarInforme">Seleccionar archivo</button>
							<button type="button" class="btn btn-default" data-dismiss="modal" name="btnCancelar">Cancelar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="modal fade" id="modal-eliminar-informe" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Cuadro de diálogo</h4>
					</div>
					<div class="modal-body">¿Está seguro que desea eliminar el registro?</div>
					<div class="modal-footer">
						<button type="button" name="btnsi" class="btn btn-primary">Si</button>
		                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
		            </div>
		        </div>
		    </div>
		</div>
		<input type="hidden" name="hdnhistoriaclinicaid" value="<?=@$historiaclinicaid?>">
		<button type="button" class="btn btn-agregar" data-toggle="modal" data-target="#modalSubirInforme"> 
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
			<div class="panel-heading"><h3 class="panel-title">Lista de informes</h3></div>
			<div class="panel-body">
				<div class="tabla-informe">
					<table class="table table-striped table-bordered table-hover" id="tbl-informe" style="width:100%!important">
						<thead>
							<tr>
								<th style="width:12%!important">Fecha</th>
								<th style="width:68%!important">Nombre archivo</th>
								<th style="width:11%!important">Descargar</th>
								<th style="width:9%!important">Eliminar</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($informes as $informe):?>
								<tr>
									<td><?=@$informe->fecha?></td>
									<td><?=@$informe->nombre?></td>
									<td><center><a href="<?=base_url();?>paciente/informe/download/<?=@$informe->nombre.@$informe->tipo.'/'.@$informe->historiaclinicaid?>"><i class="glyphicon glyphicon-download-alt"></i></a></center></td>
									<td><center><a id="eliminar-informe" url="eliminar-informe/<?=@$informe->informeid.'/'.@$informe->historiaclinicaid.'/'.@$informe->nombre.@$informe->tipo?>" style="cursor:pointer"><i class="glyphicon glyphicon-trash"></i></a></center></td>
								</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<!--</div>-->