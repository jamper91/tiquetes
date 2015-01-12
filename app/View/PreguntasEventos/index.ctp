<div class="preguntasEventos index">
	<h2><?php echo __('Preguntas Eventos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('pregunta_id'); ?></th>
			<th><?php echo $this->Paginator->sort('event_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($preguntasEventos as $preguntasEvento): ?>
	<tr>
		<td><?php echo h($preguntasEvento['PreguntasEvento']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($preguntasEvento['Pregunta']['id'], array('controller' => 'preguntas', 'action' => 'view', $preguntasEvento['Pregunta']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($preguntasEvento['Event']['id'], array('controller' => 'events', 'action' => 'view', $preguntasEvento['Event']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $preguntasEvento['PreguntasEvento']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $preguntasEvento['PreguntasEvento']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $preguntasEvento['PreguntasEvento']['id']), array(), __('Are you sure you want to delete # %s?', $preguntasEvento['PreguntasEvento']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Preguntas Evento'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Preguntas'), array('controller' => 'preguntas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pregunta'), array('controller' => 'preguntas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
