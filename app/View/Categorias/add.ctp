<div class="categorias form">
<?php echo $this->Form->create('Categoria'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Categoria'); ?></legend>
	<?php
		echo $this->Form->input('descripcion');		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Agregar')); ?>
</div>
<div class="actions"></div>
