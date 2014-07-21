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
