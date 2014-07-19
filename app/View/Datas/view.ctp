<div class="datas view">
<h2><?php echo __('Data'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($data['Data']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($data['Data']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Form'); ?></dt>
		<dd>
			<?php echo $this->Html->link($data['Form']['id'], array('controller' => 'forms', 'action' => 'view', $data['Form']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Person'); ?></dt>
		<dd>
			<?php echo $this->Html->link($data['Person']['id'], array('controller' => 'people', 'action' => 'view', $data['Person']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Data'), array('action' => 'edit', $data['Data']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Data'), array('action' => 'delete', $data['Data']['id']), array(), __('Are you sure you want to delete # %s?', $data['Data']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Datas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Data'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Forms'), array('controller' => 'forms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form'), array('controller' => 'forms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
</div>
