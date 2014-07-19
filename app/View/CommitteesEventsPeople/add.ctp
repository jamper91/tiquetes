<div class="committeesEventsPeople form">
<?php echo $this->Form->create('CommitteesEventsPerson'); ?>
	<fieldset>
		<legend><?php echo __('Add Committees Events Person'); ?></legend>
	<?php
		echo $this->Form->input('person_id');
		echo $this->Form->input('committees_event_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Committees Events People'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Committees Events'), array('controller' => 'committees_events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Committees Event'), array('controller' => 'committees_events', 'action' => 'add')); ?> </li>
	</ul>
</div>
