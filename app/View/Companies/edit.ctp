<div class="companies form">
<?php echo $this->Form->create('Company'); ?>
	<fieldset>
		<legend><?php echo __('Edit Company'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('person_id');
		echo $this->Form->input('city_id');
		echo $this->Form->input('empr_nit');
		echo $this->Form->input('empr_nombre');
		echo $this->Form->input('empr_telefono');
		echo $this->Form->input('empr_mail');
		echo $this->Form->input('empr_direccion');
		echo $this->Form->input('empr_barrio');
		echo $this->Form->input('empr_pagiWeb');
		echo $this->Form->input('Event');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
