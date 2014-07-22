<div class="entradas form">
<?php echo $this->Form->create('Entrada'); ?>
	<fieldset>
		<legend><?php echo __('Edit Entrada'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('paper_id');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('category_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

