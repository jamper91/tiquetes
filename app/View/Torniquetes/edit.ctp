<div class="torniquetes form">
<?php echo $this->Form->create('Torniquete'); ?>
	<fieldset>
		<legend><?php echo __('Editar Acceso'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array('label'=>'Nombre'));
//		echo $this->Form->input('Entrada');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Actualizar')); ?>
</div>

