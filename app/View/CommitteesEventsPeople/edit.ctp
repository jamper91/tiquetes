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

