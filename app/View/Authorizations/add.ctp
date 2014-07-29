<div class="authorizations form">
<?php echo $this->Form->create('Authorization'); ?>
	<fieldset>
		<legend><?php echo __('Agregar autorizacion'); ?></legend>
		
	<?php
		echo $this->Form->input('nombre');
		//echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Crear')); ?>
</div>
