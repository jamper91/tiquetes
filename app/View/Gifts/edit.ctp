<div class="gifts form">
<?php echo $this->Form->create('Gift'); ?>
	<fieldset>
		<legend><?php echo __('Edit Gift'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('cantidad');
		echo $this->Form->input('categoria');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Gift.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Gift.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Gifts'), array('action' => 'index')); ?></li>
	</ul>
</div>
