<div class="entradasTorniquetes view">
<h2><?php echo __('Entradas Torniquete'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($entradasTorniquete['EntradasTorniquete']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entrada'); ?></dt>
		<dd>
			<?php echo $this->Html->link($entradasTorniquete['Entrada']['id'], array('controller' => 'entradas', 'action' => 'view', $entradasTorniquete['Entrada']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Torniquete'); ?></dt>
		<dd>
			<?php echo $this->Html->link($entradasTorniquete['Torniquete']['name'], array('controller' => 'torniquetes', 'action' => 'view', $entradasTorniquete['Torniquete']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Entradas Torniquete'), array('action' => 'edit', $entradasTorniquete['EntradasTorniquete']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Entradas Torniquete'), array('action' => 'delete', $entradasTorniquete['EntradasTorniquete']['id']), array(), __('Are you sure you want to delete # %s?', $entradasTorniquete['EntradasTorniquete']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas Torniquetes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entradas Torniquete'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas'), array('controller' => 'entradas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entrada'), array('controller' => 'entradas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Torniquetes'), array('controller' => 'torniquetes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Torniquete'), array('controller' => 'torniquetes', 'action' => 'add')); ?> </li>
	</ul>
</div>
