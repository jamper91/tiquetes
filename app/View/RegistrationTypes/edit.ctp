<div class="registrationTypes form">
<?php echo $this->Form->create('RegistrationType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Registration Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('Event');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
