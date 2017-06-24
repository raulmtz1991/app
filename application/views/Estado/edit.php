<?php     
$attributes = array('class'=>'well form-horizontal');
echo form_open(current_url(),$attributes); ?>
<fieldset>
    <div class="alert alert-error">
        <?php echo $custom_error; ?>
    </div>       
<?php echo form_hidden('idEstado',$result->idEstado) ?>

                                    <div class="control-group"><label for="IdPais" class="control-label"><?php echo lang('IdPais');?><span class="required">*</span>: </label>
                                    <div class="controls"><input id="IdPais" type="text" name="IdPais" value="<?php echo $result->IdPais ?>"  class="input-xlarge"  />
                                    <span class="help-inline"<?php echo form_error('IdPais','<div class="error">','</div>'); ?></span></div>
                                    </div>
                                    

                                    <div class="control-group"><label for="Capital" class="control-label"><?php echo lang('Capital');?><span class="required">*</span>: </label>
                                    <div class="controls"><input id="Capital" type="text" name="Capital" value="<?php echo $result->Capital ?>"  class="input-xlarge"  />
                                    <span class="help-inline"<?php echo form_error('Capital','<div class="error">','</div>'); ?></span></div>
                                    </div>
                                    

                                    <div class="control-group"><label for="Nombre" class="control-label"><?php echo lang('Nombre');?><span class="required">*</span>: </label>
                                    <div class="controls"><input id="Nombre" type="text" name="Nombre" value="<?php echo $result->Nombre ?>"  class="input-xlarge"  />
                                    <span class="help-inline"<?php echo form_error('Nombre','<div class="error">','</div>'); ?></span></div>
                                    </div>
                                    
 <div class="form-actions">
        <?php $data = array(
    'name' => 'button',
    'id' => 'button',
    'value' => 'true',
    'type' => 'submit',
    'content' => 'Submit',
    'class'=>'btn btn-primary'        
);

echo form_button($data); ?>
 </div>
</fieldset>

<?php echo form_close(); ?>
