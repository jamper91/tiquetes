<div class="categoriasEntradas form">
    <?php echo $this->Form->create('Entrada'); ?>
    <fieldset>
        <legend><?php echo __('Reportes'); ?></legend>
        <table>
            <tr>
                <td>
                    <?php
                    echo $this->Form->input('country_id', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        'label' => 'País',
                        "options" => $countriesName,
                        "empty" => "Seleccione un País"
                    ));
                    ?>
                </td>
                <td>
                    <?php
                    echo $this->Form->input('state_id', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        "label" => "Departamento",
                        "empty" => "seleccione un Departamento"
                    ));
                    ?>
                </td>
                <td>
                    <?php
                    echo $this->Form->input('city_id', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        "label" => "Ciudad",
                        "empty" => "seleccione una ciudad"
                    ));
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    echo $this->Form->input('stage_id', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        "label" => "Escenario",
                        "options" => "Stage.esce_nombre",
                    ));
                    ?>
                </td>
                <td>
                    <?php
                    echo $this->Form->input('event_id', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        "label" => "Evento",
                        "options" => "event.even_nombre",
                    ));
                    ?>
                </td>
                <td>
                    <?php
                        echo $this->Form->input('entrada_id');
                    ?>
                </td>
            </tr>
        </table>

        <label id="mensaje"></label>
    </fieldset>
    <input type="button" id="consultar" name="registrar" value="Consultar">
</div>
<div class="mensaje"></div>
<script>
    $("#EntradaEventId").change(function() {
        var url2 = urlbase + "categorias/getCategoriesByEvent.xml";
        var datos2 = {
            even_id: $(this).val()
        };
        ajax(url2, datos2, function(xml) {
            $("#EntradaCategoriaId").html("<option>Seleccione una categoria</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("Categoria");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#EntradaCategoriaId").append(html);
                }
            });
            var url = urlbase + "entradas/getEntradasByStage.xml";
            var datos = {
                stage_id: $("#EntradaStageId").val()
            };
            ajax(url, datos, function(xml2) {
                $("#EntradaEntradaId").html("<option>Seleccione una entrada</option>");
                $("datos", xml2).each(function() {
                    var obj = $(this).find("Entrada");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#EntradaEntradaId").append(html);
                    }
                });
            });
        });

    });
    $("#EntradaStageId").change(function() {
        var url2 = urlbase + "events/getEventsByStage.xml";
        var datos2 = {
            stage_id: $(this).val()
        };
        ajax(url2, datos2, function(xml2) {
            $("#EntradaEventId").html("<option>Seleccione un evento</option>");
            $("datos", xml2).each(function() {
                var obj = $(this).find("Event");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#EntradaEventId").append(html);
                }
            });
        });
    });
    $("#EntradaCityId").change(function() {
        var url2 = urlbase + "stages/getStagesByCity.xml";
        var datos2 = {
            city_id: $(this).val()
        };
        ajax(url2, datos2, function(xml) {
            $("#EntradaStageId").html("<option>Seleccione un escenario</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("Stage");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#EntradaStageId").append(html);
                }
            });
        });
    });
    $("#EntradaStateId").change(function() {
        var url2 = urlbase + "cities/getCitiesByState.xml";
        var datos2 = {
            state_id: $(this).val()
        };
        ajax(url2, datos2, function(xml) {
            $("#EntradaCityId").html("<option>Seleccione una ciudad</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("City");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#EntradaCityId").append(html);
                }
            });
        });
    });
    $("input[id='consultar']").on('click', function(e) {
        var url = "<?= $this->Html->url(array("action" => "obtenerReporte.xml")) ?>";
        var html = '<div class="widget-box">' +
                '<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>' +
                '    <h5>Estadisticas</h5>' +
                '</div>' +
                '<div class="widget-content nopadding">' +
                '    <table class="table table-bordered data-table">' +
                '        <thead>' +
                '            <tr>' +
                '                <th>Cantidad</th>' +
                '                <th>Tipo</th>' +
                '            </tr>' +
                '        </thead>' +
                '        <tbody>';
        ajax(url, $('#EntradaReportesForm').serialize(), function(xml) {
            $("datos", xml).each(function() {

                var obj = $(this).find("Entrada");
                var cantidad, tipo;
                cantidad = $("Cantidad", obj).text();
                tipo = $("Tipo", obj).text();
                html += "<tr>";
                html += "<td>";
                html += cantidad;
                html += "</td>";
                html += "<td>";
                html += tipo;
                html += "</td>";
                html += "</tr>";
                console.log("html: " + html);

            });
            html += "</tbody></table>";
            $("#mensaje").html(html);
        });

        //$.post(url, $('#InputAddForm').serialize());

    });
    $(document).ready(function() {
        $("#EntradaReportesForm").submit(function(e) {
            return false;
        });
        $("#EntradaStateId").html("");
        $("#EntradaCityId").html("");
        $("#EntradaEntradaId").html("");
        $("#EntradaCategoriaId").html("");
        $("#EntradaCountryId").change(function() {
            var url = urlbase + "states/getStatesByCountry.xml";
            var datos = {
                country_id: $(this).val()
            };
            ajax(url, datos, function(xml) {
                $("#EntradaStateId").html("<option>Seleccione un Departamento</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("State");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#EntradaStateId").append(html);
                    }
                });
            });
        });
    });
</script>
