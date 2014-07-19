<div class="paperInputs form">
<?php echo $this->Form->create('PaperInput'); ?>
	<fieldset>
		<legend><?php echo __('Edit Paper Input'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('paper_id');
		echo $this->Form->input('input_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PaperInput.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('PaperInput.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Paper Inputs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Papers'), array('controller' => 'papers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paper'), array('controller' => 'papers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inputs'), array('controller' => 'inputs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Input'), array('controller' => 'inputs', 'action' => 'add')); ?> </li>
	</ul>
</div>
