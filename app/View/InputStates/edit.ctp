<div class="inputStates form">
<?php echo $this->Form->create('InputState'); ?>
	<fieldset>
		<legend><?php echo __('Edit Input State'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

