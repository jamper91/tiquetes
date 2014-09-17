<div class="eventsCategorias view">
<h2><?php echo __('Events Categoria'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($eventsCategoria['EventsCategoria']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categoria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($eventsCategoria['Categoria']['id'], array('controller' => 'categorias', 'action' => 'view', $eventsCategoria['Categoria']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($eventsCategoria['Event']['id'], array('controller' => 'events', 'action' => 'view', $eventsCategoria['Event']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Events Categoria'), array('action' => 'edit', $eventsCategoria['EventsCategoria']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Events Categoria'), array('action' => 'delete', $eventsCategoria['EventsCategoria']['id']), array(), __('Are you sure you want to delete # %s?', $eventsCategoria['EventsCategoria']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Events Categorias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Events Categoria'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
