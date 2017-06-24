<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Secretaria<small><i class="glyphicon glyphicon-chevron-right"></i> lista de secretarias</small></h2>
    </div>
</div>
<div class="row">
	<div class="modal fade" id="modal-eliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarCitas" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Cuadro de diálogo</h4>
				</div>
				<div class="modal-body">¿Está seguro que desea eliminar el registro?</div>
				<div class="modal-footer">
					<button type="submit" id="si" class="btn btn-primary">Si</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<?php if($this->session->flashdata('mensaje')):?>
			<div class="alert alert-success alert-dismissable" style="margin-top:10px">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            	<strong><?=$this->session->flashdata('mensaje')?></strong>
        	</div>
        <?php elseif($this->session->flashdata('mensaje_a')):?>
        	<div class="alert alert-warning alert-dismissable" style="margin-top:10px">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            	<strong><?=$this->session->flashdata('mensaje_a')?></strong>
        	</div>
    	<?php endif;?>
		<div class="panel panel-default">
			<div class="panel-heading"><h3 class="panel-title">Lista de secretarias</h3></div>
			<div class="panel-body">
				<div>
					<table class="table table-striped table-bordered table-hover" id="tbl-lista-secretaria" width="100%">
						<thead>
							<tr>
								<th width="10%">D.N.I</th>
								<th width="34">Nombres y Apellidos</th>
								<th width="33">Domicilio</th>
								<th width="8%">Teléfono</th>
									<th width="7%">Editar</th>
									<th width="8%">Eliminar</th>
								
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>