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
