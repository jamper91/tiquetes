<div class="opciones form">
<?php echo $this->Form->create('Opcione'); ?>
	<fieldset>
		<legend><?php echo __('Edit Opcione'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('personal_datum_id');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Opcione.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Opcione.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Opciones'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Personal Data'), array('controller' => 'personal_data', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Personal Datum'), array('controller' => 'personal_data', 'action' => 'add')); ?> </li>
	</ul>
</div>
