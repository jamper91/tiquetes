<div class="datas index">
	<h2><?php echo __('Datas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('form_id'); ?></th>
			<th><?php echo $this->Paginator->sort('person_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($datas as $data): ?>
	<tr>
		<td><?php echo h($data['Data']['id']); ?>&nbsp;</td>
		<td><?php echo h($data['Data']['descripcion']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($data['Form']['id'], array('controller' => 'forms', 'action' => 'view', $data['Form']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($data['Person']['id'], array('controller' => 'people', 'action' => 'view', $data['Person']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $data['Data']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $data['Data']['id']), array(), __('Are you sure you want to delete # %s?', $data['Data']['id'])); ?>
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