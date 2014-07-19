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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('RoleCompany.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('RoleCompany.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Role Companies'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Companies Events'), array('controller' => 'companies_events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Companies Event'), array('controller' => 'companies_events', 'action' => 'add')); ?> </li>
	</ul>
</div>
