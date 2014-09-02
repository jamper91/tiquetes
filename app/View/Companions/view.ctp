<div class="companions view">
<h2><?php echo __('Companion'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($companion['Companion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expo Id'); ?></dt>
		<dd>
			<?php echo h($companion['Companion']['expo_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Person'); ?></dt>
		<dd>
			<?php echo $this->Html->link($companion['Person']['id'], array('controller' => 'people', 'action' => 'view', $companion['Person']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($companion['Event']['id'], array('controller' => 'events', 'action' => 'view', $companion['Event']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Companion'), array('action' => 'edit', $companion['Companion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Companion'), array('action' => 'delete', $companion['Companion']['id']), array(), __('Are you sure you want to delete # %s?', $companion['Companion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Companions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Companion'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
