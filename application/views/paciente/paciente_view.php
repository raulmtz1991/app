<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"></h2>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<ul class="nav nav-tabs tab-cabecera">
			<li class="active"><a href="#home" data-toggle="tab">Anamnesis</a></li>
			<?php if(@$enfermedad!=NULL):?>
				<li><a href="#diagnostico" data-toggle="tab">Diagnóstico</a></li>
				<li><a href="#informe" data-toggle="tab">Informe Lab.</a></li>
				<li><a href="#ecografia" data-toggle="tab">Ecografia</a></li>
				<li><a href="#rayosx" data-toggle="tab">Rayos-X</a></li>
			<?php endif;?>
		</ul>
		<div class="tab-content padre-popover">
			<?=@$anamnesis;?>
			<div class="tab-pane" id="diagnostico">
				<?=@$enfermedad;?>
			</div>
			<div class="tab-pane" id="informe">
				<?=@$informe;?>
			</div>
			<div class="tab-pane" id="ecografia">
				<?=@$ecografia?>
			</div>
			<div class="tab-pane" id="rayosx">
				<?=@$rayosx?>
			</div>
		</div>
	</div>
</div>