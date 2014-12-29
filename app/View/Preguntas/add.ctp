<div class="preguntas form">
<?php echo $this->Form->create('Pregunta'); ?>
	<fieldset>
		<legend><?php echo __('Add Pregunta'); ?></legend>
	<?php
		echo $this->Form->input('pregunta');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Preguntas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Respuestas'), array('controller' => 'respuestas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Respuesta'), array('controller' => 'respuestas', 'action' => 'add')); ?> </li>
	</ul>
</div>
