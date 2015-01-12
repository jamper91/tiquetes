<div class="preguntas form">
<?php echo $this->Form->create('Pregunta'); ?>
	<fieldset>
		<legend><?php echo __('Crear Pregunta'); ?></legend>
	<?php
		echo $this->Form->input('pregunta');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Crear')); ?>
</div>