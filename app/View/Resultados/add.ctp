<div class="resultados form">
<?php echo $this->Form->create('Resultado'); ?>
	<fieldset>
		<legend><?php echo __('Add Resultado'); ?></legend>
	<?php
		echo $this->Form->input('preguntas_eventos_id');
		echo $this->Form->input('person_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Resultados'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Preguntas Eventos'), array('controller' => 'preguntas_eventos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Preguntas Eventos'), array('controller' => 'preguntas_eventos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
</div>
