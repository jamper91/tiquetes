<div class="validations form">
<?php echo $this->Form->create('Validation'); ?>
	<fieldset>
		<legend><?php echo __('Add Validation'); ?></legend>
	<?php
		echo $this->Form->input('descripcion');
		echo $this->Form->input('fechainicio');
		echo $this->Form->input('fechafin');
		echo $this->Form->input('cantidad_reingresos');
		echo $this->Form->input('categoria');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Validations'), array('action' => 'index')); ?></li>
	</ul>
</div>
