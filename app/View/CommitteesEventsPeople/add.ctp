<div class="committeesEventsPeople form">
    <form method="POST" action="contar" id="Committee" name="Committee" enctype="multipart/form-data">
    	<fieldset>
    		<legend><?php echo __('Conformar comité'); ?></legend>
    	<?php
    		echo $this->Form->input('event_id', array(
                    "div" => array(
                        "class" => "controls"
                    ),
                    'label' => 'Evento',
                    "options" => $events,
                    'empty' => "Seleccione un evento"
                    ));

    		
    		echo $this->Form->input('committees_id', array(
    			"div" => array(
                        "class" => "controls"
                    ),
                    'label' => 'Comites',
                    'empty' => "Seleccione un comite"
    			));
    		echo $this->Form->input('cantidad', array('label' => 'Numero de personas'));
    	?>
    	</fieldset>
        <input type="submit">
    </form>
</div>
<script>
$(document).ready(function() {
	$("#event_id").change(function() {
		var url = urlbase + "committeesEventsPeople/getCommitteesByEvent.xml";
        var datos = {
                event_id: $("#event_id").val()
            };
        ajax(url, datos, function(xml) {
            $("#committees_id").html("<option>Seleccione un Comité</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("Committee");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#committees_id").append(html);
                }
            });
        });
    });
})
</script>
