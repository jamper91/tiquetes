<?php
echo $this->Html->script(array('matrix.tables'));
?>
<div class="activities index" table-bordered table condensed  stages index align="center">
	<h2><?php echo __('Actividades'); ?></h2>
	<table class="table table-bordered data-table">
	<thead>
	<tr>
			<!--<th><?php echo $this->Paginator->sort('id'); ?></th>-->
			<th><?php echo $this->Paginator->sort('event_id', 'Evento'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre', 'Actividad'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion', 'Descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('lugar', 'salón'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha', 'Fecha'); ?></th>
			<th><?php echo $this->Paginator->sort('hora_inicio', 'Inicio'); ?></th>
			<th><?php echo $this->Paginator->sort('hora_fin', 'Fin'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('costo'); ?></th>-->
			<th><?php echo $this->Paginator->sort('aforo', 'Aforo'); ?></th>
			<th><?php echo $this->Paginator->sort('alerta_aforo', 'Alerta'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('control_aforo'); ?></th>-->
			<th class="actions"><?php echo __('Opciones'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($activities as $activity): ?>
	<tr>
		<!--<td><?php echo h($activity['Activity']['id']); ?>&nbsp;</td>-->
		<td>
			<?php echo $this->Html->link($activity['Event']['even_nombre'], array('controller' => 'events', 'action' => 'view', $activity['Event']['id'])); ?>
		</td>
		<td><?php echo h($activity['Activity']['nombre']); ?>&nbsp;</td>
		<td>
			<?php echo h($activity['Activity']['descripcion']); ?>
		</td>
		<td><?php echo h($activity['Activity']['locacion']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['fecha']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['hora_inicio']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['hora_fin']); ?>&nbsp;</td>
		<!--<td><?php echo h($activity['Activity']['observaciones']); ?>&nbsp;</td>-->
		<td><?php echo h($activity['Activity']['aforo']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['alerta_aforo']); ?>&nbsp;</td>
		<!--<td><?php echo h($activity['Activity']['control_aforo']); ?>&nbsp;</td>-->
		<td class="actions">			
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $activity['Activity']['id']),array('class' => 'btn btn-warning btn-mini')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $activity['Activity']['id']), array('class' => 'btn btn-danger btn-mini'), __('Seguro que desea eliminar la actividad  # %s?', $activity['Activity']['nombre'])); ?>
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
