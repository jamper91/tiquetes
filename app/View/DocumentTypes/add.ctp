<div class="documentTypes form">
<?php echo $this->Form->create('DocumentType'); ?>
	<fieldset>
		<legend><?php echo __('Add Document Type'); ?></legend>
	<?php
		echo $this->Form->input('tido_descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Document Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
</div>
