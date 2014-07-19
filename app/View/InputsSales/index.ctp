<div class="inputsSales index">
	<h2><?php echo __('Inputs Sales'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('input_id'); ?></th>
			<th><?php echo $this->Paginator->sort('sale_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($inputsSales as $inputsSale): ?>
	<tr>
		<td><?php echo h($inputsSale['InputsSale']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($inputsSale['Input']['id'], array('controller' => 'inputs', 'action' => 'view', $inputsSale['Input']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($inputsSale['Sale']['sale_id'], array('controller' => 'sales', 'action' => 'view', $inputsSale['Sale']['sale_id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $inputsSale['InputsSale']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $inputsSale['InputsSale']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $inputsSale['InputsSale']['id']), array(), __('Are you sure you want to delete # %s?', $inputsSale['InputsSale']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Inputs Sale'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Inputs'), array('controller' => 'inputs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Input'), array('controller' => 'inputs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sales'), array('controller' => 'sales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sale'), array('controller' => 'sales', 'action' => 'add')); ?> </li>
	</ul>
</div>
