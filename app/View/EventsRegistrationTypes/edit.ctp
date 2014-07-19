<div class="eventsRegistrationTypes form">
<?php echo $this->Form->create('EventsRegistrationType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Events Registration Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('registration_type_id');
		echo $this->Form->input('event_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EventsRegistrationType.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('EventsRegistrationType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Events Registration Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Registration Types'), array('controller' => 'registration_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Registration Type'), array('controller' => 'registration_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inputs'), array('controller' => 'inputs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Input'), array('controller' => 'inputs', 'action' => 'add')); ?> </li>
	</ul>
</div>
