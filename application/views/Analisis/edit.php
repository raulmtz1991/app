<?php     
$attributes = array('class'=>'well form-horizontal');
echo form_open(current_url(),$attributes); ?>
<fieldset>
    <div class="alert alert-error">
        <?php echo $custom_error; ?>
    </div>       
<?php echo form_hidden('idAnalisis',$result->idAnalisis) ?>

                                    <div class="control-group"><label for="Nombre" class="control-label"><?php echo lang('Nombre');?><span class="required">*</span>: </label>
                                    <div class="controls"><input id="Nombre" type="text" name="Nombre" value="<?php echo $result->Nombre ?>"  class="input-xlarge"  />
                                    <span class="help-inline"<?php echo form_error('Nombre','<div class="error">','</div>'); ?></span></div>
                                    </div>
                                    

                                    <div class="control-group"><label for="Caracteristica" class="control-label"><?php echo lang('Caracteristica');?><span class="required">*</span>: </label>
                                    <div class="controls"><input id="Caracteristica" type="text" name="Caracteristica" value="<?php echo $result->Caracteristica ?>"  class="input-xlarge"  />
                                    <span class="help-inline"<?php echo form_error('Caracteristica','<div class="error">','</div>'); ?></span></div>
                                    </div>
                                    

                                    <div class="control-group"><label for="Descripcion" class="control-label"><?php echo lang('Descripcion');?><span class="required">*</span>: </label>
                                    <div class="controls"><input id="Descripcion" type="text" name="Descripcion" value="<?php echo $result->Descripcion ?>"  class="input-xlarge"  />
                                    <span class="help-inline"<?php echo form_error('Descripcion','<div class="error">','</div>'); ?></span></div>
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
