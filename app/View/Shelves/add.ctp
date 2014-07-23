<div class="shelves form">
    <?php echo $this->Form->create('Shelf'); ?>
    <fieldset>
        <legend><?php echo __('Crear Estan'); ?></legend>
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
        echo $this->Form->input('location_id', array(
            "div" => array(
                "class" => "controls"
            ),
            "label" => "Escenario",
            "empty" => "seleccione un escenario"
        ));
        echo $this->Form->input('esta_nombre');
        echo $this->Form->input('esta_estado');
        echo $this->Form->input('esta_precio');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<script>
    
    $("#ShelfStateId").change(function() {
        var url2 = urlbase + "cities/getCitiesByState.xml";
        var datos2 = {
            state_id: $(this).val()
        };
        ajax(url2, datos2, function(xml) {
            $("#ShelfCityId").html("<option>Seleccione una ciudad</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("City");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#ShelfCityId").append(html);
                }
            });
        });
    });
    
    $("#ShelfCityId").change(function() {
        var url2 = urlbase + "stages/getStagesByCity.xml";
        var datos2 = {
            city_id: $(this).val()
        };
        ajax(url2, datos2, function(xml) {
            $("#ShelfLocationId").html("<option>Seleccione un escenario</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("Stage");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#ShelfLocationId").append(html);
                }
            });
        });
    });
    
    $(document).ready(function() {

        $("#ShelfStateId").html("");
        $("#ShelfCityId").html("");
        $("#ShelfLocationId").html("");
        $("#ShelfCountryId").change(function() {
            var url = urlbase + "states/getStatesByCountry.xml";
            var datos = {
                country_id: $(this).val()
            };
            ajax(url, datos, function(xml) {
                $("#ShelfStateId").html("<option>Seleccione un Departamento</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("State");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#ShelfStateId").append(html);
                    }
                });
            });
        });
    });
</script>

