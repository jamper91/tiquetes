<?php
echo $this->Html->script(array('jquery.multi-select', 'jscal2', 'es'));
echo $this->Html->css(array('multi-select', 'jscal2', 'steel', 'border-radius'));
?>
<div class="events form" align="center">
    <?php echo $this->Form->create('Activity'); ?>
    <h1>Editar Actividades</h1>
    <br>
    <table>
        <tr>
            <td>Evento</td>
            <td><?php
                echo $this->Form->input('event_id', array(
                    "div" => array(
                        "class" => "controls"
                    ),
                    'label' => '',
                    "options" => $eventos,
                    "empty" => "Seleccione un Evento",
                    'required' => 'true'
                ));
                ?></td>
            <td>Locación</td>
            <td><?php
                echo $this->Form->input('location_id', array(
                    "div" => array(
                        "class" => "controls"
                    ),
                    'label' => '',
                    "options" => $locaciones,
                    "empty" => "Seleccione una Localidad",
                    'required' => 'true'
                ));
                ?></td>
        </tr>
        <tr>
            <td>Actividad</td>
            <td><?php echo $this->Form->input('nombre', array('label' => '', 'required' => 'true')); ?></td>
            <td>Conferencista</td>
            <td><?php echo $this->Form->input('conferencista', array('label' => '')); ?></td>
        </tr>        
        <tr>
            <td>Día</td>
            <td><?php
                echo $this->Form->input('fecha', array(
                    "div" => array(
                        "class" => "controls"
                    ),
                    'label' => '',
                    "options" => $dias,
                    "empty" => "Seleccione un dia",
                    'required' => 'true'
                ));
                ?></td>
            <td>Hora Inicial</td>
            <td><?php echo $this->Form->input('hora_inicio', array('label' => '')); ?></td>           
        </tr>
        <tr>
            <td>Hora final</td>
            <td><?php echo $this->Form->input('hora_fin', array('label' => '')); ?></td>
            <td>Costo</td>
            <td><?php echo $this->Form->input('costo', array('label' => '', 'required' => 'true')); ?></td>
        </tr>
        <tr>
            <td>Aforo</td>
            <td><?php echo $this->Form->input('aforo', array('label' => '', 'required' => 'true')); ?></td>
            <td>Alerta Aforo</td>
            <td><?php echo $this->Form->input('alerta_aforo', array('label' => '')); ?></td>
        </tr>
        <tr>
            <td colspan="2" align="right">Reingresos </td>
            <td colspan="2" align="left"><?php echo $this->Form->input('reingresos', array('label' => '')); ?></td>
        </tr>
    </table>
    
    <input type="text" name="data[Activity][id]" id="ActivityId" value="<?php echo( $id); ?>" style="display: none" />


    <br>

    <?php echo $this->Form->end('Editar'); ?>
</div>
<script>
    $("#ActivityEventId").change(function() {
        if ($(this).val() !== "") {
            var url4 = urlbase + "events/getLocationsEvent.xml";
            var datos4 = {
                event_id: $(this).val()
            };
            ajax(url4, datos4, function(xml) {
                $("#ActivityLocationId").html("<option>Seleccione una Localidad</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("Location");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#ActivityLocationId").append(html);
                    }
                });
            });
            var url = urlbase + "events/getDaysByEvent.xml";
            ajax(url, datos4, function(xml) {
                $("#ActivityFecha").html("<option>Seleccione un Día</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("g");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#ActivityFecha").append(html);
                    }
                });
            });
        }
    });
    $("#buscar").click(function() {
//            alert("aasd");
        var url = urlbase + "companies/search.xml";
        var datos = {
            documento: $("#ActivityDocumento").val()
        };
        ajax(url, datos, function(xml) {
            $("datos", xml).each(function() {
                var obj = $(this).find("Person");
                var nombre, apellido, id;
                id = $("id", obj).text();
                nombre = $("pers_primNombre", obj).text();
                apellido = $("pers_primApellido", obj).text();
                if (nombre !== "") {
                    $("#person_id").val(id);
                    $("#ActivityNombres").val(nombre);
                    $("#ActivityApellidos").val(apellido);
                } else {
                    $("#person_id").val("");
                    $("#ActivityNombres").val("");
                    $("#ActivityApellidos").val("");
                    alert("No se encuentra una persona registrada con ese número de documento");
                }
            });
        });
    });
</script>