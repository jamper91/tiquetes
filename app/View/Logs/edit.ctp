<div class="logs form">
<?php echo $this->Form->create('Log'); ?>
	<fieldset>
		<legend><?php echo __('Edit Log'); ?></legend>
	<?php
		echo $this->Form->input('id_log');
		echo $this->Form->input('id');
		echo $this->Form->input('fecha_realizado');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Log.id_log')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Log.id_log'))); ?></li>
		<li><?php echo $this->Html->link(__('List Logs'), array('action' => 'index')); ?></li>
	</ul>
</div>
