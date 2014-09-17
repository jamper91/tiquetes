 <div class="categoriasEntradas form">
    <?php echo $this->Form->create('Entrada'); ?>
    <fieldset>
        <legend><?php echo __('Reportes'); ?></legend><br>

<!--        <div class="btn-group">
            <button data-toggle="dropdown" class="btn btn-success dropdown-toggle">Exportar <span class="caret"></span></button>
            <ul class="dropdown-menu">-->
<!--                <li><a href="<?= $this->Html->url("exportar") ?>">Reportes Generales</a></li>
                <li><a href="<?= $this->Html->url("exportar2") ?>">Reportes Usuarios</a></li>
                <li><a href="<?= $this->Html->url("exportar3") ?>">Reportes Ventas</a></li>
                <li><a href="<?= $this->Html->url("exportar4") ?>">Reportes Registro</a></li>-->
                <li><a href="<?= $this->Html->url("exportar5") ?>">Reporte Ingreso Detallado</a></li>
            <!--</ul>-->
        </div>
<!--        <table>
        <tr>
            <td>
        <?php
//                    echo $this->Form->input('country_id', array(
//                        "div" => array(
//                            "class" => "controls"
//                        ),
//                        'label' => 'País',
//                        "options" => $countriesName,
//                        "empty" => "Seleccione un País"
//                    ));
        ?>
            </td>
            <td>
        <?php
//                    echo $this->Form->input('state_id', array(
//                        "div" => array(
//                            "class" => "controls"
//                        ),
//                        "label" => "Departamento",
//                        "empty" => "seleccione un Departamento"
//                    ));
        ?>
            </td>
            <td>
        <?php
//                    echo $this->Form->input('city_id', array(
//                        "div" => array(
//                            "class" => "controls"
//                        ),
//                        "label" => "Ciudad",
//                        "empty" => "seleccione una ciudad"
//                    ));
        ?>
            </td>
        </tr>
        <tr>
            <td>
        <?php
//                    echo $this->Form->input('stage_id', array(
//                        "div" => array(
//                            "class" => "controls"
//                        ),
//                        "label" => "Escenario",
//                        "options" => "Stage.esce_nombre",
//                    ));
        ?>
            </td>
            <td>
        <?php
//                    echo $this->Form->input('event_id', array(
//                        "div" => array(
//                            "class" => "controls"
//                        ),
//                        "label" => "Evento",
//                        "options" => "event.even_nombre",
//                    ));
        ?>
            </td>
            <td>
        <?php
//                        echo $this->Form->input('entrada_id');
        ?>
            </td>
        </tr>
    </table>-->

        <label id="mensaje"></label>
    </fieldset>
    <!--<input type="button" id="consultar" name="registrar" value="Consultar">-->
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
    (function()
    {
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
    })();
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


<!--<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>-->
<!--<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>-->
<!--<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>-->
<?php
echo $this->Html->script(array("highcharts"));
?>

<?php
$pos = 0;
for ($index = 0; $index < count($datos); $index++) {
    $dato = $datos[$index];
    //Tomo la fecha y el tipo
    $fecha = $dato["Entrada"]["Fecha"];
    $tipo = $dato["Entrada"]["Tipo"];

    $cantidadI = 0;
    $cantidadR = 0;
    switch ($tipo) {
        case "RECHAZO":
            $tipo = "INGRESO";
            $cantidadR = $dato["Entrada"]["Cantidad"];
            break;
        case "INGRESO":
            $tipo = "RECHAZO";
            $cantidadI = $dato["Entrada"]["Cantidad"];
            break;
    }

    //Ahora busco el opuesto de este
    $esta = false;
    for ($index1 = $index + 1; $index1 < count($datos); $index1++) {
        $d = $datos[$index1];
        $fecha1 = $d["Entrada"]["Fecha"];
        $tipo1 = $d["Entrada"]["Tipo"];
        if ($tipo1 == $tipo && $fecha1 == $fecha) {
            $esta = true;
            $index++;
            switch ($tipo1) {
                case "RECHAZO":
                    $cantidadR = $d["Entrada"]["Cantidad"];
                    break;
                case "INGRESO":
                    $cantidadI = $d["Entrada"]["Cantidad"];
                    break;
            }
            break;
        }
    }
    if (!$esta) {
        switch ($tipo) {
            case "RECHAZO":
                $cantidadR = 0;
                break;
            case "INGRESO":
                $cantidadI = 0;
                break;
        }
    }
    $fecha2 = explode("-", $fecha);
    $mons = array(1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec");
    $fecha = $mons[$fecha2[0]] . " - " . $fecha2[1];
    ?>
    <div id="container<?= $pos ?>" style="min-width: 40%; height: 400px; max-width: 40%; margin: 0 auto; display: inline-block"></div>

    <script>
        $(function() {
            $('#container<?= $pos ?>').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: 1, //null,
                    plotShadow: false
                },
                title: {
                    text: 'Estadisticas <?= $fecha ?>'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y}</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.y} ',
                            //                    format: '<b>{point.name}</b>: {point.percentage:.1f} ',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    }
                },
                series: [{
                        type: 'pie',
                        name: 'Usuarios',
                        data: [
                            ['Rechazos', <?php echo $cantidadR ?>],
                            ['Ingresos', <?php echo $cantidadI ?>]
                        ]
                    }]
            });
        });

    </script>
    <?php
    $pos++;
}
?>
<!--



<p>Entradas <?php echo $salidas ?></p>-->