<div class="typeUsers form">
<?php echo $this->Form->create('TypeUser'); ?>
	<fieldset>
		<legend><?php echo __('Crear Tio de Usuario'); ?></legend>
	<?php
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Agregar')); ?>
</div>
