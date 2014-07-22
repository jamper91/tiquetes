<div class="eventsPayments form">
<?php echo $this->Form->create('EventsPayment'); ?>
	<fieldset>
		<legend><?php echo __('Edit Events Payment'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('payment_id');
		echo $this->Form->input('event_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
