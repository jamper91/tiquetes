<div class="eventTypes form">
<?php echo $this->Form->create('EventType'); ?>
	<fieldset>
		<legend><?php echo __('Add Event Type'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
