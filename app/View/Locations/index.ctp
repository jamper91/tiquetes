<div class="locations index">
	<h2><?php echo __('Localidades'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?>&nbsp;&nbsp;&nbsp;</th>
			<th><?php echo $this->Paginator->sort('loca_nombre','nombre'); ?>&nbsp;&nbsp;&nbsp;</th>
			<th><?php echo $this->Paginator->sort('stage_id','escenario'); ?>&nbsp;&nbsp;&nbsp;</th>
			<th><?php echo $this->Paginator->sort('parent_id','localidad padre'); ?>&nbsp;&nbsp;&nbsp;</th>
			<th><?php echo $this->Paginator->sort('loca_fila', 'numero de filas'); ?>&nbsp;&nbsp;&nbsp;</th>
			<th><?php echo $this->Paginator->sort('loca_colomnna','numero de columnas'); ?>&nbsp;&nbsp;&nbsp;</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($locations as $location): ?>
	<tr>
		<td><?php echo h($location['Location']['id']); ?>&nbsp;</td>
		<td><?php echo h($location['Location']['loca_nombre']); ?>&nbsp;</td>
		<td>
			<?php echo h($location['Stage']['esce_nombre']); ?>
		</td>
		<td>
			<?php echo h($location['ParentLocation']['loca_nombre']); ?>
		</td>
		<td><?php echo h($location['Location']['loca_fila']); ?>&nbsp;</td>
		<td><?php echo h($location['Location']['loca_colomnna']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $location['Location']['id']), array('class' => 'btn btn-warning btn-mini')); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $location['Location']['id']), array('class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $location['Location']['id'])); ?>
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