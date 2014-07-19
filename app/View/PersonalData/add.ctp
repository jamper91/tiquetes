<div class="personalData form">
<?php echo $this->Form->create('PersonalDatum'); ?>
	<fieldset>
		<legend><?php echo __('Add Personal Datum'); ?></legend>
	<?php
		echo $this->Form->input('descripcion');
		echo $this->Form->input('id_padre');
		echo $this->Form->input('tipo');
		echo $this->Form->input('obligatorio');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Personal Data'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Forms'), array('controller' => 'forms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form'), array('controller' => 'forms', 'action' => 'add')); ?> </li>
	</ul>
</div>
