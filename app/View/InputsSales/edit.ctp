<div class="inputsSales form">
<?php echo $this->Form->create('InputsSale'); ?>
	<fieldset>
		<legend><?php echo __('Edit Inputs Sale'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('input_id');
		echo $this->Form->input('sale_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
