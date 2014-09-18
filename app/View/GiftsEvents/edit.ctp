<div class="giftsEvents form">
<?php echo $this->Form->create('GiftsEvent'); ?>
	<fieldset>
		<legend><?php echo __('Edit Gifts Event'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('gift_id');
		echo $this->Form->input('event_id');
		echo $this->Form->input('cantidad');
		echo $this->Form->input('control');
		echo $this->Form->input('categoria_id');
		echo $this->Form->input('people_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('GiftsEvent.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('GiftsEvent.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Gifts Events'), array('action' => 'index')); ?></li>
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
