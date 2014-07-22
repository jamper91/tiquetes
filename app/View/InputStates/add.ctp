<div class="inputStates form">
<?php echo $this->Form->create('InputState'); ?>
	<fieldset>
		<legend><?php echo __('Add Input State'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

