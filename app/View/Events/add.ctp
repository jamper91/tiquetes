<div class="events form">
<?php echo $this->Form->create('Event'); ?>
	<fieldset>
		<legend><?php echo __('Add Event'); ?></legend>
	<?php
		echo $this->Form->input('stage_id');
		echo $this->Form->input('event_type_id');
		echo $this->Form->input('even_nombre');
		echo $this->Form->input('even_numeResolucion');
		echo $this->Form->input('even_palaClave');
		echo $this->Form->input('even_observaciones');
		echo $this->Form->input('even_estado');
		echo $this->Form->input('even_imagen1');
		echo $this->Form->input('even_imagen2');
		echo $this->Form->input('even_fechInicio');
		echo $this->Form->input('even_fechFinal');
		echo $this->Form->input('even_publicar');
		echo $this->Form->input('even_codigo');
		echo $this->Form->input('Committee');
		echo $this->Form->input('Company');
		echo $this->Form->input('Hotel');
		echo $this->Form->input('Payment');
		echo $this->Form->input('RegistrationType');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Stages'), array('controller' => 'stages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stage'), array('controller' => 'stages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Event Types'), array('controller' => 'event_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event Type'), array('controller' => 'event_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Forms'), array('controller' => 'forms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form'), array('controller' => 'forms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Papers'), array('controller' => 'papers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paper'), array('controller' => 'papers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Committees'), array('controller' => 'committees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Committee'), array('controller' => 'committees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels'), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel'), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payments'), array('controller' => 'payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment'), array('controller' => 'payments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Registration Types'), array('controller' => 'registration_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Registration Type'), array('controller' => 'registration_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
