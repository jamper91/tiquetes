<div class="committeesEventsPeople view">
<h2><?php echo __('Committees Events Person'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($committeesEventsPerson['CommitteesEventsPerson']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Person'); ?></dt>
		<dd>
			<?php echo $this->Html->link($committeesEventsPerson['Person']['id'], array('controller' => 'people', 'action' => 'view', $committeesEventsPerson['Person']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Committees Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($committeesEventsPerson['CommitteesEvent']['id'], array('controller' => 'committees_events', 'action' => 'view', $committeesEventsPerson['CommitteesEvent']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Committees Events Person'), array('action' => 'edit', $committeesEventsPerson['CommitteesEventsPerson']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Committees Events Person'), array('action' => 'delete', $committeesEventsPerson['CommitteesEventsPerson']['id']), array(), __('Are you sure you want to delete # %s?', $committeesEventsPerson['CommitteesEventsPerson']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Committees Events People'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Committees Events Person'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Committees Events'), array('controller' => 'committees_events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Committees Event'), array('controller' => 'committees_events', 'action' => 'add')); ?> </li>
	</ul>
</div>
