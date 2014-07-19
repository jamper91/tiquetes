<div class="eventsPayments view">
<h2><?php echo __('Events Payment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($eventsPayment['EventsPayment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payment'); ?></dt>
		<dd>
			<?php echo $this->Html->link($eventsPayment['Payment']['id'], array('controller' => 'payments', 'action' => 'view', $eventsPayment['Payment']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($eventsPayment['Event']['id'], array('controller' => 'events', 'action' => 'view', $eventsPayment['Event']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Events Payment'), array('action' => 'edit', $eventsPayment['EventsPayment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Events Payment'), array('action' => 'delete', $eventsPayment['EventsPayment']['id']), array(), __('Are you sure you want to delete # %s?', $eventsPayment['EventsPayment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Events Payments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Events Payment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payments'), array('controller' => 'payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment'), array('controller' => 'payments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
