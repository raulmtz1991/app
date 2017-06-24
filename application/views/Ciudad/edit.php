<?php     
$attributes = array('class'=>'well form-horizontal');
echo form_open(current_url(),$attributes); ?>
<fieldset>
    <div class="alert alert-error">
        <?php echo $custom_error; ?>
    </div>       
<?php echo form_hidden('id_cd',$result->id_cd) ?>

                                    <div class="control-group"><label for="Nombre" class="control-label"><?php echo lang('Nombre');?><span class="required">*</span>: </label>
                                    <div class="controls"><input id="Nombre" type="text" name="Nombre" value="<?php echo $result->Nombre ?>"  class="input-xlarge"  />
                                    <span class="help-inline"<?php echo form_error('Nombre','<div class="error">','</div>'); ?></span></div>
                                    </div>
                                    

                                    <div class="control-group"><label for="IdEdo" class="control-label"><?php echo lang('IdEdo');?><span class="required">*</span>: </label>
                                    <div class="controls"><input id="IdEdo" type="text" name="IdEdo" value="<?php echo $result->IdEdo ?>"  class="input-xlarge"  />
                                    <span class="help-inline"<?php echo form_error('IdEdo','<div class="error">','</div>'); ?></span></div>
                                    </div>
                                    

                                    <div class="control-group"><label for="poblacion" class="control-label"><?php echo lang('poblacion');?><span class="required">*</span>: </label>
                                    <div class="controls"><input id="poblacion" type="text" name="poblacion" value="<?php echo $result->poblacion ?>"  class="input-xlarge"  />
                                    <span class="help-inline"<?php echo form_error('poblacion','<div class="error">','</div>'); ?></span></div>
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
