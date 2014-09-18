<div class="giftsEvents index">
	<h2><?php echo __('Gifts Events'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('gift_id'); ?></th>
			<th><?php echo $this->Paginator->sort('event_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cantidad'); ?></th>
			<th><?php echo $this->Paginator->sort('control'); ?></th>
			<th><?php echo $this->Paginator->sort('categoria_id'); ?></th>
			<th><?php echo $this->Paginator->sort('people_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($giftsEvents as $giftsEvent): ?>
	<tr>
		<td><?php echo h($giftsEvent['GiftsEvent']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($giftsEvent['Gift']['id'], array('controller' => 'gifts', 'action' => 'view', $giftsEvent['Gift']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($giftsEvent['Event']['id'], array('controller' => 'events', 'action' => 'view', $giftsEvent['Event']['id'])); ?>
		</td>
		<td><?php echo h($giftsEvent['GiftsEvent']['cantidad']); ?>&nbsp;</td>
		<td><?php echo h($giftsEvent['GiftsEvent']['control']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($giftsEvent['Categoria']['id'], array('controller' => 'categorias', 'action' => 'view', $giftsEvent['Categoria']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($giftsEvent['People']['id'], array('controller' => 'people', 'action' => 'view', $giftsEvent['People']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $giftsEvent['GiftsEvent']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $giftsEvent['GiftsEvent']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $giftsEvent['GiftsEvent']['id']), array(), __('Are you sure you want to delete # %s?', $giftsEvent['GiftsEvent']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Gifts Event'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Gifts'), array('controller' => 'gifts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gift'), array('controller' => 'gifts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New People'), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
</div>
