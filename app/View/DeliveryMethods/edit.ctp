<div class="deliveryMethods form">
<?php echo $this->Form->create('DeliveryMethod'); ?>
	<fieldset>
		<legend><?php echo __('Edit Delivery Method'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('Input');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
