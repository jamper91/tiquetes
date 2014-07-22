<div class="eventsRegistrationTypes index">
	<h2><?php echo __('Events Registration Types'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('registration_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('event_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($eventsRegistrationTypes as $eventsRegistrationType): ?>
	<tr>
		<td><?php echo h($eventsRegistrationType['EventsRegistrationType']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($eventsRegistrationType['RegistrationType']['id'], array('controller' => 'registration_types', 'action' => 'view', $eventsRegistrationType['RegistrationType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($eventsRegistrationType['Event']['id'], array('controller' => 'events', 'action' => 'view', $eventsRegistrationType['Event']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $eventsRegistrationType['EventsRegistrationType']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $eventsRegistrationType['EventsRegistrationType']['id']), array(), __('Are you sure you want to delete # %s?', $eventsRegistrationType['EventsRegistrationType']['id'])); ?>
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