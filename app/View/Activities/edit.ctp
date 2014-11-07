<?php
echo $this->Html->script(array('jquery.multi-select', 'jscal2', 'es'));
echo $this->Html->css(array('multi-select', 'jscal2', 'steel', 'border-radius'));
?>
<div class="events form" align="center">
    <?php echo $this->Form->create('Activity'); ?>
    <h1>Crear Actividades</h1>
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
                    'required'=>'true'
                ));
                ?></td>            
            <td>Lugar</td>
            <td><?php echo $this->Form->input('locacion', array ('label' => '', 'required'=>'true')); ?></td>
        </tr>
        <tr>
            <td>Actividad</td>
            <td><?php echo $this->Form->input('nombre', array('label' => '', 'required'=>'true')); ?></td>
            <td>Descripción</td>
            <td><?php echo $this->Form->input('descripcion', array('label' => '')); ?></td>
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
                    "empty" => "Seleccione un día",
                    'required'=>'true'
                ));
                ?></td>   
            <td>Hora inicial</td>
           <td><?php echo $this->Form->input('hora_inicio', array('label' => '', 'placeholder'=>'HH:MM')); ?></td>           
        </tr>
        <tr>
            <td>Hora final</td>
            <td><?php echo $this->Form->input('hora_fin', array('label' => '', 'placeholder'=>'HH:MM')); ?></td>
            <td>Observaciones</td>
            <td><?php echo $this->Form->input('observaciones', array('label' => '')); ?></td>
        </tr>
        <tr>
            <td>Aforo</td>
            <td><?php echo $this->Form->input('aforo', array('label' => '', 'required'=>'true')); ?></td>
            <td>Alerta Aforo</td>
            <td><?php echo $this->Form->input('alerta_aforo', array('label' => '')); ?></td>
        </tr>
        <tr>
            <td>Reingresos </td>
            <td><?php echo $this->Form->input('reingresos', array('label' => '')); ?></td>
            <td>Calcular permanencia </td>
            <td><?php echo $this->Form->input('permanencia', array('label' => '')); ?></td>
        </tr>
    </table>
    
    <input type="text" name="data[Activity][id]" id="ActivityId" value="<?php echo( $id); ?>" style="display: none" />

    <br>

    <?php echo $this->Form->end('Crear'); ?>
</div>
<script>
    $("#ActivityEventId").change(function() {
        if ($(this).val() !== "") {
            var datos4 = {
                event_id: $(this).val()
            };            
            var url = urlbase + "events/getDaysByEvent.xml";
            ajax(url, datos4, function(xml) {
                $("#ActivityFecha").html("<option value =''>Seleccione un Día</option>");
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
    
</script>