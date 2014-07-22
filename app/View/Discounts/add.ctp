<div class="discounts form">
<?php echo $this->Form->create('Discount'); ?>
	<fieldset>
		<legend><?php echo __('Add Discount'); ?></legend>
	<?php
		echo $this->Form->input('porcentaje');
		echo $this->Form->input('fecha_inicio');
		echo $this->Form->input('fecha_fin');
		echo $this->Form->input('categoria');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

