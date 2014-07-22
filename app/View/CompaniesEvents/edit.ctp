<div class="companiesEvents form">
<?php echo $this->Form->create('CompaniesEvent'); ?>
	<fieldset>
		<legend><?php echo __('Edit Companies Event'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('company_id');
		echo $this->Form->input('event_id');
		echo $this->Form->input('role_company_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

