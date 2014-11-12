<div class="shelves form">
<?php echo $this->Form->create('Shelf'); ?>
	<fieldset>
		<legend><?php echo __('Editar Stand'); ?></legend>
	<?php
		echo $this->Form->input('id');
                echo $this->Form->input('codigo', array(
                    'label'=>'N° STAND'
                ));
//		echo $this->Form->input('location_id');
		echo $this->Form->input('esta_nombre', array(
                    'label'=>'NOMBRE DEL STAND'
                ));
		echo $this->Form->input('genero',array(
                    'label'=>'PRODUCTOS O CATEGORIA'
                ));
		echo $this->Form->input('representante', array(
                    'label'=>'RESPONSABLE DEL STAND'
                ));
                echo $this->Form->input('ubicacion', array(
                    'label'=>'UBICACION O SECTOR'
                ));
                echo $this->Form->input('mts', array(
                    'label'=>'METROS'
                ));
                echo $this->Form->input('descripcion',array(
                    'label'=>'DESCRIPCION'
                ));
                echo $this->Form->input('observacion',array(
                    'label'=>'OBSERVACION'
                ));
                echo $this->Form->input('aforo',array(
                    'label'=>'AFORO'
                ));
                
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
