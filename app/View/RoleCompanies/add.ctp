<div class="roleCompanies form">
<?php echo $this->Form->create('RoleCompany'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Patrocinador'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
