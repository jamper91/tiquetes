<div class="entradas index">
	<h2><?php echo __('Entradas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('paper_id'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($entradas as $entrada): ?>
	<tr>
		<td><?php echo h($entrada['Entrada']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($entrada['Paper']['id'], array('controller' => 'papers', 'action' => 'view', $entrada['Paper']['id'])); ?>
		</td>
		<td><?php echo h($entrada['Entrada']['descripcion']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($entrada['Category']['id'], array('controller' => 'categories', 'action' => 'view', $entrada['Category']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $entrada['Entrada']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $entrada['Entrada']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $entrada['Entrada']['id']), array(), __('Are you sure you want to delete # %s?', $entrada['Entrada']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Entrada'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Papers'), array('controller' => 'papers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paper'), array('controller' => 'papers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
