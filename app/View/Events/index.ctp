<div class="events index">
	<h2><?php echo __('Events'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('stage_id'); ?></th>
			<th><?php echo $this->Paginator->sort('event_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('even_nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('even_numeResolucion'); ?></th>
			<th><?php echo $this->Paginator->sort('even_palaClave'); ?></th>
			<th><?php echo $this->Paginator->sort('even_observaciones'); ?></th>
			<th><?php echo $this->Paginator->sort('even_estado'); ?></th>
			<th><?php echo $this->Paginator->sort('even_imagen1'); ?></th>
			<th><?php echo $this->Paginator->sort('even_imagen2'); ?></th>
			<th><?php echo $this->Paginator->sort('even_fechInicio'); ?></th>
			<th><?php echo $this->Paginator->sort('even_fechFinal'); ?></th>
			<th><?php echo $this->Paginator->sort('even_publicar'); ?></th>
			<th><?php echo $this->Paginator->sort('even_codigo'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($events as $event): ?>
	<tr>
		<td><?php echo h($event['Event']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($event['Stage']['id'], array('controller' => 'stages', 'action' => 'view', $event['Stage']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($event['EventType']['id'], array('controller' => 'event_types', 'action' => 'view', $event['EventType']['id'])); ?>
		</td>
		<td><?php echo h($event['Event']['even_nombre']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['even_numeResolucion']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['even_palaClave']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['even_observaciones']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['even_estado']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['even_imagen1']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['even_imagen2']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['even_fechInicio']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['even_fechFinal']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['even_publicar']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['even_codigo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $event['Event']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $event['Event']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $event['Event']['id']), array(), __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Event'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Stages'), array('controller' => 'stages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stage'), array('controller' => 'stages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Event Types'), array('controller' => 'event_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event Type'), array('controller' => 'event_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Forms'), array('controller' => 'forms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form'), array('controller' => 'forms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Papers'), array('controller' => 'papers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paper'), array('controller' => 'papers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Committees'), array('controller' => 'committees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Committee'), array('controller' => 'committees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels'), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel'), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payments'), array('controller' => 'payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment'), array('controller' => 'payments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Registration Types'), array('controller' => 'registration_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Registration Type'), array('controller' => 'registration_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
