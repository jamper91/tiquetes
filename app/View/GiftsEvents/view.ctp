<div class="giftsEvents view">
<h2><?php echo __('Gifts Event'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($giftsEvent['GiftsEvent']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gift'); ?></dt>
		<dd>
			<?php echo $this->Html->link($giftsEvent['Gift']['id'], array('controller' => 'gifts', 'action' => 'view', $giftsEvent['Gift']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($giftsEvent['Event']['id'], array('controller' => 'events', 'action' => 'view', $giftsEvent['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
			<?php echo h($giftsEvent['GiftsEvent']['cantidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Control'); ?></dt>
		<dd>
			<?php echo h($giftsEvent['GiftsEvent']['control']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categoria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($giftsEvent['Categoria']['id'], array('controller' => 'categorias', 'action' => 'view', $giftsEvent['Categoria']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('People'); ?></dt>
		<dd>
			<?php echo $this->Html->link($giftsEvent['People']['id'], array('controller' => 'people', 'action' => 'view', $giftsEvent['People']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Gifts Event'), array('action' => 'edit', $giftsEvent['GiftsEvent']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Gifts Event'), array('action' => 'delete', $giftsEvent['GiftsEvent']['id']), array(), __('Are you sure you want to delete # %s?', $giftsEvent['GiftsEvent']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Gifts Events'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gifts Event'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gifts'), array('controller' => 'gifts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gift'), array('controller' => 'gifts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New People'), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
</div>
