<div class="paperInputs index">
	<h2><?php echo __('Paper Inputs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('paper_id'); ?></th>
			<th><?php echo $this->Paginator->sort('input_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($paperInputs as $paperInput): ?>
	<tr>
		<td><?php echo h($paperInput['PaperInput']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($paperInput['Paper']['id'], array('controller' => 'papers', 'action' => 'view', $paperInput['Paper']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($paperInput['Input']['id'], array('controller' => 'inputs', 'action' => 'view', $paperInput['Input']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $paperInput['PaperInput']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $paperInput['PaperInput']['id']), array(), __('Are you sure you want to delete # %s?', $paperInput['PaperInput']['id'])); ?>
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