<?php
echo $this->Html->script(array('jquery.multi-select'));
echo $this->Html->css(array('multi-select'));

?>

<div class="authorizationsUsers form">
    <?php echo $this->Form->create('AuthorizationsUser'); ?>
    	<fieldset>
    		<legend><?php echo __('Edición de permisos a usuarios para un evento'); ?></legend>

    	<?php
    		echo $this->Form->input('event_id');
    	?>

        <?php
            echo $this->Form->input('user_id', array(
                "div" => array(
                    "class" => "controls"
                ),
                "label" => "usuarios",
                "options" => $users,
                "multiple" => false
            ));
          ?>

    	<div class="control-group">
            <label class="control-label">Permisos</label>
            <?php
                echo $this->Form->input("Authorization", array(
                    "div" => array(
                        "class" => "controls"
                    ),
                    "label" => "",
                    "options" => $authorization,
                    "multiple" => true
                ));
            ?>
        </div>
    	</fieldset>
    <?php echo $this->Form->end(__('Enviar')); ?>
</div>
<script>
    $('#AuthorizationsUserAuthorization').multiSelect({
        afterSelect: function(values) {
        }
    });
</script>
