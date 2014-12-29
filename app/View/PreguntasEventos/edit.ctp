<div class="preguntasEventos form">
<?php echo $this->Form->create('PreguntasEvento'); ?>
	<fieldset>
		<legend><?php echo __('Edit Preguntas Evento'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('pregunta_id');
		echo $this->Form->input('event_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PreguntasEvento.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('PreguntasEvento.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Preguntas Eventos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Preguntas'), array('controller' => 'preguntas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pregunta'), array('controller' => 'preguntas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
