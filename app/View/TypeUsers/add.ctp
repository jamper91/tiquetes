<div class="typeUsers form">
<?php echo $this->Form->create('TypeUser'); ?>
	<fieldset>
		<legend><?php echo __('Add Type User'); ?></legend>
	<?php
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
