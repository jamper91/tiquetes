<div class="entradasTorniquetes index">
	<h2><?php echo __('Entradas Torniquetes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('entrada_id'); ?></th>
			<th><?php echo $this->Paginator->sort('torniquete_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($entradasTorniquetes as $entradasTorniquete): ?>
	<tr>
		<td><?php echo h($entradasTorniquete['EntradasTorniquete']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($entradasTorniquete['Entrada']['id'], array('controller' => 'entradas', 'action' => 'view', $entradasTorniquete['Entrada']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($entradasTorniquete['Torniquete']['name'], array('controller' => 'torniquetes', 'action' => 'view', $entradasTorniquete['Torniquete']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $entradasTorniquete['EntradasTorniquete']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $entradasTorniquete['EntradasTorniquete']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $entradasTorniquete['EntradasTorniquete']['id']), array(), __('Are you sure you want to delete # %s?', $entradasTorniquete['EntradasTorniquete']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Entradas Torniquete'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Entradas'), array('controller' => 'entradas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entrada'), array('controller' => 'entradas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Torniquetes'), array('controller' => 'torniquetes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Torniquete'), array('controller' => 'torniquetes', 'action' => 'add')); ?> </li>
	</ul>
</div>
