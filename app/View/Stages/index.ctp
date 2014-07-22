<div class="stages index">
	<h2><?php echo __('Stages'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('city_id'); ?></th>
			<th><?php echo $this->Paginator->sort('esce_nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('esce_direccion'); ?></th>
			<th><?php echo $this->Paginator->sort('esce_telefono'); ?></th>
			<th><?php echo $this->Paginator->sort('esce_mapa'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($stages as $stage): ?>
	<tr>
		<td><?php echo h($stage['Stage']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($stage['City']['id'], array('controller' => 'cities', 'action' => 'view', $stage['City']['id'])); ?>
		</td>
		<td><?php echo h($stage['Stage']['esce_nombre']); ?>&nbsp;</td>
		<td><?php echo h($stage['Stage']['esce_direccion']); ?>&nbsp;</td>
		<td><?php echo h($stage['Stage']['esce_telefono']); ?>&nbsp;</td>
		<td><?php echo h($stage['Stage']['esce_mapa']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $stage['Stage']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $stage['Stage']['id']), array(), __('Are you sure you want to delete # %s?', $stage['Stage']['id'])); ?>
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
