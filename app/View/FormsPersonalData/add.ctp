<div class="formsPersonalData form">
<?php echo $this->Form->create('FormsPersonalDatum'); ?>
	<fieldset>
		<legend><?php echo __('Add Forms Personal Datum'); ?></legend>
	<?php
		echo $this->Form->input('personal_datum_id');
		echo $this->Form->input('form_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Forms Personal Data'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Personal Data'), array('controller' => 'personal_data', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Personal Datum'), array('controller' => 'personal_data', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Forms'), array('controller' => 'forms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form'), array('controller' => 'forms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Datas'), array('controller' => 'datas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Data'), array('controller' => 'datas', 'action' => 'add')); ?> </li>
	</ul>
</div>
