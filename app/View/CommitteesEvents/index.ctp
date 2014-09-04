<div class="committeesEvents index">
	<h2><?php echo __('Committees Events'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('committee_id','comite'); ?></th>
			<th><?php echo $this->Paginator->sort('event_id','evento'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($committeesEvents as $committeesEvent): ?>
	<tr>
		<td><?php echo h($committeesEvent['CommitteesEvent']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($committeesEvent['Committee']['nombre'], array('controller' => 'committees', 'action' => 'view', $committeesEvent['Committee']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($committeesEvent['Event']['even_nombre'], array('controller' => 'events', 'action' => 'view', $committeesEvent['Event']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $committeesEvent['CommitteesEvent']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $committeesEvent['CommitteesEvent']['id']), array(), __('Are you sure you want to delete # %s?', $committeesEvent['CommitteesEvent']['id'])); ?>
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
