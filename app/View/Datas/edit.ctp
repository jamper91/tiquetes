<div class="datas form">
<?php echo $this->Form->create('Data'); ?>
	<fieldset>
		<legend><?php echo __('Edit Data'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('form_id');
		echo $this->Form->input('person_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Data.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Data.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Datas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Forms'), array('controller' => 'forms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form'), array('controller' => 'forms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
</div>
