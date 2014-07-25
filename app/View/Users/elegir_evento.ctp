<?php
echo $this->Html->script(array('jquery.multi-select'));
echo $this->Html->css(array('multi-select'));
?>
<div class="users form">
<?php echo $this->Form->create('User', array('action' => 'elegirEvento')); ?> 
	<fieldset>
       <legend><?php echo __('Elegir evento'); ?></legend>
        <table>
            <tr>
            	<td><?php echo 'Evento'; ?></td>
                <td><?php
                    echo $this->Form->input('event_id', array(
                        'label' => '',
                        "options" => $eventos,
                        "empty" => "Seleccione un evento"
                    ));
                    ?>
                </td>
            </tr>
        </table>
        <?php echo $this->Form->end(__('Siguiente')); ?>
    </fieldset>
</div>


<script>
// $(document).ready(function(){
// 	$("#UserEventId").change(function() {
// 		var url3 = urlbase + "users/add2.xml";
		
// 		var datos3={
// 			evento: $(this).val()};
// 		alert(datos3.evento);
		
// 		 ajax(url3, datos3, function(xml) {
		 	
// 		 });
// 	});
// });

</script>