<div class="events form">
    <?php // echo $this->Form->create('Event'); ?>
    <?php echo $this->Form->create('User', array('action' => 'elegirEvento')); ?> 
        <fieldset>
            <legend><?php echo __('Add Event'); ?></legend>
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
            ?>
        </fieldset>
        <!--<input type="submit" value="Siguiente">-->
    <?php echo $this->Form->end(__('Siguiente')); ?>
</div>
<script>
    $("#state_id").change(function() {
        var url2 = urlbase + "cities/getCitiesByState.xml";
        var datos2 = {
            state_id: $(this).val()
        };
        ajax(url2, datos2, function(xml) {
            $("#UserCityId").html("<option>Seleccione una ciudad</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("City");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#UserCityId").append(html);
                }
            });
        });
    });

    $(document).ready(function() {
        $("#UserStateId").html("");
        $("#UserCityId").html("");
        $("#UserCountryId").change(function() {
            var url = urlbase + "states/getStatesByCountry.xml";
            var datos = {
                country_id: $(this).val()
            };
            ajax(url, datos, function(xml) {
                $("#UserStateId").html("<option>Seleccione un Departamento</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("State");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#UserStateId").append(html);
                    }
                });
            });
        });

        $("#UserCityId").change(function() {
            var url2 = urlbase + "stages/getStagesByCity.xml";
            var datos2 = {
                city_id: $(this).val()
            };
            ajax(url2, datos2, function(xml) {
                $("#UserStage_id").html("<option>Seleccione un escenario</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("Stage");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#UserStage_id").append(html);
                    }
                });
            });
        });
    });
</script>