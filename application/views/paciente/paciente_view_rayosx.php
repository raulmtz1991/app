<div class="modal" id="modalSubirRayos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<form id="frm-subir-rayos" method="POST" action="<?=base_url();?>subir-rayosx" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Subir rayo-x</h4>
				</div>
				<div class="modal-body">
					<p id="mensaje-modal">Eliga el rayo-x que desea subir a la web.</p>
					<p id="mensaje-error" style="display:none"></p>
					<div id="progress-file" class="progress" style="display:none;">
						<div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100">
						</div>
						<div class="info-file">
							<div class="info-imagen">
								<span style="margin-right:5px;"><i class="glyphicon glyphicon-picture"></i></span>
							</div>
							<div class="img-listo">
								<div id="spinner_img" style="display:none; height:35px;width:14px;"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="file" name="f_subir_rayosx" size="chars">
					<button type="button" class="btn btn-primary" name="btnHecho" data-dismiss="modal" style="display:none">Hecho</button>
					<button type="button" class="btn btn-primary" name="btnOcultar" data-dismiss="modal" style="display:none">Ocultar</button>
					<button type="button" class="btn btn-primary" name="btnCargarImagen">Seleccionar archivo</button>
					<button type="button" class="btn btn-default" data-dismiss="modal" name="btnCancelar">Cancelar</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="modal fade" id="modal-eliminar-rayo" tabindex="-1" role="dialog" aria-hidden="true">
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
<h4 class="page-header" style="margin:0px;">Lista de rayos-x</h4>
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
<button type="button" class="btn btn-agregar" data-toggle="modal" data-target="#modalSubirRayos" name="btnAgregarRayo" style="margin:10px 0px;">
	<i class="glyphicon glyphicon-plus-sign"></i>
</button>
<div class="lista-rayos row">
	<?php if(@$rayos->result()!=NULL):?>
		<?php foreach ($rayos->result() as $rayo):?>
			<div class="col-md-3" style="margin-bottom:12px;">
				<a href="#" class="thumbnail">
					<img src='<?=RX.@$rayo->historiaclinicaid.'/'.@$rayo->nombre.@$rayo->tipo?>'>
				</a>
				<div class="caption">
					<h4><?=@$rayo->nombre?></h4>
					<p><?=@$rayo->fecha?></p>
					<p>
						<a href="<?=base_url();?>rayosx/rayosx/download/<?=$rayo->nombre.$rayo->tipo.'/'.$rayo->historiaclinicaid?>" class="btn btn-primary" role="button"><i class="glyphicon glyphicon-download-alt"></i></a>
						<a id="eliminar-rayo" url="<?=base_url();?>eliminar-rayosx/<?=$rayo->rayosxid?>/<?=$rayo->historiaclinicaid?>/<?=@$rayo->nombre.@$rayo->tipo?>" class="btn btn-primary" role="button"><i class="glyphicon glyphicon-trash"></i></a>
					</p>
				</div>
			</div>
		<?php endforeach;?>
	<?php else:?>
		<div class="col-md-12">
			<h4>No se encontraron archivos de rayos-x.</h4>
		</div>
	<?php endif;?>
</div>