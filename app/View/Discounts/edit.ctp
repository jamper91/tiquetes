<div class="discounts form">
<?php echo $this->Form->create('Discount'); ?>
	<fieldset>
		<legend><?php echo __('Edit Discount'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Discount.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Discount.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Discounts'), array('action' => 'index')); ?></li>
	</ul>
</div>
