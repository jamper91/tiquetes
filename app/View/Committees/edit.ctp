<div class="committees form">
<?php echo $this->Form->create('Committee'); ?>
	<fieldset>
		<legend><?php echo __('Edit Committee'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
			echo $this->Form->input('event_id', array(
                    "div" => array(
                        "class" => "controls"
                    ),
                    'label' => 'Evento',
                    "options" => $events,
                    'empty' => "Seleccione un evento"
                    ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>