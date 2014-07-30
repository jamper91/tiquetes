<div class="validations form">
<?php echo $this->Form->create('Validation'); ?>
	<fieldset>
		<legend><?php echo __('Add Validation'); ?></legend>
	<?php
		echo $this->Form->input('descripcion');
		echo $this->Form->input('fechainicio');
		echo $this->Form->input('fechafin');
		echo $this->Form->input('cantidad_reingresos');
		echo $this->Form->input('categoria',array(
                    "style"=>array(
                        "display:none"
                    )
                ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
