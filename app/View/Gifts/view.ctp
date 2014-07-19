<div class="gifts view">
<h2><?php echo __('Gift'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($gift['Gift']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($gift['Gift']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
			<?php echo h($gift['Gift']['cantidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categoria'); ?></dt>
		<dd>
			<?php echo h($gift['Gift']['categoria']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Gift'), array('action' => 'edit', $gift['Gift']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Gift'), array('action' => 'delete', $gift['Gift']['id']), array(), __('Are you sure you want to delete # %s?', $gift['Gift']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Gifts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gift'), array('action' => 'add')); ?> </li>
	</ul>
</div>
