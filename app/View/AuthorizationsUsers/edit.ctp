<?php
echo $this->Html->script(array('jquery.multi-select'));
echo $this->Html->css(array('multi-select'));

// echo "<pre>";


// // $this->request->data[0]["AuthorizationsUser"]=


// // array('id'=>10,'user_id'=>6,'authorization_id'=>3,'estado'=>null,'event_id'=>1) 

// // ;

// //array_push($this->request->data[0]["AuthorizationsUser"], array('id'=>10,'user_id'=>5,'authorization_id'=>3,'estado'=>null,'event_id'=>1));


// $array=array();
// //foreach ($this->request->data as  $value) {
//     //debug($value);
//     array_push($array, $this->request->data["Authorization"]);
// //}
// $req["authorization"]=$array;
// //array_push($req["Authorization"], $array);
// $this->request->data[0]["authorization"]=$req["authorization"];

// $this->request->data=$this->request->data[0];
// //var_dump($array);
// var_dump($this->request->data); 
// echo "</pre>";

echo "<pre>";
//var_dump($authorization);
echo "</pre>";


?>

<div class="authorizationsUsers form">
<?php echo $this->Form->create('AuthorizationsUser'); ?>
	<fieldset>
		<legend><?php echo __('Edición de permisos a usuarios para un evento'); ?></legend>

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
            "multiple" => false
        ));
          ?>



	<div class="control-group">
        <label class="control-label">Permisos</label>
        <?php
//                    echo $this->Form->input('PersonalDatum');
        ?>
        <?php
        echo $this->Form->input("Authorization", array(
            "div" => array(
                "class" => "controls"
            ),
            "label" => "",
            "options" => $authorization,
            "multiple" => true
        ));
//                    ?>
    </div>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<script>
    $('#AuthorizationsUserAuthorization').multiSelect({
        afterSelect: function(values) {
                //alert("Select value: " + values);
//                  console.log($('#FormPersonalDatumId option[value="' + values + '"]').html());
            //$('#AuthorizationsUserAuthorizationId option[value="' + values + '"]').attr("selected", "selected")
        }
    });

//        $('#AuthorizationsUserUserId').multiSelect({
//         afterSelect: function(values) {
//                 //alert("Select value: " + values);
// //            console.log($('#FormPersonalDatumId option[value="' + values + '"]').html());
//             $('#AuthorizationsUserUserId option[value="' + values + '"]').attr("selected", "selected")
//         }
//     });
</script>
