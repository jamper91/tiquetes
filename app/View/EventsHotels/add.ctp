<div class="eventsHotels form">
<?php echo $this->Form->create('EventsHotel'); ?>
	<fieldset>
		<legend><?php echo __('Add Events Hotel'); ?></legend>
	<?php
		echo $this->Form->input('event_id');
		echo $this->Form->input('hotel_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
