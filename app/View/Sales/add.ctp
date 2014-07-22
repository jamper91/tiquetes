<div class="sales form">
<?php echo $this->Form->create('Sale'); ?>
	<fieldset>
		<legend><?php echo __('Add Sale'); ?></legend>
	<?php
		echo $this->Form->input('cantidad');
		echo $this->Form->input('tipo_de_pago');
		echo $this->Form->input('fecha');
		echo $this->Form->input('Input');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>