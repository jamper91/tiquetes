<div class="deliveryMethodsInputs form">
<?php echo $this->Form->create('DeliveryMethodsInput'); ?>
	<fieldset>
		<legend><?php echo __('Edit Delivery Methods Input'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('delivery_method_id');
		echo $this->Form->input('input_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

