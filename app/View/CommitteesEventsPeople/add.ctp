<div class="committeesEventsPeople form">
<?php echo $this->Form->create('CommitteesEventsPerson'); ?>
	<fieldset>
		<legend><?php echo __('Add Committees Events Person'); ?></legend>
	<?php
		echo $this->Form->input('event_id', array(
                "div" => array(
                    "class" => "controls"
                ),
                'label' => 'Evento',
                "options" => $events,
                'empty' => "Seleccione un evento"
                ));

		
		echo $this->Form->input('committees_event_id', array(
			"div" => array(
                    "class" => "controls"
                ),
                'label' => 'Comites',
                'empty' => "Seleccione un comite"
			));
		echo $this->Form->input('person_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<script>
$(document).ready(function() {
	$("#CommitteesEventsPersonEventId").change(function() {
		// alert($("#CommitteesEventsPersonEventId").val());
		var url = urlbase + "committeesEventsPeople/getCommitteesByEvent.xml";
        var datos = {
                event_id: $("#CommitteesEventsPersonEventId").val()
            };
        ajax(url, datos, function(xml) {
            $("#CommitteesEventsPersonCommitteesEventId").html("<option>Seleccione un Departamento</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("Committee");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#CommitteesEventsPersonCommitteesEventId").append(html);
                }
            });
        });
    });
})
</script>
