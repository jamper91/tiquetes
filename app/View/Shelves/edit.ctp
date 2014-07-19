<div class="shelves form">
<?php echo $this->Form->create('Shelf'); ?>
	<fieldset>
		<legend><?php echo __('Edit Shelf'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('location_id');
		echo $this->Form->input('esta_nombre');
		echo $this->Form->input('esta_estado');
		echo $this->Form->input('esta_precio');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Shelf.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Shelf.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Shelves'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Locations'), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('controller' => 'locations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Papers'), array('controller' => 'papers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paper'), array('controller' => 'papers', 'action' => 'add')); ?> </li>
	</ul>
</div>
