<div class="committeesEventsPeople form">
<?php echo $this->Form->create('CommitteesEventsPerson'); ?>
	<fieldset>
		<legend><?php echo __('Edit Committees Events Person'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('person_id');
		echo $this->Form->input('committees_event_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CommitteesEventsPerson.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('CommitteesEventsPerson.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Committees Events People'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Committees Events'), array('controller' => 'committees_events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Committees Event'), array('controller' => 'committees_events', 'action' => 'add')); ?> </li>
	</ul>
</div>
