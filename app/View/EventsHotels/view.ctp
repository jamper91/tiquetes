<div class="eventsHotels view">
<h2><?php echo __('Events Hotel'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($eventsHotel['EventsHotel']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($eventsHotel['Event']['id'], array('controller' => 'events', 'action' => 'view', $eventsHotel['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hotel'); ?></dt>
		<dd>
			<?php echo $this->Html->link($eventsHotel['Hotel']['id'], array('controller' => 'hotels', 'action' => 'view', $eventsHotel['Hotel']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Events Hotel'), array('action' => 'edit', $eventsHotel['EventsHotel']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Events Hotel'), array('action' => 'delete', $eventsHotel['EventsHotel']['id']), array(), __('Are you sure you want to delete # %s?', $eventsHotel['EventsHotel']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Events Hotels'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Events Hotel'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels'), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel'), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
	</ul>
</div>
