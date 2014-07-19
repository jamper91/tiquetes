<div class="papers index">
	<h2><?php echo __('Papers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('event_id'); ?></th>
			<th><?php echo $this->Paginator->sort('shelf_id'); ?></th>
			<th><?php echo $this->Paginator->sort('func_nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('func_fechInicio'); ?></th>
			<th><?php echo $this->Paginator->sort('func_fechFinal'); ?></th>
			<th><?php echo $this->Paginator->sort('func_cortesia'); ?></th>
			<th><?php echo $this->Paginator->sort('func_estado'); ?></th>
			<th><?php echo $this->Paginator->sort('func_imagen'); ?></th>
			<th><?php echo $this->Paginator->sort('func_palaClaves'); ?></th>
			<th><?php echo $this->Paginator->sort('func_cantEntradas'); ?></th>
			<th><?php echo $this->Paginator->sort('func_cantAlerta'); ?></th>
			<th><?php echo $this->Paginator->sort('func_codigo'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($papers as $paper): ?>
	<tr>
		<td><?php echo h($paper['Paper']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($paper['Event']['id'], array('controller' => 'events', 'action' => 'view', $paper['Event']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($paper['Shelf']['id'], array('controller' => 'shelves', 'action' => 'view', $paper['Shelf']['id'])); ?>
		</td>
		<td><?php echo h($paper['Paper']['func_nombre']); ?>&nbsp;</td>
		<td><?php echo h($paper['Paper']['func_fechInicio']); ?>&nbsp;</td>
		<td><?php echo h($paper['Paper']['func_fechFinal']); ?>&nbsp;</td>
		<td><?php echo h($paper['Paper']['func_cortesia']); ?>&nbsp;</td>
		<td><?php echo h($paper['Paper']['func_estado']); ?>&nbsp;</td>
		<td><?php echo h($paper['Paper']['func_imagen']); ?>&nbsp;</td>
		<td><?php echo h($paper['Paper']['func_palaClaves']); ?>&nbsp;</td>
		<td><?php echo h($paper['Paper']['func_cantEntradas']); ?>&nbsp;</td>
		<td><?php echo h($paper['Paper']['func_cantAlerta']); ?>&nbsp;</td>
		<td><?php echo h($paper['Paper']['func_codigo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $paper['Paper']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $paper['Paper']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $paper['Paper']['id']), array(), __('Are you sure you want to delete # %s?', $paper['Paper']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Paper'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shelves'), array('controller' => 'shelves', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shelf'), array('controller' => 'shelves', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas'), array('controller' => 'entradas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entrada'), array('controller' => 'entradas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Paper Inputs'), array('controller' => 'paper_inputs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paper Input'), array('controller' => 'paper_inputs', 'action' => 'add')); ?> </li>
	</ul>
</div>
