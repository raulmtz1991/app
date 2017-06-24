<?php     
$attributes = array('class' => 'well form-horizontal');
echo form_open(current_url(),$attributes); ?>
<fieldset>
    <div class="alert alert-error">
<?php echo $custom_error; ?>
    </div>

                                    <div class="control-group"><label for="nombre" class="control-label"><?php echo lang('nombre');?><span class="required">*</span>: </label>
                                    <div class="controls"><input id="nombre" type="text" name="nombre" value="<?php echo set_value('nombre'); ?>"  class="input-xlarge"  />
                                    <span class="help-inline"<?php echo form_error('nombre','<div class="error">','</div>'); ?></span></div>
                                    </div>
                                    

                                    <div class="control-group"><label for="descripcion" class="control-label"><?php echo lang('descripcion');?><span class="required">*</span>: </label>
                                    <div class="controls"><textarea id="descripcion" name="descripcion" class="input-xlarge" row="3"><?php echo set_value('descripcion'); ?></textarea>
                                    <span class="help-inline"><?php echo form_error('descripcion','<div class="error">','</div>'); ?></span></div>
                                    </div>
                                    

                                    <div class="control-group"><label for="foto" class="control-label"><?php echo lang('foto');?><span class="required">*</span>: </label>
                                    <div class="controls"><input id="foto" type="text" name="foto" value="<?php echo set_value('foto'); ?>"  class="input-xlarge"  />
                                    <span class="help-inline"<?php echo form_error('foto','<div class="error">','</div>'); ?></span></div>
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
