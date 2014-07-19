<div class="deliveryMethodsInputs view">
<h2><?php echo __('Delivery Methods Input'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($deliveryMethodsInput['DeliveryMethodsInput']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Delivery Method'); ?></dt>
		<dd>
			<?php echo $this->Html->link($deliveryMethodsInput['DeliveryMethod']['id'], array('controller' => 'delivery_methods', 'action' => 'view', $deliveryMethodsInput['DeliveryMethod']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Input'); ?></dt>
		<dd>
			<?php echo $this->Html->link($deliveryMethodsInput['Input']['id'], array('controller' => 'inputs', 'action' => 'view', $deliveryMethodsInput['Input']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Delivery Methods Input'), array('action' => 'edit', $deliveryMethodsInput['DeliveryMethodsInput']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Delivery Methods Input'), array('action' => 'delete', $deliveryMethodsInput['DeliveryMethodsInput']['id']), array(), __('Are you sure you want to delete # %s?', $deliveryMethodsInput['DeliveryMethodsInput']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Delivery Methods Inputs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Delivery Methods Input'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Delivery Methods'), array('controller' => 'delivery_methods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Delivery Method'), array('controller' => 'delivery_methods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inputs'), array('controller' => 'inputs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Input'), array('controller' => 'inputs', 'action' => 'add')); ?> </li>
	</ul>
</div>
