<div class="categorias form">
<?php echo $this->Form->create('Categoria'); ?>
	<fieldset>
		<legend><?php echo __('Add Categoria'); ?></legend>
	<?php
		echo $this->Form->input('descripcion');
		echo $this->Form->input('precio');
		echo $this->Form->input('event_id');
		echo $this->Form->input('Entrada');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions"></div>
