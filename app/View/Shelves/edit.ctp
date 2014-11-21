<div class="shelves form">
<?php echo $this->Form->create('Shelf'); ?>
	<fieldset>
		<legend><?php echo __('Editar Stand'); ?></legend>
                <table>
                    <tr>
                        <td><?php echo $this->Form->input('id'); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $this->Form->input('codigo', array(
                    'label'=>'N° STAND'
                )); ?></td>
                        <td><?php echo $this->Form->input('esta_nombre', array(
                    'label'=>'NOMBRE DEL STAND'
                )); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $this->Form->input('genero',array(
                    'label'=>'PRODUCTOS O CATEGORIA'
                )); ?></td>
                        <td><?php echo $this->Form->input('representante', array(
                    'label'=>'RESPONSABLE DEL STAND'
                )); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $this->Form->input('ubicacion', array(
                    'label'=>'UBICACION O SECTOR'
                )); ?></td>
                        <td><?php echo $this->Form->input('mts', array(
                    'label'=>'METROS'
                )); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $this->Form->input('descripcion',array(
                    'label'=>'DESCRIPCION'
                )); ?></td>
                        <td><?php echo $this->Form->input('observacion',array(
                    'label'=>'OBSERVACION'
                )); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $this->Form->input('aforo',array(
                    'label'=>'AFORO'
                )); ?></td>
                        <td><?php echo $this->Form->input('telefono',array(
                    'label'=>'TELEFONO'
                ));
                 ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $this->Form->input('mail',array(
                    'label'=>'E-MAIL'
                )); ?></td>
                        <td><?php echo $this->Form->input('ciudad',array(
                    'label'=>'CIUDAD'
                )); ?></td>
                    </tr>
                    <tr>
                        <td><?php ?></td>
                        <td><?php ?></td>
                    </tr>
                </table>
	<?php
		
//		echo $this->Form->input('location_id');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
