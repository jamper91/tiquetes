<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($user['User']['estado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Person'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Person']['id'], array('controller' => 'people', 'action' => 'view', $user['Person']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['TypeUser']['id'], array('controller' => 'type_users', 'action' => 'view', $user['TypeUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Department']['id'], array('controller' => 'departments', 'action' => 'view', $user['Department']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Validodesde'); ?></dt>
		<dd>
			<?php echo h($user['User']['validodesde']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Validohasta'); ?></dt>
		<dd>
			<?php echo h($user['User']['validohasta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Identificador'); ?></dt>
		<dd>
			<?php echo h($user['User']['identificador']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php echo __('Related Authorizations'); ?></h3>
	<?php if (!empty($user['Authorization'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Authorization'] as $authorization): ?>
		<tr>
			<td><?php echo $authorization['id']; ?></td>
			<td><?php echo $authorization['nombre']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'authorizations', 'action' => 'view', $authorization['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'authorizations', 'action' => 'edit', $authorization['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'authorizations', 'action' => 'delete', $authorization['id']), array(), __('Are you sure you want to delete # %s?', $authorization['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Authorization'), array('controller' => 'authorizations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
