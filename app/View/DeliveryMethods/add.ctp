<div class="deliveryMethods form">
<?php echo $this->Form->create('DeliveryMethod'); ?>
	<fieldset>
		<legend><?php echo __('Add Delivery Method'); ?></legend>
	<?php
		echo $this->Form->input('descripcion');
		echo $this->Form->input('Input');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
