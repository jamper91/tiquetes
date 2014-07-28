<div class="hotels form">
    <?php echo $this->Form->create('Hotel'); ?>
    <fieldset>
        <legend><?php echo __('Add Hotel'); ?></legend>
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
        echo $this->Form->input('hote_nombre', array('label' => 'nombre'));
        echo $this->Form->input('hote_mit', array('label' => 'Nit'));
        echo $this->Form->input('hote_direccion', array('label' => 'Direccion'));
        echo $this->Form->input('hote_telefono', array('label' => 'Telefono'));
        echo $this->Form->input('hote_email', array('label' => 'Email'));
        echo $this->Form->input('hote_pagiWeb', array('label' => 'Pagina Web'));
//        echo $this->Form->input('Event');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<script>

    $("#HotelStateId").change(function() {
        var url2 = urlbase + "cities/getCitiesByState.xml";
        var datos2 = {
            state_id: $(this).val()
        };
        ajax(url2, datos2, function(xml) {
            $("#HotelCityId").html("<option>Seleccione una ciudad</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("City");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#HotelCityId").append(html);
                }
            });
        });
    });

    $(document).ready(function() {
        $("#HotelStateId").html("");
        $("#HotelCityId").html("");
        $("#HotelCountryId").change(function() {
            var url = urlbase + "states/getStatesByCountry.xml";
            var datos = {
                country_id: $(this).val()
            };
            ajax(url, datos, function(xml) {
                $("#HotelStateId").html("<option>Seleccione un Departamento</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("State");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#HotelStateId").append(html);
                    }
                });
            });
        });
    });
    </script>
