<div class="companiesEvents form">
<?php echo $this->Form->create('CompaniesEvent'); ?>
	<fieldset>
		<legend><?php echo __('Add Companies Event'); ?></legend>
	<?php
		echo $this->Form->input('company_id');
		echo $this->Form->input('event_id');
		echo $this->Form->input('role_company_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Companies Events'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Role Companies'), array('controller' => 'role_companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role Company'), array('controller' => 'role_companies', 'action' => 'add')); ?> </li>
	</ul>
</div>
