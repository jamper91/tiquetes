<div class="inputs form">
    <?php echo $this->Form->create('Input'); ?>
    <fieldset>
        <legend><?php echo __('Crear Entrada'); ?></legend>
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
        echo $this->Form->input('even_id', array(
            "div" => array(
                "class" => "controls"
            ),
            "label" => "Evento",
            "options" => "Event.even_nombre",
        ));
        echo $this->Form->input('categoria_id', array(
            "div" => array(
                "class" => "controls"
            ),
            "label" => "Tipo de Entrada",
            "options" => "Categoria.descripcion"
        ));
        echo $this->Form->input('entr_codigo', array(
            "div" => array(
                "class" => "controls"
            ),
            "label" => "Tarjeta",
            "value" => ""
        ));
        ?>
        <label id="mensaje"></label>
    </fieldset>
    <?php echo $this->Form->end(__('Crear')); ?>
</div>
<script>
    $(document).ready(function() {
         
            document.getElementById("InputEntrCodigo").disabled = true;
       
          $("#InputAddForm").submit(function(e){
              return false;
          });
        $("#InputCategoriaId").change(function(){            
           document.getElementById("InputEntrCodigo").disabled = false;
        });
        $("input[id='InputEntrCodigo']").on('input', function(e) {
            if ($('#InputEntrCodigo').val().length === 10) {
                var url = "<?= $this->Html->url(array("action" => "registerInput.xml")) ?>";
                ajax(url, $('#InputAddForm').serialize(), function(xml){
                 $("datos", xml).each(function() {
                var valor, texto;
                valor = $("codigo", this).text();
                texto = $("mensaje", this).text();
                $("#InputEntrCodigo").val("");
                $("#mensaje").text(texto);
                
            });
                });
                //$.post(url, $('#InputAddForm').serialize());
            }
        });
    });

</script>
<script>

    $("#InputStateId").change(function() {
        var url2 = urlbase + "cities/getCitiesByState.xml";
        var datos2 = {
            state_id: $(this).val()
        };
        ajax(url2, datos2, function(xml) {
            $("#InputCityId").html("<option>Seleccione una ciudad</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("City");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#InputCityId").append(html);
                }
            });
        });
    });

    $(document).ready(function() {
        $("#InputStateId").html("");
        $("#InputCityId").html("");
        $("#InputCountryId").change(function() {
            var url = urlbase + "states/getStatesByCountry.xml";
            var datos = {
                country_id: $(this).val()
            };
            ajax(url, datos, function(xml) {
                $("#InputStateId").html("<option>Seleccione un Departamento</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("State");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#InputStateId").append(html);
                    }
                });
            });
        });
    });
    
    $("#InputCityId").change(function() {
        var url2 = urlbase + "stages/getStagesByCity.xml";
        var datos2 = {
            city_id: $(this).val()
        };
        ajax(url2, datos2, function(xml) {       
            $("#InputStageId").html("<option>Seleccione un escenario</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("Stage");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#InputStageId").append(html);
                }
            });
        });
    });
    
    $("#InputStageId").change(function() {
        var url2 = urlbase + "events/getEventsByStage.xml";
        var datos2 = {
            stage_id: $(this).val()
        };
        ajax(url2, datos2, function(xml) {       
            $("#InputEvenId").html("<option>Seleccione un Evento</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("Event");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#InputEvenId").append(html);
                }
            });
        });
    });
    
    $("#InputEvenId").change(function() {
        var url2 = urlbase + "categorias/getCategoriesByEvent.xml";
        var datos2 = {
            even_id: $(this).val()
        };
        ajax(url2, datos2, function(xml) {       
            $("#InputCategoriaId").html("<option>Seleccione una Categoria</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("Categoria");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#InputCategoriaId").append(html);
                }
            });
        });
    });
</script>

