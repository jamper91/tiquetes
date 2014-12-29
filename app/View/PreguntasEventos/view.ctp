<div class="preguntasEventos view">
<h2><?php echo __('Preguntas Evento'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($preguntasEvento['PreguntasEvento']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pregunta'); ?></dt>
		<dd>
			<?php echo $this->Html->link($preguntasEvento['Pregunta']['id'], array('controller' => 'preguntas', 'action' => 'view', $preguntasEvento['Pregunta']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($preguntasEvento['Event']['id'], array('controller' => 'events', 'action' => 'view', $preguntasEvento['Event']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Preguntas Evento'), array('action' => 'edit', $preguntasEvento['PreguntasEvento']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Preguntas Evento'), array('action' => 'delete', $preguntasEvento['PreguntasEvento']['id']), array(), __('Are you sure you want to delete # %s?', $preguntasEvento['PreguntasEvento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Preguntas Eventos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Preguntas Evento'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Preguntas'), array('controller' => 'preguntas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pregunta'), array('controller' => 'preguntas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
