<div class="personalData form">
<?php echo $this->Form->create('PersonalDatum'); ?>
	<fieldset>
		<legend><?php echo __('Edit Personal Datum'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('id_padre');
		echo $this->Form->input('tipo');
		echo $this->Form->input('obligatorio');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>