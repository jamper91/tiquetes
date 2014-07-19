<div class="gifts form">
<?php echo $this->Form->create('Gift'); ?>
	<fieldset>
		<legend><?php echo __('Add Gift'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Gifts'), array('action' => 'index')); ?></li>
	</ul>
</div>
