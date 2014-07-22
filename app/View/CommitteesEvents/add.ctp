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
