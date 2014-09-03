<div class="locations form">
    <?php echo $this->Form->create('Location'); ?>
    <fieldset>
        <legend><?php echo __('Crear Localidad'); ?></legend>
        <?php
        echo $this->Form->input('country_id', array(
            "div" => array(
                "class" => "controls"
            ),
            'label' => 'País',
            "options" => $countriesName,
            "empty" => "Seleccione un País"
        ));
        echo $this->Form->input('state_id', array(
            "div" => array(
                "class" => "controls"
            ),
            "label" => "Departamento",
            "empty" => "seleccione un Departamento"
        ));
        echo $this->Form->input('city_id', array(
            "div" => array(
                "class" => "controls"
            ),
            "label" => "Ciudad",
            "empty" => "seleccione una ciudad"
        ));
        echo $this->Form->input('stage_id', array(
            "div" => array(
                "class" => "controls"
            ),
            "label" => "Escenario",
            "options" => "Stage.esce_nombre",
        ));
        echo $this->Form->input('event_id', array(
            "div" => array(
                "class" => "controls"
            ),
            "label" => "Evento",
            "options" => "Event.even_nombre",
        ));
        echo $this->Form->input('loca_nombre', array(
            "div" => array(
                "class" => "controls"
            ),
            'label' => 'Nombre',
        ));
        echo $this->Form->input('parent_id');
        echo $this->Form->input('loca_fila');
        echo $this->Form->input('loca_colomnna');
        echo $this->Form->input('coord', array("value" => " ", "type" => "hidden"));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<script>
    $("#LocationStateId").change(function() {
        var url2 = urlbase + "cities/getCitiesByState.xml";
        var datos2 = {
            state_id: $(this).val()
        };
        ajax(url2, datos2, function(xml) {
            $("#LocationCityId").html("<option>Seleccione una ciudad</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("City");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#LocationCityId").append(html);
                }
            });
        });
    });
    $(document).ready(function() {
        $("#LocationStateId").html("");
        $("#LocationCityId").html("");
        $("#LocationCountryId").change(function() {
            var url = urlbase + "states/getStatesByCountry.xml";
            var datos = {
                country_id: $(this).val()
            };
            ajax(url, datos, function(xml) {
                $("#LocationStateId").html("<option>Seleccione un Departamento</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("State");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#LocationStateId").append(html);
                    }
                });
            });
        });
    });
    $("#LocationCityId").change(function() {
        var url2 = urlbase + "stages/getStagesByCity.xml";
        var datos2 = {
            city_id: $(this).val()
        };
        ajax(url2, datos2, function(xml) {
            $("#LocationStageId").html("<option>Seleccione un escenario</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("Stage");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#LocationStageId").append(html);
                }
            });
        });
    });
    $("#LocationStageId").change(function() {
        var url2 = urlbase + "events/getEventsByStage.xml";
        var datos2 = {
            stage_id: $(this).val()
        };
        console.log("CAMBIE!");
        ajax(url2, datos2, function(xml) {
            $("#LocationEventId").html("<option>Seleccione un Evento</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("Event");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#LocationEventId").append(html);
                }
            });
        });
    });
</script>