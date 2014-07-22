<div class="roleCompanies form">
<?php echo $this->Form->create('RoleCompany'); ?>
	<fieldset>
		<legend><?php echo __('Edit Role Company'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

