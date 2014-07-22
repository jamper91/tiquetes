<div class="documentTypes form">
<?php echo $this->Form->create('DocumentType'); ?>
	<fieldset>
		<legend><?php echo __('Add Document Type'); ?></legend>
	<?php
		echo $this->Form->input('tido_descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

