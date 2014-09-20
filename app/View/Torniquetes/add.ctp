<div class="torniquetes form">
<?php echo $this->Form->create('Torniquete'); ?>
	<fieldset>
		<legend><?php echo __('Crear Acceso'); ?></legend>
	<?php
		echo $this->Form->input('name', array(
                    'label' => 'Nombre',
                    'required'=>'true'
                ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Crear')); ?>
</div>
<div class="actions"></div>
