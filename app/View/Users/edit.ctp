<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('estado');		
		echo $this->Form->input('type_user_id');
		echo $this->Form->input('department_id');
		echo $this->Form->input('validodesde');
		echo $this->Form->input('validohasta');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
