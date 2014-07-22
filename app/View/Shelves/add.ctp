<div class="shelves form">
<?php echo $this->Form->create('Shelf'); ?>
	<fieldset>
		<legend><?php echo __('Add Shelf'); ?></legend>
	<?php
		echo $this->Form->input('location_id');
		echo $this->Form->input('esta_nombre');
		echo $this->Form->input('esta_estado');
		echo $this->Form->input('esta_precio');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
