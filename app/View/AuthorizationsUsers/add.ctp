<?php
echo $this->Html->script(array('jquery.multi-select'));
echo $this->Html->css(array('multi-select'));
?>

<div class="authorizationsUsers form">
<?php echo $this->Form->create('AuthorizationsUser'); ?>
	<fieldset>
		<legend><?php echo __('Asignación de permisos a usuarios para un evento'); ?></legend>
	<?php
		//echo $this->Form->input('user_id');
		//echo $this->Form->input('authorization_id');
		echo $this->Form->input('event_id');
	?>

<!--         <label class="control-label">Usuarios</label>
        <?php
//                    echo $this->Form->input('PersonalDatum');
        ?> -->
        <?php
        echo $this->Form->input('user_id', array(
            "div" => array(
                "class" => "controls"
            ),
            "label" => "usuarios",
            "options" => $users,
            "multiple" => false,
            'empty' => "seleccione un usuario"
        ));
          ?>



	<div class="control-group">
        <label class="control-label">Permisos</label>
        <?php
//                    echo $this->Form->input('PersonalDatum');
        ?>
        <?php
        echo $this->Form->input('authorization_id', array(
            "div" => array(
                "class" => "controls"
            ),
            "label" => "",
            "options" => $authorizations,
            "multiple" => true
        ));
//                    ?>
    </div>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<script>
    $('#AuthorizationsUserAuthorizationId').multiSelect({
        afterSelect: function(values) {
                //alert("Select value: " + values);
//            console.log($('#FormPersonalDatumId option[value="' + values + '"]').html());
            $('#AuthorizationsUserAuthorizationId option[value="' + values + '"]').attr("selected", "selected")
        }
    });

//        $('#AuthorizationsUserUserId').multiSelect({
//         afterSelect: function(values) {
//                 //alert("Select value: " + values);
// //            console.log($('#FormPersonalDatumId option[value="' + values + '"]').html());
//             $('#AuthorizationsUserUserId option[value="' + values + '"]').attr("selected", "selected")
//         }
//     });
$(document).ready(function() {
    $("#AuthorizationsUserUserId").change(function() {
        //alert($("#AuthorizationsUserUserId").val());

        var url = urlbase + "authorizationsUsers/getAuthorizationByUser.xml";
            var datos = {
                user_id: $("#AuthorizationsUserUserId").val()
            };
            ajax(url, datos, function(xml) {
                alert("volvi");
            });   
        });
    });
</script>
