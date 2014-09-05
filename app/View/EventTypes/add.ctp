<div class="eventTypes form">
<?php echo $this->Form->create('EventType'); ?>
	<fieldset>
		<legend><?php echo __('Agregar tipos de evento'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Agregar')); ?>
</div>
