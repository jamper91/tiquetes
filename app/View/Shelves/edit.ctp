<div class="shelves form">
<?php echo $this->Form->create('Shelf'); ?>
	<fieldset>
		<legend><?php echo __('Editar Stand'); ?></legend>
	<?php
		echo $this->Form->input('id');
                echo $this->Form->input('codigo', array(
                    'label'=>'Stand'
                ));
//		echo $this->Form->input('location_id');
		echo $this->Form->input('esta_nombre');
		echo $this->Form->input('genero');
		echo $this->Form->input('representante');
                echo $this->Form->input('ubicacion');
                echo $this->Form->input('mts');
                echo $this->Form->input('descripcion');
                echo $this->Form->input('observacion');
                echo $this->Form->input('aforo');
                
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
