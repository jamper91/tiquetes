<div class="respuestas form">
<?php echo $this->Form->create('Respuesta'); ?>
	<fieldset>
		<legend><?php echo __('Edit Respuesta'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('respuestas');
		echo $this->Form->input('pregunta_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Respuesta.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Respuesta.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Respuestas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Preguntas'), array('controller' => 'preguntas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pregunta'), array('controller' => 'preguntas', 'action' => 'add')); ?> </li>
	</ul>
</div>
