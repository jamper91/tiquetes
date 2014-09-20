<div class="entradas form">
<?php echo $this->Form->create('Entrada'); ?>
	<fieldset>
		<legend><?php echo __('Edit Entrada'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('stage_id', array(
                    'label' => 'Escenario',
                     "options" => $escenario,
                        "empty" => "Seleccione un Escenario"
                ));
		echo $this->Form->input('name', array('label'=>'Nombre'));
//		echo $this->Form->input('category_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

