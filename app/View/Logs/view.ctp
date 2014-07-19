<div class="logs view">
<h2><?php echo __('Log'); ?></h2>
	<dl>
		<dt><?php echo __('Id Log'); ?></dt>
		<dd>
			<?php echo h($log['Log']['id_log']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($log['Log']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Realizado'); ?></dt>
		<dd>
			<?php echo h($log['Log']['fecha_realizado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($log['Log']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Log'), array('action' => 'edit', $log['Log']['id_log'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Log'), array('action' => 'delete', $log['Log']['id_log']), array(), __('Are you sure you want to delete # %s?', $log['Log']['id_log'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Logs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Log'), array('action' => 'add')); ?> </li>
	</ul>
</div>
