<div class="gifts form">
<?php echo $this->Form->create('Gift'); ?>
	<fieldset>
		<legend><?php echo __('Add Gift'); ?></legend>
	<?php
		echo $this->Form->input('descripcion');
		echo $this->Form->input('cantidad');
		echo $this->Form->input('categoria');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

