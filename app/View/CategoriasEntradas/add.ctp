<div class="categoriasEntradas form">
    <?php echo $this->Form->create('CategoriasEntrada'); ?>
    <fieldset>
        <legend><?php echo __('Agregar Categorias a una Entrada'); ?></legend>
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
            "options" => "event.even_nombre",
        ));
        echo $this->Form->input('categoria_id', array(
            'label' => 'Categorias',
//                    "options"=>"Categoria.descripcion",
            "empty" => "Seleccione una categoria"
        ));
        echo $this->Form->input('entrada_id');?>
         <label id="mensaje"></label>
    </fieldset>
    <input type="submit" id="registrar" name="registrar" value="Registrar">
</div>
<div class="actions"></div>
<script>
    $("#CategoriasEntradaEventId").change(function() {
        var url2 = urlbase + "categorias/getCategoriesByEvent.xml";
        var datos2 = {
            even_id: $(this).val()
        };
        ajax(url2, datos2, function(xml) {
            $("#CategoriasEntradaCategoriaId").html("<option>Seleccione una categoria</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("Categoria");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#CategoriasEntradaCategoriaId").append(html);
                }
            });
            var url = urlbase + "entradas/getEntradasByStage.xml";
            var datos = {
                stage_id: $("#CategoriasEntradaStageId").val()
            };
            ajax(url, datos, function(xml2) {
                $("#CategoriasEntradaEntradaId").html("<option>Seleccione una entrada</option>");
                $("datos", xml2).each(function() {
                    var obj = $(this).find("Entrada");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#CategoriasEntradaEntradaId").append(html);
                    }
                });
            });
        });

    });
    $("#CategoriasEntradaStageId").change(function() {
        var url2 = urlbase + "events/getEventsByStage.xml";
        var datos2 = {
            stage_id: $(this).val()
        };
        ajax(url2, datos2, function(xml2) {
            $("#CategoriasEntradaEventId").html("<option>Seleccione un evento</option>");
            $("datos", xml2).each(function() {
                var obj = $(this).find("Event");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#CategoriasEntradaEventId").append(html);
                }
            });
        });
    });
    $("#CategoriasEntradaCityId").change(function() {
        var url2 = urlbase + "stages/getStagesByCity.xml";
        var datos2 = {
            city_id: $(this).val()
        };
        ajax(url2, datos2, function(xml) {
            $("#CategoriasEntradaStageId").html("<option>Seleccione un escenario</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("Stage");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#CategoriasEntradaStageId").append(html);
                }
            });
        });
    });
    $("#CategoriasEntradaStateId").change(function() {
        var url2 = urlbase + "cities/getCitiesByState.xml";
        var datos2 = {
            state_id: $(this).val()
        };
        ajax(url2, datos2, function(xml) {
            $("#CategoriasEntradaCityId").html("<option>Seleccione una ciudad</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("City");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#CategoriasEntradaCityId").append(html);
                }
            });
        });
    });
    $("input[id='registrar']").on('click', function(e) {
        var url = "<?= $this->Html->url(array("action" => "registerCategoriasEntradas.xml")) ?>";
        ajax(url, $('#CategoriasEntradaAddForm').serialize(), function(xml) {
            $("datos", xml).each(function() {
                var texto;                
                texto = $("mensaje", this).text();                
                $("#mensaje").text(texto);

            });
        });
        //$.post(url, $('#InputAddForm').serialize());

    });
    $(document).ready(function() {
        $("#CategoriasEntradaAddForm").submit(function(e) {
            return false;
        });
        $("#CategoriasEntradaStateId").html("");
        $("#CategoriasEntradaCityId").html("");
        $("#CategoriasEntradaEntradaId").html("");
        $("#CategoriasEntradaCategoriaId").html("");
        $("#CategoriasEntradaCountryId").change(function() {
            var url = urlbase + "states/getStatesByCountry.xml";
            var datos = {
                country_id: $(this).val()
            };
            ajax(url, datos, function(xml) {
                $("#CategoriasEntradaStateId").html("<option>Seleccione un Departamento</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("State");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#CategoriasEntradaStateId").append(html);
                    }
                });
            });
        });
    });
</script>
