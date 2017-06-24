<div class="modal" id="modalSubirImagen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<form id="frm-subir-eco" method="POST" action="<?=base_url();?>subir-ecografia" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Subir ecografía</h4>
				</div>
				<div class="modal-body">
					<p id="mensaje-modal">Eliga la ecografía que desea subir a la web.</p>
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
					<input type="file" name="f_subir_imagen" size="chars">
					<button type="button" class="btn btn-primary" name="btnHecho" data-dismiss="modal" style="display:none">Hecho</button>
					<button type="button" class="btn btn-primary" name="btnOcultar" data-dismiss="modal" style="display:none">Ocultar</button>
					<button type="button" class="btn btn-primary" name="btnCargarImagen">Seleccionar archivo</button>
					<button type="button" class="btn btn-default" data-dismiss="modal" name="btnCancelar">Cancelar</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="modal fade" id="modal-eliminar-ecografia" tabindex="-1" role="dialog" aria-labelledby="modalEliminarCitas" aria-hidden="true">
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
<h4 class="page-header" style="margin:0px;">Lista de ecografías</h4>
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
<button type="button" class="btn btn-agregar" data-toggle="modal" data-target="#modalSubirImagen" name="btnAgregarEco" style="margin:10px 0px;">
	<i class="glyphicon glyphicon-plus-sign"></i>
</button>
<div class="lista-ecografia row">
	<?php if(@$ecografias->result()!=NULL):?>
		<?php foreach ($ecografias->result() as $ecografia):?>
			<div class="col-md-3" style="margin-bottom:12px;">
				<a href="#" class="thumbnail">
					<img src='<?=ECO.@$ecografia->historiaclinicaid.'/'.@$ecografia->nombre.@$ecografia->tipo?>'>
				</a>
				<div class="caption">
					<h4><?=@$ecografia->nombre?></h4>
					<p><?=@$ecografia->fecha?></p>
					<p>
						<a href="<?=base_url();?>ecografia/ecografia/download/<?=$ecografia->nombre.$ecografia->tipo.'/'.$ecografia->historiaclinicaid?>" class="btn btn-primary" role="button"><i class="glyphicon glyphicon-download-alt"></i></a>
						<a id="eliminar-ecografia" url="eliminar-ecografia/<?=$ecografia->ecografiaid?>/<?=$ecografia->historiaclinicaid?>/<?=@$ecografia->nombre.@$ecografia->tipo?>" class="btn btn-primary" role="button"><i class="glyphicon glyphicon-trash"></i></a>
					</p>
				</div>
			</div>
		<?php endforeach;?>
	<?php else:?>
		<div class="col-md-12">
			<h4>No se encontraron archivos ecográficos</h4>
		</div>
	<?php endif;?>
</div>