<div class="categoriasEntradas view">
<h2><?php echo __('Categorias Entrada'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($categoriasEntrada['CategoriasEntrada']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categoria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoriasEntrada['Categoria']['id'], array('controller' => 'categorias', 'action' => 'view', $categoriasEntrada['Categoria']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entrada'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoriasEntrada['Entrada']['id'], array('controller' => 'entradas', 'action' => 'view', $categoriasEntrada['Entrada']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Categorias Entrada'), array('action' => 'edit', $categoriasEntrada['CategoriasEntrada']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Categorias Entrada'), array('action' => 'delete', $categoriasEntrada['CategoriasEntrada']['id']), array(), __('Are you sure you want to delete # %s?', $categoriasEntrada['CategoriasEntrada']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias Entradas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categorias Entrada'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas'), array('controller' => 'entradas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entrada'), array('controller' => 'entradas', 'action' => 'add')); ?> </li>
	</ul>
</div>
