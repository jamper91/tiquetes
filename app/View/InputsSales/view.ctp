<div class="inputsSales view">
<h2><?php echo __('Inputs Sale'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($inputsSale['InputsSale']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Input'); ?></dt>
		<dd>
			<?php echo $this->Html->link($inputsSale['Input']['id'], array('controller' => 'inputs', 'action' => 'view', $inputsSale['Input']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sale'); ?></dt>
		<dd>
			<?php echo $this->Html->link($inputsSale['Sale']['sale_id'], array('controller' => 'sales', 'action' => 'view', $inputsSale['Sale']['sale_id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Inputs Sale'), array('action' => 'edit', $inputsSale['InputsSale']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Inputs Sale'), array('action' => 'delete', $inputsSale['InputsSale']['id']), array(), __('Are you sure you want to delete # %s?', $inputsSale['InputsSale']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Inputs Sales'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inputs Sale'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inputs'), array('controller' => 'inputs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Input'), array('controller' => 'inputs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sales'), array('controller' => 'sales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sale'), array('controller' => 'sales', 'action' => 'add')); ?> </li>
	</ul>
</div>
