<div class="datas form">
<?php echo $this->Form->create('Data'); ?>
	<fieldset>
		<legend><?php echo __('Add Data'); ?></legend>
	<?php
		echo $this->Form->input('descripcion');
		echo $this->Form->input('form_id');
		echo $this->Form->input('person_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

