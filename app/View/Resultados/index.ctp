<div class="resultados index">
	<h2><?php echo __('Resultados'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('preguntas_eventos_id'); ?></th>
			<th><?php echo $this->Paginator->sort('person_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($resultados as $resultado): ?>
	<tr>
		<td><?php echo h($resultado['Resultado']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($resultado['PreguntasEventos']['id'], array('controller' => 'preguntas_eventos', 'action' => 'view', $resultado['PreguntasEventos']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($resultado['Person']['id'], array('controller' => 'people', 'action' => 'view', $resultado['Person']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $resultado['Resultado']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $resultado['Resultado']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $resultado['Resultado']['id']), array(), __('Are you sure you want to delete # %s?', $resultado['Resultado']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Resultado'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Preguntas Eventos'), array('controller' => 'preguntas_eventos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Preguntas Eventos'), array('controller' => 'preguntas_eventos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
</div>
