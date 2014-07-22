<div class="sales index">
	<h2><?php echo __('Sales'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('sale_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cantidad'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo_de_pago'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($sales as $sale): ?>
	<tr>
		<td><?php echo h($sale['Sale']['sale_id']); ?>&nbsp;</td>
		<td><?php echo h($sale['Sale']['cantidad']); ?>&nbsp;</td>
		<td><?php echo h($sale['Sale']['tipo_de_pago']); ?>&nbsp;</td>
		<td><?php echo h($sale['Sale']['fecha']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sale['Sale']['sale_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sale['Sale']['sale_id']), array(), __('Are you sure you want to delete # %s?', $sale['Sale']['sale_id'])); ?>
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