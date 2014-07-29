
<?php
echo $this->Html->script(array('jquery.multi-select'));
echo $this->Html->css(array('multi-select'));
?>
<div class="row-fluid">
    <div class="span6">
        <div class="widget-box">
            <div class="widget-title">
                <h5>
                    Crear Formulario
                </h5>
            </div>
            <div class="widget-content nopadding">
                <?php
                echo $this->Form->create('User', array(
                    "class" => "form-horizontal",
                ));
                ?>
                <div class="control-group">
                    <label class="control-label">Evento</label>
                    <?php
                    echo $this->Form->input('event_id', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        "label" => "",
                        "options" => $events,
                        "empty" => "Seleccione"
                    ));
                    ?>
                </div>
                <div class="control-group">
                    <label class="control-label">Tipo Usuario</label>
                    <?php
                    echo $this->Form->input('registration_type_id', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        "label" => "",
                        "empty" => "Seleccione"
                    ));
                    ?>
                </div>


                <div id="formulario">

                </div>
                <?php
                echo $this->Form->end(array(
                    "div" => array(
                        "class" => "form-actions"
                    ),
                    "class" => "btn btn-success",
                    "label" => "Registrar"
                ));
                ?>
            </div>

        </div>

    </div>
</div>
<script>
    $(document).ready(function()
    {
//        $("#UserRegistrationTypeId").change(function()
//        {
//            var categoria=$("#UserRegistrationTypeId :selected").attr("categoria");
//            console.log("categoria: "+categoria);
//            $("#formulario").on("#InputCategoryId",function()
//            {
//                console.log("Entre");
//                $(this).val(categoria);
//            });
//            $("#formulario #EventsRegistrationTypesRegistrationTypeId").val($(this).val());
//        });
        $('#UserEventId').change(function()
        {
            $("#UserRegistrationTypeId").html("<option>Cargando</option>");
            $("#formulario").html("Cargando Formulario..");
            var event_id = $(this).val();

            //Obtengo los tipos de usuarios
            var url = urlbase + "events_registration_types/getRegistrationTypesByEvent.xml";
            var datos = {
                event_id: event_id
            }
            console.log("url: "+url);
            ajax(url, datos, function(xml)
            {
                //Elimino lo que contiene este select
                $("#UserRegistrationTypeId").html("<option>Seleccione</option>");
                if (xml)
                {
                    $("datos", xml).each(function()
                    {
                        var obj = $(this).find("Categoria");
                        var valor, texto;
                        valor = $("id", obj).text();
                        texto = $("descripcion", obj).text();
                        if (valor) {
                            var html = "<option value='$1' categoria='$3'>$2</option>";
                            html = html.replace("$1", valor);
                            html = html.replace("$2", texto);
                            html = html.replace("$3", valor);
                            $("#UserRegistrationTypeId").append(html);
                        }
                    });
                    //Obtengo los datos del formulario
                    url = urlbase + "users/getPersonalDataByEvent.xml";
                    ajax(url, datos, function(xml2)
                    {
                        if (xml2)
                        {
                            var formulario = "";
                            //Agrego el campo de la cedula y campos necesarios para almacenar otra informacion
                            formulario += "<div class='controls'>";
                            formulario += "<label for='PeopleDocumento'>Documento</label>";
                            formulario += "<input id='PeopleDocumento' type='number' name='data[People][pers_documento]'></input>";
                            formulario += "</div>";


                            var con = 0;
                            $("datos", xml2).each(function()
                            {
                                var obj = $(this).find("PersonalDatum");
                                var id, descripcion, tipo;
                                id = $("id", obj).text();
                                descripcion = $("descripcion", obj).text();
                                tipo = $("tipo", obj).text();
                                obj = $(this).find("FormsPersonalDatum");
                                var idFPD;
                                idFPD = $("id", obj).text();
                                if (id) {
                                    var html = "";
                                    html += "<div class='controls'>";
                                    html += "<label for='Form$1'>$1</label>";
                                    html += "<input type='$2' name='data[Data][$5][descripcion]'></input>";
                                    html += "<input style='display:none' type='text' name='data[Data][$5][forms_personal_datum_id]' value='$4'></input>";
                                    html += "<input style='display:none' type='text' name='data[Data][$5][person_id]' value='-1'></input>";
                                    html += "</div>";

                                    html = html.replace("$1", descripcion);
                                    html = html.replace("$1", descripcion);
                                    html = html.replace("$2", tipo);
                                    html = html.replace("$3", id);
                                    html = html.replace("$4", idFPD);
                                    html = html.replace("$5", con);
                                    html = html.replace("$5", con);
                                    html = html.replace("$5", con);
                                    con++;
                                    formulario += html;
//                                    console.log("html: " + html);
                                }
                            });
                            //Agrego el campo de la tarjeta
                            formulario += "<div class='controls'>";
                            formulario += "<label for='PersonDocumento'>Tarjeta</label>";
                            formulario += "<input id='PersonDocumento' type='password' name='data[Input][entr_codigo]'></input>";

                            formulario += "</div>";

                            //Datos para almacenar en la tabla events_registration_types
                            formulario += "<input style='display:none' type='text' name='data[EventsRegistrationType][registration_type_id]'  value='-1' id='EventsRegistrationTypesRegistrationTypeId'></input>";
                            formulario += "<input style='display:none' type='text' name='data[EventsRegistrationType][event_id]' value='$1'></input>";
                            console.log('formulario: ' + formulario);

                            formulario = formulario.replace("$1", event_id);
                            //Datos para almacenar en la tabla inputs
                            formulario += "<input style='display:none' type='text' name='data[Input][events_registration_type_id]' value='-1'></input>";
//                            formulario += "<input style='display:none' type='text' name='data[Input][category_id]' value='-1' id='InputCategoryId'></input>";
                            formulario += "<input style='display:none' type='text' name='data[Input][person_id]' value='-1'></input>";
                            $("#formulario").html(formulario);
                        }
                    });
                }
            });
        });
    });

</script>