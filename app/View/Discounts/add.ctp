<div class="discounts form">
<?php echo $this->Form->create('Discount'); ?>
	<fieldset>
		<legend><?php echo __('Add Discount'); ?></legend>
	<?php
		echo $this->Form->input('porcentaje');
		echo $this->Form->input('fecha_inicio');
		echo $this->Form->input('fecha_fin');
		echo $this->Form->input('categoria');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Discounts'), array('action' => 'index')); ?></li>
	</ul>
</div>
