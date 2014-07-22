<div class="eventsHotels index">
	<h2><?php echo __('Events Hotels'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('event_id'); ?></th>
			<th><?php echo $this->Paginator->sort('hotel_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($eventsHotels as $eventsHotel): ?>
	<tr>
		<td><?php echo h($eventsHotel['EventsHotel']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($eventsHotel['Event']['id'], array('controller' => 'events', 'action' => 'view', $eventsHotel['Event']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($eventsHotel['Hotel']['id'], array('controller' => 'hotels', 'action' => 'view', $eventsHotel['Hotel']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $eventsHotel['EventsHotel']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $eventsHotel['EventsHotel']['id']), array(), __('Are you sure you want to delete # %s?', $eventsHotel['EventsHotel']['id'])); ?>
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