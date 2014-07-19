<div class="committeesEvents form">
<?php echo $this->Form->create('CommitteesEvent'); ?>
	<fieldset>
		<legend><?php echo __('Add Committees Event'); ?></legend>
	<?php
		echo $this->Form->input('committee_id');
		echo $this->Form->input('event_id');
		echo $this->Form->input('Person');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Committees Events'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Committees'), array('controller' => 'committees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Committee'), array('controller' => 'committees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
</div>
