<div class="gifts index">
	<h2><?php echo __('Gifts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($gifts as $gift): ?>
	<tr>
		<td><?php echo h($gift['Gift']['id']); ?>&nbsp;</td>
		<td><?php echo h($gift['Gift']['descripcion']); ?>&nbsp;</td>		
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $gift['Gift']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $gift['Gift']['id']), array(), __('Are you sure you want to delete # %s?', $gift['Gift']['id'])); ?>
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