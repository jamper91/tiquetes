<?php
echo $this->Html->script(array('jquery.multi-select'));
echo $this->Html->css(array('multi-select'));
?>
<div class="events form">
    <?php // echo $this->Form->create('Event'); ?>
    <form method="POST" action="add" id="Event" name="Event" enctype="multipart/form-data">
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
            echo $this->Form->input('event_type_id', array(
                "div" => array(
                    "class" => "controls"
                ),
                "label" => "Tipo de Evento",
                "options" => $eventTypesName,
                "empty" => "Seleccione Tipo de Evento"
            ));
//        echo $this->Form->input('event_type_id');
            echo $this->Form->input('even_nombre');
            echo $this->Form->input('even_numeResolucion');
            echo $this->Form->input('even_palaClave');
            echo $this->Form->input('even_observaciones');
            echo $this->Form->input('even_estado');

//            echo $this->Form->input('even_imagen1');
            echo $this->Form->input('even_imagen1', array('type' => 'file', 'label' => 'Imagen 1'));
//            echo $this->Form->input('even_imagen2');
            echo $this->Form->input('even_imagen2', array('type' => 'file', 'label' => 'Imagen 2'));

            echo $this->Form->input('even_fechInicio');
            echo $this->Form->input('even_fechFinal');
            echo $this->Form->input('even_publicar');
            echo $this->Form->input('even_codigo');
//            echo $this->Form->input('Committee');
//            echo $this->Form->input('Company');
//            echo $this->Form->input('Hotel');
            ?>
            <!--id="EventsCommittee"-->
            <div class="control-group" >
                <label class="control-label">Comites</label>
                <?php
                echo $this->Form->input('Committee', array(
                    "div" => array(
                        "class" => "controls"
                    ),
                    "label" => "",
                    "options" => $committees,
                    "multiple" => true
                ));
//                    
                ?>
            </div>
            <!--id="EventsCompany"-->
            <div class="control-group" >
                <label class="control-label">Empresas</label>
                <?php
                echo $this->Form->input('Company', array(
                    "div" => array(
                        "class" => "controls"
                    ),
                    "label" => "",
                    "options" => $companies,
                    "multiple" => true
                ));
//                    
                ?>
            </div>
            <!--id="EventsHotel"-->
            <div class="control-group" >
                <label class="control-label">Hoteles</label>
                <?php
                echo $this->Form->input('Hotel', array(
                    "div" => array(
                        "class" => "controls"
                    ),
                    "label" => "",
                    "options" => $hotels,
                    "multiple" => true
                ));
//                    
                ?>
            </div>
            <!--id="EventsPayment"-->
            <div class="control-group"  >
                <label class="control-label">Medios de Pago</label>
                <?php
                echo $this->Form->input('Payment', array(
                    "div" => array(
                        "class" => "controls"
                    ),
                    "label" => "",
                    "options" => $paymentsName,
                    "multiple" => true
                ));
//                    
                ?>
            </div>
            <?php
//            echo $this->Form->input('Payment');
            echo $this->Form->input('RegistrationType');
            ?>
        </fieldset>
        <input type="submit">
    </form>
<?php // echo $this->Form->end(__('Submit'));  ?>
</div>
<script>

    $("#state_id").change(function() {
        var url2 = urlbase + "cities/getCitiesByState.xml";
        var datos2 = {
            state_id: $(this).val()
        };
        ajax(url2, datos2, function(xml) {
            $("#city_id").html("<option>Seleccione una ciudad</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("City");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#city_id").append(html);
                }
            });
        });
    });

    $(document).ready(function() {
        $("#state_id").html("");
        $("#city_id").html("");
        $("#country_id").change(function() {
            var url = urlbase + "states/getStatesByCountry.xml";
            var datos = {
                country_id: $(this).val()
            };
            ajax(url, datos, function(xml) {
                $("#state_id").html("<option>Seleccione un Departamento</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("State");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#state_id").append(html);
                    }
                });
            });
        });

        $("#city_id").change(function() {
            var url2 = urlbase + "stages/getStagesByCity.xml";
            var datos2 = {
                city_id: $(this).val()
            };
            ajax(url2, datos2, function(xml) {
                $("#stage_id").html("<option>Seleccione un escenario</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("Stage");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#stage_id").append(html);
                    }
                });
            });
        });
    });
    $('#Payment').multiSelect({
        afterSelect: function(values) {
              //  alert("Select value: " + values);
//            console.log($('#FormPersonalDatumId option[value="' + values + '"]').html());
            $('#Payment option[value="' + values + '"]').attr("selected", "selected")
        }
    });//
    $('#Committee').multiSelect({
        afterSelect: function(values) {
              //  alert("Select value: " + values);
//            console.log($('#FormPersonalDatumId option[value="' + values + '"]').html());
            $('#Committee option[value="' + values + '"]').attr("selected", "selected")
        }
    });
    $('#Company').multiSelect({
        afterSelect: function(values) {
              //  alert("Select value: " + values);
//            console.log($('#FormPersonalDatumId option[value="' + values + '"]').html());
            $('#Company option[value="' + values + '"]').attr("selected", "selected")
        }
    });
    $('#Hotel').multiSelect({
        afterSelect: function(values) {
              //  alert("Select value: " + values);
//            console.log($('#FormPersonalDatumId option[value="' + values + '"]').html());
            $('#Hotel option[value="' + values + '"]').attr("selected", "selected")
        }
    });
</script>
