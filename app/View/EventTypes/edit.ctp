<div class="eventTypes form">
<?php echo $this->Form->create('EventType'); ?>
	<fieldset>
		<legend><?php echo __('Editar tipo de evento'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Actualizar')); ?>
</div>
