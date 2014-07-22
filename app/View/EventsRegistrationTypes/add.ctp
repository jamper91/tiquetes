<div class="eventsRegistrationTypes form">
<?php echo $this->Form->create('EventsRegistrationType'); ?>
	<fieldset>
		<legend><?php echo __('Add Events Registration Type'); ?></legend>
	<?php
		echo $this->Form->input('registration_type_id');
		echo $this->Form->input('event_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

