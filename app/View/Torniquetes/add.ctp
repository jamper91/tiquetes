<div class="torniquetes form">
<?php echo $this->Form->create('Torniquete'); ?>
	<fieldset>
		<legend><?php echo __('Crear Torniquete'); ?></legend>
	<?php
		echo $this->Form->input('name', array(
                    'label' => 'Nombre'
                ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Crear')); ?>
</div>
<div class="actions"></div>
