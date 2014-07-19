<div class="inputsSales form">
<?php echo $this->Form->create('InputsSale'); ?>
	<fieldset>
		<legend><?php echo __('Edit Inputs Sale'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('input_id');
		echo $this->Form->input('sale_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('InputsSale.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('InputsSale.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Inputs Sales'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Inputs'), array('controller' => 'inputs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Input'), array('controller' => 'inputs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sales'), array('controller' => 'sales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sale'), array('controller' => 'sales', 'action' => 'add')); ?> </li>
	</ul>
</div>
