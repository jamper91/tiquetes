<div class="roleCompanies view">
<h2><?php echo __('Role Company'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($roleCompany['RoleCompany']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($roleCompany['RoleCompany']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Role Company'), array('action' => 'edit', $roleCompany['RoleCompany']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Role Company'), array('action' => 'delete', $roleCompany['RoleCompany']['id']), array(), __('Are you sure you want to delete # %s?', $roleCompany['RoleCompany']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Role Companies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role Company'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies Events'), array('controller' => 'companies_events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Companies Event'), array('controller' => 'companies_events', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Companies Events'); ?></h3>
	<?php if (!empty($roleCompany['CompaniesEvent'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th><?php echo __('Role Company Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($roleCompany['CompaniesEvent'] as $companiesEvent): ?>
		<tr>
			<td><?php echo $companiesEvent['id']; ?></td>
			<td><?php echo $companiesEvent['company_id']; ?></td>
			<td><?php echo $companiesEvent['event_id']; ?></td>
			<td><?php echo $companiesEvent['role_company_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'companies_events', 'action' => 'view', $companiesEvent['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'companies_events', 'action' => 'edit', $companiesEvent['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'companies_events', 'action' => 'delete', $companiesEvent['id']), array(), __('Are you sure you want to delete # %s?', $companiesEvent['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Companies Event'), array('controller' => 'companies_events', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
