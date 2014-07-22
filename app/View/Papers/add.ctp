<div class="papers form">
<?php echo $this->Form->create('Paper'); ?>
	<fieldset>
		<legend><?php echo __('Add Paper'); ?></legend>
	<?php
		echo $this->Form->input('event_id');
		echo $this->Form->input('shelf_id');
		echo $this->Form->input('func_nombre');
		echo $this->Form->input('func_fechInicio');
		echo $this->Form->input('func_fechFinal');
		echo $this->Form->input('func_cortesia');
		echo $this->Form->input('func_estado');
		echo $this->Form->input('func_imagen');
		echo $this->Form->input('func_palaClaves');
		echo $this->Form->input('func_cantEntradas');
		echo $this->Form->input('func_cantAlerta');
		echo $this->Form->input('func_codigo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
