<div class="authorizationsUsers form">
<?php echo $this->Form->create('AuthorizationsUser'); ?>
	<fieldset>
		<legend><?php echo __('Edit Authorizations User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('authorization_id');
		echo $this->Form->input('estado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

