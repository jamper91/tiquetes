<div class="eventsHotels form">
<?php echo $this->Form->create('EventsHotel'); ?>
	<fieldset>
		<legend><?php echo __('Edit Events Hotel'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('event_id');
		echo $this->Form->input('hotel_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EventsHotel.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('EventsHotel.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Events Hotels'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels'), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel'), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
	</ul>
</div>
