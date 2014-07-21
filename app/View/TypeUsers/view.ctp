<div class="typeUsers view">
<h2><?php echo __('Type User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($typeUser['TypeUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($typeUser['TypeUser']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($typeUser['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Estado'); ?></th>
		<th><?php echo __('Person Id'); ?></th>
		<th><?php echo __('Type User Id'); ?></th>
		<th><?php echo __('Department Id'); ?></th>
		<th><?php echo __('Validodesde'); ?></th>
		<th><?php echo __('Validohasta'); ?></th>
		<th><?php echo __('Identificador'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($typeUser['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['estado']; ?></td>
			<td><?php echo $user['person_id']; ?></td>
			<td><?php echo $user['type_user_id']; ?></td>
			<td><?php echo $user['department_id']; ?></td>
			<td><?php echo $user['validodesde']; ?></td>
			<td><?php echo $user['validohasta']; ?></td>
			<td><?php echo $user['identificador']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array(), __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
