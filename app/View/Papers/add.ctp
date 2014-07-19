<div class="papers form">
<?php echo $this->Form->create('Paper'); ?>
	<fieldset>
		<legend><?php echo __('Add Paper'); ?></legend>
	<?php
		echo $this->Form->input('event_id');
		echo $this->Form->input('shelf_id');
		echo $this->Form->input('func_nombre');
		echo $this->Form->input('func_fechInicio');
		echo $this->Form->input('func_fechFinal');
		echo $this->Form->input('func_cortesia');
		echo $this->Form->input('func_estado');
		echo $this->Form->input('func_imagen');
		echo $this->Form->input('func_palaClaves');
		echo $this->Form->input('func_cantEntradas');
		echo $this->Form->input('func_cantAlerta');
		echo $this->Form->input('func_codigo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Papers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shelves'), array('controller' => 'shelves', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shelf'), array('controller' => 'shelves', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas'), array('controller' => 'entradas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entrada'), array('controller' => 'entradas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Paper Inputs'), array('controller' => 'paper_inputs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paper Input'), array('controller' => 'paper_inputs', 'action' => 'add')); ?> </li>
	</ul>
</div>
