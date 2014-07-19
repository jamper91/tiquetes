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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('DeliveryMethodsInput.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('DeliveryMethodsInput.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Delivery Methods Inputs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Delivery Methods'), array('controller' => 'delivery_methods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Delivery Method'), array('controller' => 'delivery_methods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inputs'), array('controller' => 'inputs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Input'), array('controller' => 'inputs', 'action' => 'add')); ?> </li>
	</ul>
</div>
