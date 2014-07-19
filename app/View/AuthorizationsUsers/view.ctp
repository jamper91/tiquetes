<div class="authorizationsUsers view">
<h2><?php echo __('Authorizations User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($authorizationsUser['AuthorizationsUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($authorizationsUser['User']['id'], array('controller' => 'users', 'action' => 'view', $authorizationsUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Authorization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($authorizationsUser['Authorization']['id'], array('controller' => 'authorizations', 'action' => 'view', $authorizationsUser['Authorization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($authorizationsUser['AuthorizationsUser']['estado']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Authorizations User'), array('action' => 'edit', $authorizationsUser['AuthorizationsUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Authorizations User'), array('action' => 'delete', $authorizationsUser['AuthorizationsUser']['id']), array(), __('Are you sure you want to delete # %s?', $authorizationsUser['AuthorizationsUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Authorizations Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Authorizations User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Authorizations'), array('controller' => 'authorizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Authorization'), array('controller' => 'authorizations', 'action' => 'add')); ?> </li>
	</ul>
</div>
