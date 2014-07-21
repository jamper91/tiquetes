<div class="cities form">
<?php echo $this->Form->create('City'); ?>
	<fieldset>
		<legend><?php echo __('Edit City'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('department_id');
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
