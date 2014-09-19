<div class="entradas form">
<?php echo $this->Form->create('Entrada'); ?>
	<fieldset>
		<legend><?php echo __('Crear Entrada a Escenario'); ?></legend>
	<?php
		echo $this->Form->input('stage_id', array(
                    'label' => 'Escenario',
                     "options" => $escenario,
                        "empty" => "Seleccione un Escenario"
                ));
		echo $this->Form->input('name', array(
                    'label'=>'Nombre'
                ));		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Crear')); ?>
</div>

