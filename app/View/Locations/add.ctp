<div class="locations form">
<?php echo $this->Form->create('Location'); ?>
	<fieldset>
		<legend><?php echo __('Add Location'); ?></legend>
	<?php
		echo $this->Form->input('loca_nombre');
		echo $this->Form->input('stage_id');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('loca_fila');
		echo $this->Form->input('loca_colomnna');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Locations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Stages'), array('controller' => 'stages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stage'), array('controller' => 'stages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations'), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Location'), array('controller' => 'locations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shelves'), array('controller' => 'shelves', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shelf'), array('controller' => 'shelves', 'action' => 'add')); ?> </li>
	</ul>
</div>
