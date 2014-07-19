<div class="paperInputs view">
<h2><?php echo __('Paper Input'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($paperInput['PaperInput']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Paper'); ?></dt>
		<dd>
			<?php echo $this->Html->link($paperInput['Paper']['id'], array('controller' => 'papers', 'action' => 'view', $paperInput['Paper']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Input'); ?></dt>
		<dd>
			<?php echo $this->Html->link($paperInput['Input']['id'], array('controller' => 'inputs', 'action' => 'view', $paperInput['Input']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Paper Input'), array('action' => 'edit', $paperInput['PaperInput']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Paper Input'), array('action' => 'delete', $paperInput['PaperInput']['id']), array(), __('Are you sure you want to delete # %s?', $paperInput['PaperInput']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Paper Inputs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paper Input'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Papers'), array('controller' => 'papers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paper'), array('controller' => 'papers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inputs'), array('controller' => 'inputs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Input'), array('controller' => 'inputs', 'action' => 'add')); ?> </li>
	</ul>
</div>
