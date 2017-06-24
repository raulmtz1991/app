<?php     
$attributes = array('class'=>'well form-horizontal');
echo form_open(current_url(),$attributes); ?>
<fieldset>
    <div class="alert alert-error">
        <?php echo $custom_error; ?>
    </div>       
<?php echo form_hidden('idConsultorio',$result->idConsultorio) ?>

                                    <div class="control-group"><label for="Nombre" class="control-label"><?php echo lang('Nombre');?><span class="required">*</span>: </label>
                                    <div class="controls"><input id="Nombre" type="text" name="Nombre" value="<?php echo $result->Nombre ?>"  class="input-xlarge"  />
                                    <span class="help-inline"<?php echo form_error('Nombre','<div class="error">','</div>'); ?></span></div>
                                    </div>
                                    

                                    <div class="control-group"><label for="Calle" class="control-label"><?php echo lang('Calle');?><span class="required">*</span>: </label>
                                    <div class="controls"><input id="Calle" type="text" name="Calle" value="<?php echo $result->Calle ?>"  class="input-xlarge"  />
                                    <span class="help-inline"<?php echo form_error('Calle','<div class="error">','</div>'); ?></span></div>
                                    </div>
                                    

                                    <div class="control-group"><label for="Ni" class="control-label"><?php echo lang('Ni');?><span class="required">*</span>: </label>
                                    <div class="controls"><input id="Ni" type="text" name="Ni" value="<?php echo $result->Ni ?>"  class="input-xlarge"  />
                                    <span class="help-inline"<?php echo form_error('Ni','<div class="error">','</div>'); ?></span></div>
                                    </div>
                                    

                                    <div class="control-group"><label for="Ne" class="control-label"><?php echo lang('Ne');?><span class="required">*</span>: </label>
                                    <div class="controls"><input id="Ne" type="text" name="Ne" value="<?php echo $result->Ne ?>"  class="input-xlarge"  />
                                    <span class="help-inline"<?php echo form_error('Ne','<div class="error">','</div>'); ?></span></div>
                                    </div>
                                    

                                    <div class="control-group"><label for="id_cd" class="control-label"><?php echo lang('id_cd');?><span class="required">*</span>: </label>
                                    <div class="controls"><input id="id_cd" type="text" name="id_cd" value="<?php echo $result->id_cd ?>"  class="input-xlarge"  />
                                    <span class="help-inline"<?php echo form_error('id_cd','<div class="error">','</div>'); ?></span></div>
                                    </div>
                                    

                                    <div class="control-group"><label for="Telefono" class="control-label"><?php echo lang('Telefono');?><span class="required">*</span>: </label>
                                    <div class="controls"><input id="Telefono" type="text" name="Telefono" value="<?php echo $result->Telefono ?>"  class="input-xlarge"  />
                                    <span class="help-inline"<?php echo form_error('Telefono','<div class="error">','</div>'); ?></span></div>
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
