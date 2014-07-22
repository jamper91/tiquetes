<div class="committees form">
<?php echo $this->Form->create('Committee'); ?>
	<fieldset>
		<legend><?php echo __('Edit Committee'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('Event');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>