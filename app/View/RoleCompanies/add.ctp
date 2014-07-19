<div class="roleCompanies form">
<?php echo $this->Form->create('RoleCompany'); ?>
	<fieldset>
		<legend><?php echo __('Add Role Company'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Role Companies'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Companies Events'), array('controller' => 'companies_events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Companies Event'), array('controller' => 'companies_events', 'action' => 'add')); ?> </li>
	</ul>
</div>
