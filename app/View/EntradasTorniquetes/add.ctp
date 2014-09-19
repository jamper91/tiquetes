<?php
echo $this->Html->script(array('jquery.multi-select', 'jscal2', 'es'));
echo $this->Html->css(array('multi-select', 'jscal2', 'steel', 'border-radius'));
?>
<div class="entradasTorniquetes form">
    <?php echo $this->Form->create('EntradasTorniquete', array('enctype' => 'multipart/form-data')); ?>
    <fieldset>
        <legend><?php echo __('Agregar Accesos a una entrada '); ?></legend>
        <table>
            <tr>
                <td>
                    <?php
                    echo $this->Form->input('stage_id', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        "label" => "Escenario",
                        "options" => $stages, //"Stage.esce_nombre",
                        "empty" => "seleccione un escenario",
                        'required' => 'true'
                    ));
                    ?>
                </td>
            </tr>
            <tr><td><?php echo $this->Form->input('entrada_id', array('label' => 'Entrada','required' => 'true')); ?></td></tr>
            <tr><td><?php echo $this->Form->input('torniquete_id', array('label' => 'Puntos de acceso','required' => 'true')); ?></td></tr>
<!--            <tr>
                <td>
                    id="EventsCategorias"
                    <div class="control-group"  >
                        <label class="control-label">Puntos de acceso</label>
            <?php
//                        echo $this->Form->input('torniquete_id', array(
//                            "div" => array(
//                                "class" => "controls"
//                            ),
//                            "label" => "",
////                           "options" => $torniquetes,
//                            "multiple" => true
//                        ));
////                    
            ?>
                    </div>
            <?php
            ?>
                </td>
                <td></td>
                <td>
                    id="EventsHotel"

            <?php
            ?>
                </td>
            </tr>-->
        </table>
        <?php
//        echo $this->Form->input('torniquete_id');
        ?>

    </fieldset>
    <?php echo $this->Form->end(__('Agregar')); ?>
</div>
<div class="actions"></div>
<script>
    $("#EntradasTorniqueteStageId").change(function() {
        var url2 = urlbase + "entradas/getEntradasByStage.xml";
        var datos2 = {
            stage_id: $(this).val()
        };
        ajax(url2, datos2, function(xml) {
            $("#EntradasTorniqueteEntradaId").html("<option>Seleccione un escenario</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("Entrada");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#EntradasTorniqueteEntradaId").append(html);
                }
            });
        });

    });
    $("#EntradasTorniqueteStageId").change(function() {
        var url2 = urlbase + "torniquetes/getTorniquetesByStage.xml";
        var datos2 = {
            stage_id: $(this).val()
        };
        ajax(url2, datos2, function(xml) {
            $("#EntradasTorniqueteTorniqueteId").html("<option>Seleccione un punto de acceso</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("Torniquete");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#EntradasTorniqueteTorniqueteId").append(html);
                }

            });
        });

    });
//    $('#EntradasTorniqueteTorniqueteId').multiSelect({
//        afterSelect: function(values) {
//            //  alert("Select value: " + values);
////            console.log($('#FormPersonalDatumId option[value="' + values + '"]').html());
//            $('#EntradasTorniqueteTorniqueteId option[value="' + values + '"]').attr("selected", "selected")
//        }
//    });
</script>