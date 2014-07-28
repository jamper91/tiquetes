<div class="entradasInputs index">
	<h2><?php echo __('Entradas Inputs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('entrada_id'); ?></th>
			<th><?php echo $this->Paginator->sort('input_id'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha'); ?></th>
			<th><?php echo $this->Paginator->sort('ingresos'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($entradasInputs as $entradasInput): ?>
	<tr>
		<td><?php echo h($entradasInput['EntradasInput']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($entradasInput['Entrada']['id'], array('controller' => 'entradas', 'action' => 'view', $entradasInput['Entrada']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($entradasInput['Input']['id'], array('controller' => 'inputs', 'action' => 'view', $entradasInput['Input']['id'])); ?>
		</td>
		<td><?php echo h($entradasInput['EntradasInput']['fecha']); ?>&nbsp;</td>
		<td><?php echo h($entradasInput['EntradasInput']['ingresos']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $entradasInput['EntradasInput']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $entradasInput['EntradasInput']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $entradasInput['EntradasInput']['id']), array(), __('Are you sure you want to delete # %s?', $entradasInput['EntradasInput']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Entradas Input'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Entradas'), array('controller' => 'entradas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entrada'), array('controller' => 'entradas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inputs'), array('controller' => 'inputs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Input'), array('controller' => 'inputs', 'action' => 'add')); ?> </li>
	</ul>
</div>
