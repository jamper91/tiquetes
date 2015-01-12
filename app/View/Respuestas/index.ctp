<div class="respuestas index">
	<h2><?php echo __('Respuestas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('respuestas'); ?></th>
			<th><?php echo $this->Paginator->sort('pregunta_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($respuestas as $respuesta): ?>
	<tr>
		<td><?php echo h($respuesta['Respuesta']['id']); ?>&nbsp;</td>
		<td><?php echo h($respuesta['Respuesta']['respuestas']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($respuesta['Pregunta']['id'], array('controller' => 'preguntas', 'action' => 'view', $respuesta['Pregunta']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $respuesta['Respuesta']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $respuesta['Respuesta']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $respuesta['Respuesta']['id']), array(), __('Are you sure you want to delete # %s?', $respuesta['Respuesta']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Respuesta'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Preguntas'), array('controller' => 'preguntas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pregunta'), array('controller' => 'preguntas', 'action' => 'add')); ?> </li>
	</ul>
</div>
