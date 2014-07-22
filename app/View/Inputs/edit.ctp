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
