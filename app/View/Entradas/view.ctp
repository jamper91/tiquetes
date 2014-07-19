<div class="entradas view">
<h2><?php echo __('Entrada'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($entrada['Entrada']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Paper'); ?></dt>
		<dd>
			<?php echo $this->Html->link($entrada['Paper']['id'], array('controller' => 'papers', 'action' => 'view', $entrada['Paper']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($entrada['Entrada']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($entrada['Category']['id'], array('controller' => 'categories', 'action' => 'view', $entrada['Category']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Entrada'), array('action' => 'edit', $entrada['Entrada']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Entrada'), array('action' => 'delete', $entrada['Entrada']['id']), array(), __('Are you sure you want to delete # %s?', $entrada['Entrada']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entrada'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Papers'), array('controller' => 'papers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paper'), array('controller' => 'papers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
