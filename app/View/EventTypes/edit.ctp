<div class="eventTypes form">
<?php echo $this->Form->create('EventType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Event Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
