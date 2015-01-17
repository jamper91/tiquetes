<div class="opciones view">
<h2><?php echo __('Opcione'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($opcione['Opcione']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Personal Datum'); ?></dt>
		<dd>
			<?php echo $this->Html->link($opcione['PersonalDatum']['id'], array('controller' => 'personal_data', 'action' => 'view', $opcione['PersonalDatum']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($opcione['Opcione']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Opcione'), array('action' => 'edit', $opcione['Opcione']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Opcione'), array('action' => 'delete', $opcione['Opcione']['id']), array(), __('Are you sure you want to delete # %s?', $opcione['Opcione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Opciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Opcione'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Personal Data'), array('controller' => 'personal_data', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Personal Datum'), array('controller' => 'personal_data', 'action' => 'add')); ?> </li>
	</ul>
</div>
