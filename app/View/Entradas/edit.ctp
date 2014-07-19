<div class="entradas form">
<?php echo $this->Form->create('Entrada'); ?>
	<fieldset>
		<legend><?php echo __('Edit Entrada'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('paper_id');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('category_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Entrada.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Entrada.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Entradas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Papers'), array('controller' => 'papers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paper'), array('controller' => 'papers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
