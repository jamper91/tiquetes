<div class="payments form">
<?php echo $this->Form->create('Payment'); ?>
	<fieldset>
		<legend><?php echo __('Add Payment'); ?></legend>
	<?php
		echo $this->Form->input('mepa_descripcion', array('label' => 'Descripcion'));
//		echo $this->Form->input('Event');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>