<div class="eventsPayments index">
	<h2><?php echo __('Events Payments'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('payment_id'); ?></th>
			<th><?php echo $this->Paginator->sort('event_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($eventsPayments as $eventsPayment): ?>
	<tr>
		<td><?php echo h($eventsPayment['EventsPayment']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($eventsPayment['Payment']['id'], array('controller' => 'payments', 'action' => 'view', $eventsPayment['Payment']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($eventsPayment['Event']['id'], array('controller' => 'events', 'action' => 'view', $eventsPayment['Event']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $eventsPayment['EventsPayment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $eventsPayment['EventsPayment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $eventsPayment['EventsPayment']['id']), array(), __('Are you sure you want to delete # %s?', $eventsPayment['EventsPayment']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Events Payment'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Payments'), array('controller' => 'payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment'), array('controller' => 'payments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
