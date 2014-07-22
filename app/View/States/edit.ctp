<div class="states form">
<?php echo $this->Form->create('State'); ?>
	<fieldset>
		<legend><?php echo __('Edit State'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('country_id');
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
