<div class="authorizationsUsers form">
<?php echo $this->Form->create('AuthorizationsUser'); ?>
	<fieldset>
		<legend><?php echo __('Add Authorizations User'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('authorization_id');
		echo $this->Form->input('estado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Authorizations Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Authorizations'), array('controller' => 'authorizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Authorization'), array('controller' => 'authorizations', 'action' => 'add')); ?> </li>
	</ul>
</div>
