<div class="committeesEventsPeople index">
	<h2><?php echo __('Committees Events People'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('person_id'); ?></th>
			<th><?php echo $this->Paginator->sort('committees_event_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($committeesEventsPeople as $committeesEventsPerson): ?>
	<tr>
		<td><?php echo h($committeesEventsPerson['CommitteesEventsPerson']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($committeesEventsPerson['Person']['id'], array('controller' => 'people', 'action' => 'view', $committeesEventsPerson['Person']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($committeesEventsPerson['CommitteesEvent']['id'], array('controller' => 'committees_events', 'action' => 'view', $committeesEventsPerson['CommitteesEvent']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $committeesEventsPerson['CommitteesEventsPerson']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $committeesEventsPerson['CommitteesEventsPerson']['id']), array(), __('Are you sure you want to delete # %s?', $committeesEventsPerson['CommitteesEventsPerson']['id'])); ?>
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