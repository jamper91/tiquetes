<div class="people form">
<?php echo $this->Form->create('Person'); ?>
	<fieldset>
		<legend><?php echo __('Edit Person'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('document_type_id');
		echo $this->Form->input('city_id');
		echo $this->Form->input('pers_documento');
		echo $this->Form->input('pers_primNombre');
		echo $this->Form->input('pers_segNombre');
		echo $this->Form->input('pers_primApellido');
		echo $this->Form->input('pers_segApellido');
		echo $this->Form->input('pers_direccion');
		echo $this->Form->input('pers_barrio');
		echo $this->Form->input('pers_telefono');
		echo $this->Form->input('pers_celular');
		echo $this->Form->input('pers_fechNacimiento');
		echo $this->Form->input('pers_tipoSangre');
		echo $this->Form->input('pers_mail');
		echo $this->Form->input('CommitteesEvent');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Person.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Person.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List People'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Document Types'), array('controller' => 'document_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Document Type'), array('controller' => 'document_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Datas'), array('controller' => 'datas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Data'), array('controller' => 'datas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inputs'), array('controller' => 'inputs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Input'), array('controller' => 'inputs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Committees Events'), array('controller' => 'committees_events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Committees Event'), array('controller' => 'committees_events', 'action' => 'add')); ?> </li>
	</ul>
</div>
