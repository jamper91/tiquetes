<div class="hotels form">
<?php echo $this->Form->create('Hotel'); ?>
	<fieldset>
		<legend><?php echo __('Add Hotel'); ?></legend>
	<?php
		echo $this->Form->input('hote_nombre');
		echo $this->Form->input('hote_mit');
		echo $this->Form->input('hote_direccion');
		echo $this->Form->input('hote_telefono');
		echo $this->Form->input('hote_email');
		echo $this->Form->input('hote_pagiWeb');
		echo $this->Form->input('Event');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Hotels'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
