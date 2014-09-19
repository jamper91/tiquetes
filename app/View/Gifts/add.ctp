<div class="gifts form">
<?php echo $this->Form->create('Gift'); ?>
	<fieldset>
		<legend><?php echo __('Crear Consumible'); ?></legend>
	<?php
		echo $this->Form->input('descripcion', array("label"=>"Descripcion"));		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Registrar')); ?>
</div>

