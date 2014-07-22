<div class="locations form">
<?php echo $this->Form->create('Location'); ?>
	<fieldset>
		<legend><?php echo __('Edit Location'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('loca_nombre');
		echo $this->Form->input('stage_id');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('loca_fila');
		echo $this->Form->input('loca_colomnna');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

