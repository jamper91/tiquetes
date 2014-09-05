<div class="categorias form">
<?php echo $this->Form->create('Categoria'); ?>
	<fieldset>
		<legend><?php echo __('Editar Categoria'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('descripcion');
		
	?>
                <input type="hidden" name="descripcionant" id="descripcionant" value="<?php echo $this->Form->data['Categoria']['descripcion'] ?>"
	</fieldset>
<?php echo $this->Form->end(__('Actualizar')); ?>
</div>
