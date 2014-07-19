<div class="companiesEvents view">
<h2><?php echo __('Companies Event'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($companiesEvent['CompaniesEvent']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo $this->Html->link($companiesEvent['Company']['id'], array('controller' => 'companies', 'action' => 'view', $companiesEvent['Company']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($companiesEvent['Event']['id'], array('controller' => 'events', 'action' => 'view', $companiesEvent['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role Company'); ?></dt>
		<dd>
			<?php echo $this->Html->link($companiesEvent['RoleCompany']['id'], array('controller' => 'role_companies', 'action' => 'view', $companiesEvent['RoleCompany']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Companies Event'), array('action' => 'edit', $companiesEvent['CompaniesEvent']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Companies Event'), array('action' => 'delete', $companiesEvent['CompaniesEvent']['id']), array(), __('Are you sure you want to delete # %s?', $companiesEvent['CompaniesEvent']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies Events'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Companies Event'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Role Companies'), array('controller' => 'role_companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role Company'), array('controller' => 'role_companies', 'action' => 'add')); ?> </li>
	</ul>
</div>
