<div class="paperInputs form">
<?php echo $this->Form->create('PaperInput'); ?>
	<fieldset>
		<legend><?php echo __('Edit Paper Input'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('paper_id');
		echo $this->Form->input('input_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
