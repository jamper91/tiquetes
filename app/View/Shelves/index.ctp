<div class="shelves index">
	<h2><?php echo __('Shelves'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('location_id'); ?></th>
			<th><?php echo $this->Paginator->sort('esta_nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('esta_estado'); ?></th>
			<th><?php echo $this->Paginator->sort('esta_precio'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($shelves as $shelf): ?>
	<tr>
		<td><?php echo h($shelf['Shelf']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($shelf['Location']['id'], array('controller' => 'locations', 'action' => 'view', $shelf['Location']['id'])); ?>
		</td>
		<td><?php echo h($shelf['Shelf']['esta_nombre']); ?>&nbsp;</td>
		<td><?php echo h($shelf['Shelf']['esta_estado']); ?>&nbsp;</td>
		<td><?php echo h($shelf['Shelf']['esta_precio']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $shelf['Shelf']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $shelf['Shelf']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $shelf['Shelf']['id']), array(), __('Are you sure you want to delete # %s?', $shelf['Shelf']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Shelf'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Locations'), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('controller' => 'locations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Papers'), array('controller' => 'papers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paper'), array('controller' => 'papers', 'action' => 'add')); ?> </li>
	</ul>
</div>
