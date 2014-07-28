<div class="entradasInputs view">
<h2><?php echo __('Entradas Input'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($entradasInput['EntradasInput']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entrada'); ?></dt>
		<dd>
			<?php echo $this->Html->link($entradasInput['Entrada']['id'], array('controller' => 'entradas', 'action' => 'view', $entradasInput['Entrada']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Input'); ?></dt>
		<dd>
			<?php echo $this->Html->link($entradasInput['Input']['id'], array('controller' => 'inputs', 'action' => 'view', $entradasInput['Input']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($entradasInput['EntradasInput']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ingresos'); ?></dt>
		<dd>
			<?php echo h($entradasInput['EntradasInput']['ingresos']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Entradas Input'), array('action' => 'edit', $entradasInput['EntradasInput']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Entradas Input'), array('action' => 'delete', $entradasInput['EntradasInput']['id']), array(), __('Are you sure you want to delete # %s?', $entradasInput['EntradasInput']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas Inputs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entradas Input'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas'), array('controller' => 'entradas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entrada'), array('controller' => 'entradas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inputs'), array('controller' => 'inputs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Input'), array('controller' => 'inputs', 'action' => 'add')); ?> </li>
	</ul>
</div>
