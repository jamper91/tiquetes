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