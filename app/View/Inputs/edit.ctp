<div class="inputs form">
<?php echo $this->Form->create('Input'); ?>
	<fieldset>
		<legend><?php echo __('Edit Input'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('input_state_id');
		echo $this->Form->input('person_id');
		echo $this->Form->input('entr_imagen');
		echo $this->Form->input('entr_titulo');
		echo $this->Form->input('entr_fuenTitulo');
		echo $this->Form->input('entr_tamaTitulo');
		echo $this->Form->input('entr_fecha');
		echo $this->Form->input('entr_fuenFecha');
		echo $this->Form->input('entr_tamaFecha');
		echo $this->Form->input('entr_fuenCliente');
		echo $this->Form->input('entr_tamaCliente');
		echo $this->Form->input('entr_direccion');
		echo $this->Form->input('entr_fuenDireccion');
		echo $this->Form->input('entr_tamaDireccion');
		echo $this->Form->input('entr_codigo');
		echo $this->Form->input('entr_identificador');
		echo $this->Form->input('entr_impreso');
		echo $this->Form->input('events_registration_type_id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('cantidad_reingresos');
		echo $this->Form->input('DeliveryMethod');
		echo $this->Form->input('Sale');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Input.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Input.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Inputs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Input States'), array('controller' => 'input_states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Input State'), array('controller' => 'input_states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events Registration Types'), array('controller' => 'events_registration_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Events Registration Type'), array('controller' => 'events_registration_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Delivery Methods'), array('controller' => 'delivery_methods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Delivery Method'), array('controller' => 'delivery_methods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sales'), array('controller' => 'sales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sale'), array('controller' => 'sales', 'action' => 'add')); ?> </li>
	</ul>
</div>
