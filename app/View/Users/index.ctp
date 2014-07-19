<div class="users index">
	<h2><?php echo __('Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('password'); ?></th>
			<th><?php echo $this->Paginator->sort('estado'); ?></th>
			<th><?php echo $this->Paginator->sort('person_id'); ?></th>
			<th><?php echo $this->Paginator->sort('type_user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('department_id'); ?></th>
			<th><?php echo $this->Paginator->sort('validodesde'); ?></th>
			<th><?php echo $this->Paginator->sort('validohasta'); ?></th>
			<th><?php echo $this->Paginator->sort('identificador'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['password']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['estado']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['Person']['id'], array('controller' => 'people', 'action' => 'view', $user['Person']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($user['TypeUser']['id'], array('controller' => 'type_users', 'action' => 'view', $user['TypeUser']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($user['Department']['id'], array('controller' => 'departments', 'action' => 'view', $user['Department']['id'])); ?>
		</td>
		<td><?php echo h($user['User']['validodesde']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['validohasta']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['identificador']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Type Users'), array('controller' => 'type_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type User'), array('controller' => 'type_users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Authorizations'), array('controller' => 'authorizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Authorization'), array('controller' => 'authorizations', 'action' => 'add')); ?> </li>
	</ul>
</div>
