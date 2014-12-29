<div class="categoriasEntradas form" align="center">
    <?php echo $this->Form->create('Entrada'); ?>
    <fieldset>
        <legend><?php echo __('Reportes'); ?></legend><br>
        <table><tr>
                <td>Evento</td>
                <td><?php
                    echo $this->Form->input('event_id', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        "label" => "",
                        "options" => $events,
                        "empty" => "Seleccione un Evento",
                        "required" => "true",
                        "style" => array(
                            "display:block"
                        )
                    ));
                    ?>
                </td>
                <td>Reporte</td>
                <td>
                    <select name="data[Entrada][reporte]" style="display:block" id="EntradaReporte">
                        <option value="">Seleccione un Reporte</option>
                        <option value="2">Asistentes Consolidado</option>
                        <option value="1">Asistentes Detallado</option>
                        <option value="4">Actividad Consolidado</option>
                        <option value="3">Actividad Detallado</option>                        
                        <option value="7">Consolidado General</option>
                        <option value="5">Escarapelas y Certificados Consolidado</option>
                        <option value="6">Stands Consolidado</option>
                    </select>
                </td>
            </tr>
            <tr><td colspan="4" align="center"><input type="button" id="busc" name="busc" value="Generar"></td></tr>
        </table>


        <!--        <div class="btn-group">
                    <button data-toggle="dropdown" class="btn btn-success dropdown-toggle">Exportar <span class="caret"></span></button>
                    <ul class="dropdown-menu">-->
        <!--                <li><a href="<?= $this->Html->url("exportar") ?>">Reportes Generales</a></li>
                        <li><a href="<?= $this->Html->url("exportar2") ?>">Reportes Usuarios</a></li>
                        <li><a href="<?= $this->Html->url("exportar3") ?>">Reportes Ventas</a></li>
                        <li><a href="<?= $this->Html->url("exportar4") ?>">Reportes Registro</a></li>-->
        <!--<li><a href="<?= $this->Html->url("exportar5") ?>">Reporte Ingreso Detallado</a></li>-->
        <!--        <li><a id='exportar5' name='exportar5' style="cursor:pointer">Asistentes y Access control</a></li>
                <li><a id='exportar6' name='exportar6' style="cursor:pointer">Catering</a></li>
                <li><a id='exportar7' name='exportar7' style="cursor:pointer">Actividades Detallado</a></li>
                <li><a id='total' name='total' style="cursor:pointer">Asistencia Por categoria</a></li>
                <li><a id='activitiesevent' name='activitiesevent' style="cursor:pointer">Consolidado Actividades</a></li>
                <li><a id='registros' name='registros' style="cursor:pointer">Escarapelas vs Registros</a></li>-->
        <!--</ul>-->
</div>
<br><br>
<div align='center'>
    <table  width="40%" class="table table-bordered data-table" id="table" name='table'></table>
</div>
<!--        <table>
   <tr>
       <td> table-bordered data-table
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
    $("#busc").click(function() {
        var reporte = $("#EntradaReporte").val();
        var evento = $("#EntradaEventId").val();
        if (evento !== '') {
            if (reporte === '1') {
                exportar5();
            } else if (reporte === '2') {
                total();
            } else if (reporte === '3') {
                exportar7();
            } else if (reporte === '4') {
                activitiesevent();
            } else if (reporte === '5') {
                registros();
            } else if (reporte === '6') {
                shelvesevent();
            } else if (reporte === '7') {
                ConsolidadoGeneral();
            }//
        } else {
            alert("Por favor seleccione un evento");
        }
    });
    function registros() {
        var url = urlbase + "entradas/getPersonWhitInput.xml";
        var datos2 = {
            even_id: $("#EntradaEventId").val()
        };
        ajax(url, datos2, function(xml) {
            $("#table").html("var html = '<tr><th colspan='3' align= 'center'>ESCARAPELAS</th></tr><tr><th>INSCRITOS</th><th>IMPRESAS</th><th>SIN IMPRIMIR</th></tr>'");
            $("datos", xml).each(function() {
                var obj = $(this).find("person");
                var reg = $("reg", obj).text();
                var noreg = $("noreg", obj).text();
                var total = $("total", obj).text();
                var creg = $("creg", obj).text();
                var cnoreg = $("cnoreg", obj).text();
                var total2 = $("total2", obj).text();

                var html = "<tr><th align='center'>$1</th><th  align='center'>$2</th><th align='center'>$3</th></tr>";
                html = html.replace("$2", reg);
                html = html.replace("$3", noreg);
                html = html.replace("$1", total);
                $("#table").append(html);
                var html2 = "<tr><th colspan='3'>&nbsp;</td></tr><tr><th colspan='3'>&nbsp;</td></tr><tr><th colspan='3' align= 'center'>CERTIFICADOS</th></tr><tr><th>REGISTROS</th><th>IMPRESOS</th><th>SIN IMPRIMIR</th></tr><tr><th align='center'>$1</th><th  align='center'>$2</th><th align='center'>$3</th></tr>";
                html2 = html2.replace("$2", creg);
                html2 = html2.replace("$3", cnoreg);
                html2 = html2.replace("$1", total2);
                $("#table").append(html2);
            });
        });
    }
    function activitiesevent() {
        var url = urlbase + "entradas/getActivitiesByEvent.xml";
        var datos2 = {
            even_id: $("#EntradaEventId").val()
        };
        ajax(url, datos2, function(xml) {
            $("#table").html("var html = '<tr><th>DESCRIPCION</th><th>LUGAR</th><th>FECHA</th><th>HORA INICIO</th><th>HORA FINAL</th><th>AFORO</th><th>INGRESOS</th><th>DISPONIBLE</th></tr>'");
            $("datos", xml).each(function() {
                var obj = $(this).find("Activity");
                var nombre = $("nombre", obj).text();
                var lugar = $("locacion", obj).text();
                var fecha = $("fecha", obj).text();
                var h1 = $("hora_inicio", obj).text();
                var h2 = $("hora_fin", obj).text();
                var aforo;
                var ingreso = $("control_aforo", obj).text();
                var disponible;
                if (parseInt($("aforo", obj).text()) > 0) {
                    aforo = $("aforo", obj).text();
                    disponible = 0;
                    if (parseInt($("aforo", obj).text()) >= parseInt($("control_aforo", obj).text())) {
                        disponible = parseInt($("aforo", obj).text()) - parseInt($("control_aforo", obj).text());
                    }
                } else {
                    aforo = "";
                    disponible = "";
                }
                var html = "<tr><td>$1</th><td>$2</th><th>$3</th><th>$4</th><th>$5</th><th>$6</th><th><font color='blue'>$7</font></th><th>$8</th></tr>"
                html = html.replace("$1", nombre);
                html = html.replace("$2", lugar);
                html = html.replace("$3", fecha);
                html = html.replace("$4", h1);
                html = html.replace("$5", h2);
                html = html.replace("$6", aforo);
                html = html.replace("$7", ingreso);
                html = html.replace("$8", disponible);
                $("#table").append(html);
            });
        });
    }

    function shelvesevent() {
        var url = urlbase + "entradas/getShelvesByEvent.xml";
        var datos2 = {
            even_id: $("#EntradaEventId").val()
        };
        ajax(url, datos2, function(xml) {
            $("#table").html("var html = '<tr><th>N° STAND</th><th>NOMBRE STAND</th><th>GENERO</th><th>ENCARGADO</th><th>AFORO</th><th>ACREDITADOS</th><th>DISPONIBLE</th></tr>'");
            $("datos", xml).each(function() {
                var obj = $(this).find("Shelf");
                var codigo = $("codigo", obj).text();
                var nombre = $("esta_nombre", obj).text();
                var genero = $("genero", obj).text();
                var representante = $("representante", obj).text();
                var aforo;
                var ingreso = $("control_aforo", obj).text();
                var disponible;
                if (parseInt($("aforo", obj).text()) > 0) {
                    aforo = $("aforo", obj).text();
                    disponible = 0;
                    if (parseInt($("aforo", obj).text()) >= parseInt($("control_aforo", obj).text())) {
                        disponible = parseInt($("aforo", obj).text()) - parseInt($("control_aforo", obj).text());
                    }
                } else {
                    aforo = "";
                    disponible = "";
                }
                var html = "<tr><td>$1</th><td>$2</th><th>$3</th><th>$4</th><th>$5</th><th><font color='blue'>$6</font></th><th>$7</th></tr>"
                html = html.replace("$1", codigo);
                html = html.replace("$2", nombre);
                html = html.replace("$3", genero);
                html = html.replace("$4", representante);
                html = html.replace("$5", aforo);
                html = html.replace("$6", ingreso);
                html = html.replace("$7", disponible);
                $("#table").append(html);
            });
        });
    }
    function total() {
        var url = urlbase + "entradas/getTotalByCategory.xml";
        var datos2 = {
            even_id: $("#EntradaEventId").val()
        };
        ajax(url, datos2, function(xml) {
            $("#table").html("var html = '<tr><th>CATEGORIA</th><th>CANTIDAD</th><th>PORCENTAJE</th></tr>'");
            var j = 0;
            $("datos", xml).each(function() {
                var obj = $(this).find("cat");
                var total;
                total = $("cuenta", obj).text();
                var full = $("full", obj).text();
                var categoria = $("categoria", obj).text();
                var cantidad = $("total", obj).text();
                var porcentaje = (cantidad * 100) / full;
                j = parseInt(cantidad) + j;
                var html = "<tr><th align='center'>$1</th><th align='center'>$2</th><th align='center'>$3 %</th></tr>"
                html = html.replace("$1", categoria);
                html = html.replace("$2", cantidad);
                html = html.replace("$3", porcentaje.toFixed(2));
                $("#table").append(html);
            });
            var html2 = ("var html = '<tr><th align='center'>$1</th><th align='center'>$2</th><th align='center'>100 %</th></tr>'");
            html2 = html2.replace("$1", 'TOTAL');
            html2 = html2.replace("$2", j);
            $("#table").append(html2);
        });
    }

    function ConsolidadoGeneral() {
        var url = urlbase + "entradas/getReportByAssistant.xml";
        var datos2 = {
            even_id: $("#EntradaEventId").val()
        };
        ajax(url, datos2, function(xml) {
            $("#table").html("var html = '<tr><th>CATEGORIA</th><th>INSCRITOS</th><th>PORCENTAJE</th><th>ESCARAPELAS IMPRESAS</th><th>PORCENTAJE</th><th>POR IMPRIMIR</th><th>CERTIFICADOS IMPRESOS</th><th>PORCENTAJE</th><th>POR IMPRIMIR</th></tr>'");
            var j = 0;
            var total_escarapelas = 0;
            var totalporceescarapela = 0;
            var total_porimprescarapelas = 0;
            var total_certificados = 0;
            var totalporcecertificado = 0;
            var total_porimprcertificados = 0;
            $("datos", xml).each(function() {
                var obj = $(this).find("cat");
                var total;
                total = $("cuenta", obj).text();
                var full = $("full", obj).text();
                var categoria = $("categoria", obj).text();
                var cantidad = $("total", obj).text();
                var porcentaje = (cantidad * 100) / full;
                var escarapela = $("escarapela", obj).text();
                var total_escarapela = $("total_escarapela", obj).text();
                var porceescarapela = (escarapela * 100) / total_escarapela;
                var porimprescarapela = (cantidad - escarapela);
                var certificado = $("certificado", obj).text();
                var total_certificado = $("total_certificado", obj).text();
                var porcecertificado = (certificado * 100) / total_certificado;
                var porimprcertificado = (escarapela - certificado);
                total_escarapelas = parseInt(escarapela) + total_escarapelas;
                totalporceescarapela = parseFloat(porceescarapela) + totalporceescarapela;
                total_porimprescarapelas = parseInt(porimprescarapela) + total_porimprescarapelas;
                total_certificados = parseInt(certificado) + total_certificados;
                totalporcecertificado = parseFloat(porcecertificado) + totalporcecertificado;
                total_porimprcertificados = parseInt(porimprcertificado) + total_porimprcertificados;
                j = parseInt(cantidad) + j;
                var html = "<tr><td>$1</td><th align='center'>$2</th><th align='center'>$3 %</th><th align='center'>$4</th><th align='center'>$5 %</th><th align='center'>$6</th><th align='center'>$7</th><th align='center'>$8 %</th><th align='center'>$9</th></tr>"
                html = html.replace("$1", categoria);
                html = html.replace("$2", cantidad);
                html = html.replace("$3", porcentaje.toFixed(2));
                html = html.replace("$4", escarapela);
                html = html.replace("$5", porceescarapela.toFixed(2));
                html = html.replace("$6", porimprescarapela);
                html = html.replace("$7", certificado);
                html = html.replace("$8", porcecertificado.toFixed(2));
                html = html.replace("$9", porimprcertificado);
                $("#table").append(html);
            });
            var html2 = ("var html = '<tr><th align='center'>$1</th><th align='center'>$2</th><th align='center'>100 %</th><th align='center'>$4</th><th align='center'>$5 %</th><th align='center'>$6</th><th align='center'>$7</th><th align='center'>$8 %</th><th align='center'>$9</th></tr>'");
            html2 = html2.replace("$1", 'TOTAL');
            html2 = html2.replace("$2", j);
            html2 = html2.replace("$4", total_escarapelas);
            html2 = html2.replace("$5", totalporceescarapela.toFixed(2));
            html2 = html2.replace("$6", total_porimprescarapelas);
            html2 = html2.replace("$7", total_certificados);
            html2 = html2.replace("$8", totalporcecertificado.toFixed(2));
            html2 = html2.replace("$9", total_porimprcertificados);
            $("#table").append(html2);
        });
    }

//    function pintar(categoria, cantidad, total) {
//
//        chart = new Highcharts.Chart({
//            chart: {
//                renderTo: 'graficaCircular'
//            },
//            title: {
//                text: 'Cantidad de asistente por categoria'
//            },
//            subtitle: {
//                text: 'Ticket Factory Express'
//            },
//            plotArea: {
//                shadow: null,
//                borderWidth: null,
//                backgroundColor: null
//            },
//            tooltip: {
//                formatter: function() {
//                    return '<b>' + this.point.name + '</b>: ' + this.y;
//                }
//            },
//            plotOptions: {
//                pie: {
//                    allowPointSelect: true,
//                    cursor: 'pointer',
//                    dataLabels: {
//                        enabled: true,
//                        color: '#000000',
//                        connectorColor: '#000000',
//                        formatter: function() {
//                            return '<b>' + this.point.name + '</b>: ' + this.y;
//                        }
//                    }
//                }
//            },
//            series: [{
//                    type: 'pie',
//                    name: 'Browser share',
//                    data: [
//                        ['Entradas', 10],
//                        ['Salidas', 20]
//                    ]
//                }]
//        });
//    }

    function exportar5() {
        var event_id = $("#EntradaEventId").val();
        window.location = urlbase + "entradas/exportar5/" + event_id;
    }
    ;
    $("#exportar6").click(function() {
        var event_id = $("#EntradaEventId").val();
        window.location = urlbase + "entradas/exportar6/" + event_id;
    });
    function exportar7() {
        var event_id = $("#EntradaEventId").val();
        window.location = urlbase + "entradas/exportar7/" + event_id;
    }
    (function()
    {
//        var url = "<?= $this->Html->url(array("action" => "obtenerReporte.xml")) ?>";
//        var html = '<div class="widget-box">' +
//                '<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>' +
//                '    <h5>Estadisticas</h5>' +
//                '</div>' +
//                '<div class="widget-content nopadding">' +
//                '    <table class="table table-bordered data-table">' +
//                '        <thead>' +
//                '            <tr>' +
//                '                <th>Cantidad</th>' +
//                '                <th>Tipo</th>' +
//                '            </tr>' +
//                '        </thead>' +
//                '        <tbody>';
//        ajax(url, $('#EntradaReportesForm').serialize(), function(xml) {
//            $("datos", xml).each(function() {
//
//                var obj = $(this).find("Entrada");
//                var cantidad, tipo;
//                cantidad = $("Cantidad", obj).text();
//                tipo = $("Tipo", obj).text();
//                html += "<tr>";
//                html += "<td>";
//                html += cantidad;
//                html += "</td>";
//                html += "<td>";
//                html += tipo;
//                html += "</td>";
//                html += "</tr>";
//                console.log("html: " + html);
//
//            });
//            html += "</tbody></table>";
//            $("#mensaje").html(html);
//        });

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
//echo $this->Html->script(array("highcharts"));
?>

<?php
$pos = 0;
//for ($index = 0; $index < count($datos); $index++) {
//    $dato = $datos[$index];
//    //Tomo la fecha y el tipo
//    $fecha = $dato["Entrada"]["Fecha"];
//    $tipo = $dato["Entrada"]["Tipo"];
//
//    $cantidadI = 0;
//    $cantidadR = 0;
//    switch ($tipo) {
//        case "RECHAZO":
//            $tipo = "INGRESO";
//            $cantidadR = $dato["Entrada"]["Cantidad"];
//            break;
//        case "INGRESO":
//            $tipo = "RECHAZO";
//            $cantidadI = $dato["Entrada"]["Cantidad"];
//            break;
//    }
//
//    //Ahora busco el opuesto de este
//    $esta = false;
//    for ($index1 = $index + 1; $index1 < count($datos); $index1++) {
//        $d = $datos[$index1];
//        $fecha1 = $d["Entrada"]["Fecha"];
//        $tipo1 = $d["Entrada"]["Tipo"];
//        if ($tipo1 == $tipo && $fecha1 == $fecha) {
//            $esta = true;
//            $index++;
//            switch ($tipo1) {
//                case "RECHAZO":
//                    $cantidadR = $d["Entrada"]["Cantidad"];
//                    break;
//                case "INGRESO":
//                    $cantidadI = $d["Entrada"]["Cantidad"];
//                    break;
//            }
//            break;
//        }
//    }
//    if (!$esta) {
//        switch ($tipo) {
//            case "RECHAZO":
//                $cantidadR = 0;
//                break;
//            case "INGRESO":
//                $cantidadI = 0;
//                break;
//        }
//    }
//    $fecha2 = explode("-", $fecha);
//    $mons = array(1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec");
//    $fecha = $mons[$fecha2[0]] . " - " . $fecha2[1];
//    
?>
    <!--<div id="container//<?= $pos ?>" style="min-width: 40%; height: 400px; max-width: 40%; margin: 0 auto; display: inline-block"></div>-->

<!--    <script>
        $(function() {
            $('#container//<?= $pos ?>').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: 1, //null,
                    plotShadow: false
                },
                title: {
                    text: 'Estadisticas //<?= $fecha ?>'
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
                            ['Rechazos', //<?php echo $cantidadR ?>],
                            ['Ingresos', //<?php echo $cantidadI ?>]
                        ]
                    }]
            });
        });

    </script>-->
<?php
//    $pos++;
//}
?>
<!--



<p>Entradas <?php // echo $salidas                               ?></p>-->
