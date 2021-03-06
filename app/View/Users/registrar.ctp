
<?php
echo $this->Html->script(array('jquery.validate.min', 'jquery.multi-select'));
echo $this->Html->css(array('multi-select'));
?>
<div class="row-fluid">
    <div class="span6">
        <div class="widget-box">
            <div class="widget-title">
                <h5>
                    Registrar Persona
                </h5>
            </div>
            <div class="widget-content nopadding">
                <?php
                echo $this->Form->create('User', array(
                    "class" => "form-horizontal"
                ));
                ?>
                <input style='display:none' type='text' name='data[Informacion][actualizar]' id='inputActualizar' value='0'></input>
                <input style='display:none' type='text' name='data[Informacion][person_id]' id='inputPersonId' value='0'></input>
                <input style='display:none' type='text' name='data[Informacion][input_id]' id='inputInputId' value='0'></input>

                <?php
                echo $this->Form->input('event_id', array(
                    "div" => array(
                        "class" => "input text"
                    ),
                    "label" => "Evento",
                    "options" => $events,
                    "empty" => "Seleccione un evento",
                    "style" => array(
                        "display:block"
                    )
                ));
                ?>
                <?php
                echo $this->Form->input('categoria_id', array(
                    "div" => array(
                        "class" => "input text"
                    ),
                    "label" => "Categoria",
                    "empty" => "Seleccione una categoria",
                    "style" => array(
                        "display:block"
                    ),
                    "required" => true
                ));
                ?>
                <?php
                echo $this->Form->input('registration_type_id', array(
                    "div" => array(
                        "class" => "input text"
                    ),
                    "label" => "",
                    "empty" => "Seleccione",
                    "style" => array(
                        "display:none"
                    )
                ));
                ?>



                <div id="formulario" >
                    <!--                    <label style="text-align: center">
                                            Seleccione un evento
                                        </label>-->
                    <table id="formulario2" style="display: none; padding-left: 10px">
                        <tr>
                            <td colspan="2"><?php
                                echo $this->Form->input('pistola', array(
                                'label' => 'Lector de Cédulas',
                                'type' => 'password'
                                ));
                                ?></td>
                        </tr>
                        <tr>                           
                            <td colspan="2" align="center" >
                                <input type="radio" name="data[User][tipoE]" required="true" value="RFDI" onclick="visibleCampos()" />RFID
                                <input type="radio" name="data[User][tipoE]" required="true" value="Codigo Barra" onclick="ocultarCampos()" />Código de Barras
                            </td>
                        </tr>
                        <tr>                           
                            <td colspan="2" ><?php
                                echo $this->Form->input('People.document_type_id', array(
                                    "div" => array(
                                        "class" => "input text"
                                    ),
                                    "label" => "Tipo de Documento",
                                    "options" => $DocumentType,
                                    "empty" => "Seleccione un tipo de documento",
                                    "required" => "true",
                                ));
                                ?></td>
                        </tr>
                        <tr>

                            <td colspan="2">
                                <div class="input text">
                                    <label for="PeoplePers_id">Número de Documento</label>
                                    <input type="text" required="true" id="PeopleDocumento" name="data[People][pers_documento]"/><input type="button" id="buscar" name="buscar" value="Buscar"/>
                                    <input type="hidden" name="data[Person][pers_id]" id="PeoplePers_id">    
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="input text">
                                    <label for="PeoplePers_primNombre">Nombre</label>
                                <input type="text" required="true" id="PeoplePers_primNombre" name="data[People][pers_primNombre]"/></td>
                            </div>

                        </tr>
                        <tr>

                            <td colspan="2">
                                <div class="input text">
                                    <label for="PeoplePers_primApellido">Apellidos</label>
                                    <input type="text" id="PeoplePers_primApellido" required="true" name="data[People][pers_primApellido]"/>
                                </div>

                            </td>
                        </tr>            
                        <tr>

                            <td colspan="2">
                                <div class="input text">
                                    <label for="PeoplePers_direccion">Direccion</label>
                                    <input type="text" id="PeoplePers_direccion" name="data[People][pers_direccion]"/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="input text">
                                    <label for="PeoplePers_telefono">Telefono</label>
                                    <input type="text" id="PeoplePers_telefono" name="data[People][pers_telefono]"/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                        <tr>
                            <td colspan="2">
                                <div class="input text">
                                    <label for="PeoplePers_mail">Correo</label>
                                    <input type="email" id="PeoplePers_mail" name="data[People][pers_mail]"/>
                                </div>
                            </td>
                        </tr>            
                    </table>

                </div>
                <input type="button" id="btnNuevo" class="btn btn-success" value="Registrar Nuevo" style="display:none"> 
                <?php
                echo $this->Form->end(array(
                    "div" => array(
                        "class" => "form-actions"
                    ),
                    "class" => "btn btn-success",
                    "label" => "Registrar"
                ));
                ?>
                <!--<div class="form-actions">-->

                <!--</div>-->
            </div>

        </div>

    </div>
</div>
<div id="mensaje">

</div>
<script>
    var actualizar = 0, inputId = 0, personId = 0;
    function visibleCampos()
    {
        $("#divIden").css("display", "block");
        $("#divCodi").css("display", "block");
    }
    function ocultarCampos()
    {
        $("#divIden").css("display", "none");
        $("#divCodi").css("display", "none");
    }
    $(document).ready(function()
    {
        $("#btnNuevo").click(function()
        {
            actualizar = 0;
            $("#PeopleDocumento").val("");
            $("input[type='submit']").attr("value", "Registrar");
            $("#btnNuevo").css("display", "none");
//            inputId = 0;
            limpiar();
        })
        $("#UserRegistrarForm").submit(function()
        {
            return false;
        });
        $("input[type='submit']").click(function()
        {
            $("#UserRegistrationTypeId").val(1);
            //Envio le formulario por ajax
            var url = '<?= $this->Html->url('registrar2.xml') ?>';

            $("#inputActualizar").val(actualizar);
            $("#inputInputId").val(inputId);
            $("#inputPersonId").val(personId);

            console.log("validacion: " + $("#UserRegistrarForm").valid());
            if ($("#UserRegistrarForm").valid())
            {
                var datos = $('#UserRegistrarForm').serialize();
                ajax(url, datos, function(xml) {
                    $("datos", xml).each(function() {
                        var codigo, mensaje;
                        codigo = $("codigo", this).text();
                        mensaje = $("mensaje", this).text();

                        alert(mensaje);
                        if (codigo == 0)
                        {
                            personId = $("person_id", this).text();
                            inputId = $("input_id", this).text();
                            var person_document = $("#PeopleDocumento").val();
                            var event_id = $("#UserEventId").val();
                            actualizar = 1;
                            $("input[type='submit']").attr("value", "Actualizar");
                            $("#btnNuevo").css("display", "block");

                        } else if (codigo == 2)
                        {
                            personId = $("person_id", this).text();
                            inputId = $("input_id", this).text();
                            var person_document = $("#PeopleDocumento").val();
                            var event_id = $("#UserEventId").val();
                            actualizar = 1;
                            $("input[type='submit']").attr("value", "Actualizar");
                            $("#btnNuevo").css("display", "block");
                            var answer = confirm("Imprimir escarapela?.");
                            if (answer) {

                                window.location = urlbase + "people/reimprimir/" + person_document + "/" + event_id + "/" + 2;

                            }
                        } else if (codigo == 3)
                        {
                            personId = $("person_id", this).text();
                            inputId = $("input_id", this).text();
                            var person_document = $("#PeopleDocumento").val();
                            var event_id = $("#UserEventId").val();
                            actualizar = 1;
                            $("input[type='submit']").attr("value", "Actualizar");
                            $("#btnNuevo").css("display", "block");
                            var answer = confirm("Imprimir escarapela?.");
                            if (answer) {

                                window.location = urlbase + "people/reimprimir/" + person_document + "/" + event_id + "/" + 1;

                            }
                        }

                    });

                });

            } else {
                console.log("no paso la validacion");
            }

        });

        $("#UserEventId").change(function()
        {
            cargarCategorias();
            actualizarForm();
        });
        (function()
        {
//            actualizarForm();
        })();
        function cargarCategorias()
        {
            var event_id = $("#UserEventId").val();
            var url = urlbase + "events_categorias/getCategoriasByEvent.xml";
            var datos = {
                event_id: event_id
            }
            ajax(url, datos, function(xml)
            {

                //Elimino lo que contiene este select
                $("#UserCategoriaId").html("");
                if (xml)
                {
                    $("datos", xml).each(function()
                    {
                        var obj = $(this).find("Categoria");
                        if (obj)
                        {
                            var valor, texto;
                            valor = $("id", obj).text();
                            texto = $("descripcion", obj).text();
                            $("#UserCategoriaId").append("<option value='" + valor + "'>" + texto + "</option>");

                        }

                    });
                }
            });

        }
        function actualizarForm()
        {
//            $("#formulario").html("Cargando...");
            console.log("entre actualizarForm");
            var event_id = $("#UserEventId").val();
            //Obtengo los tipos de usuarios
            var url = urlbase + "events_registration_types/getRegistrationTypesByEvent.xml";
            var datos = {
                event_id: event_id
            }
            console.log("url: " + url);
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
//                            formulario += "<div class='controls'>";
//                            formulario += "<tr>";
//                            formulario += "<td colspan='2'><label for='PeopleDocumento'>Documento</label></td>";
//                            formulario += "<td colspan='2'><input id='PeopleDocumento' type='number' name='data[People][pers_documento]'></input></td>";
//                            formulario += "</tr>";
//                            formulario += "</div>";


                            var con = 0;
                            $("datos", xml2).each(function()
                            {
                                var obj = $(this).find("PersonalDatum");
                                var id, descripcion, tipo, obligatorio;
                                id = $("id", obj).text();
                                descripcion = $("descripcion", obj).text();
                                tipo = $("tipo", obj).text();
                                obligatorio = $("obligatorio", obj).text();

                                if (obligatorio == "1")
                                    obligatorio = "required";
                                else
                                    obligatorio = "";
                                obj = $(this).find("FormsPersonalDatum");
                                var idFPD;
                                idFPD = $("id", obj).text();
                                if (id) {
                                    var html = "";
                                    /**
                                     * Al campo name='data[Data][$5][descripcion]' le agrege el atributo id id='DataDescripcionFPD$4' para cuando consulte un usuario
                                     * y dicho usuario tenga datos en la tabla data, poder colocar la informacion en este input basado en el id de FormsPersonalDatum
                                     * Al campo name='data[Data][$5][id]' le agrege el atributo id id='DataIdFPD$4' para cuando consulte un usuario
                                     * y dicho usuario tenga datos en la tabla data, colocar aqui el id de la tabla Data, para que cuando se envie el formulario se actualize
                                     * estos campos y no registre nuevos
                                     * @returns {undefined}
                                     */
                                    html += "<tr>";
                                    html += "<td colspan='2'><div class='input text'><label for='Form$1'>$1</label><input id='DataDescripcionFPD$4' type='$2' name='data[Data][$5][descripcion]' $6></input></div>";
                                    html += "<input style='display:none' id='DataIdFPD$4' type='text' name='data[Data][$5][id]' value='-1'></input>";
                                    html += "<input style='display:none' type='text' name='data[Data][$5][forms_personal_datum_id]' value='$4'></input>";
                                    html += "<input style='display:none' type='text' name='data[Data][$5][person_id]' value='-1'></input></td>";
                                    html += "</tr>";
//                                    html += "</div>";

                                    html = html.replace("$1", descripcion);
                                    html = html.replace("$1", descripcion);
                                    html = html.replace("$2", tipo);
                                    html = html.replace("$3", id);
                                    html = html.replace("$4", idFPD);
                                    html = html.replace("$4", idFPD);
                                    html = html.replace("$4", idFPD);
                                    html = html.replace("$5", con);
                                    html = html.replace("$5", con);
                                    html = html.replace("$5", con);
                                    html = html.replace("$5", con);
                                    html = html.replace("$6", obligatorio);
                                    con++;
                                    formulario += html;
                                }
                            });
                            //Agrego el campo de la tarjeta
//                            formulario += "<div class='controls'>";
                            formulario += "<tr>";
                            formulario += "<td colspan='2'><div id='divIden' style='display:none' class='input text'><label for='PersonDocumento'>Identificador Manilla</label><input id='PersonDocumento' type='text' name='data[Input][entr_identificador]'></input></div></td>";
                            formulario += "</tr>";
//                            formulario += "</div>";

                            //Agrego el campo de la tarjeta
//                            formulario += "<div class='controls'>";
                            formulario += "<tr>";
                            formulario += "<td colspan='2'><div id='divCodi' style='display:none' class='input text'><label for='PersonRfid'>Codigo Manilla</label><input id='PersonRfid' type='password' name='data[Input][entr_codigo]'></input></div></td>";
                            formulario += "</tr>";
//                            formulario += "</div>";


                            //Datos para almacenar en la tabla events_registration_types
                            formulario += "<input style='display:none' type='text' name='data[EventsRegistrationType][registration_type_id]'  value='-1' id='EventsRegistrationTypesRegistrationTypeId'></input>";
                            formulario += "<input style='display:none' type='text' name='data[EventsRegistrationType][event_id]' value='$1'></input>";

                            formulario = formulario.replace("$1", event_id);
                            //Datos para almacenar en la tabla inputs
                            formulario += "<input style='display:none' type='text' name='data[Input][events_registration_type_id]' value='-1'></input>";
//                            formulario += "<input style='display:none' type='text' name='data[Input][category_id]' value='-1' id='InputCategoryId'></input>";
                            formulario += "<input style='display:none' type='text' name='data[Input][person_id]' value='-1'></input>";
                            $("#formulario2").append(formulario);
                            $("#formulario2").css("display", "block");
//                            $("#formulario").html(formulario);
                        }
                    });
                }
            });
        }

//        function buscar() {
        $("#buscar").click(function() {
//            alert("aasd");
            var url = urlbase + "companies/search.xml";
            var datos = {
                documento: $("#PeopleDocumento").val()
            };
            ajax(url, datos, function(xml) {
                $("datos", xml).each(function() {
                    var obj = $(this).find("Person");
                    var nombre, apellido, ciudad, direccion, telefono, id, email;
                    id = $("id", obj).text();
                    nombre = $("pers_primNombre", obj).text();
                    apellido = $("pers_primApellido", obj).text();
                    ciudad = $("city_id", obj).text();
                    direccion = $("pers_direccion", obj).text();
                    telefono = $("pers_telefono", obj).text();
                    email = $("pers_mail", obj).text();
                    if (nombre !== "") {
                        $("#PeoplePers_id").val(id);
                        personId = id;
                        $("#PeoplePers_primNombre").val(nombre);
                        $("#PeoplePers_primApellido").val(apellido);
                        $("#UserCityId option[value=" + ciudad + "]").attr("selected", true);
                        $("#PeoplePers_direccion").val(direccion);
                        $("#PeoplePers_telefono").val(telefono);
                        $("#PeoplePers_mail").val(email);
                        actualizar = 1;
                    } else {
                        limpiar();
                        actualizar = 0;
                    }
                });
                url = '<?= $this->Html->url(array("controller" => "Datas", "action" => "getDataByUser.xml")) ?>';
                var datos2 = {
                    person_id: $("#PeoplePers_id").val()
                };
                ajax(url, datos2, function(xml) {
                    $("datos", xml).each(function() {
                        var obj = $(this).find("Data");
                        var descripcion, id, forms_personal_datum_id;
                        id = $("id", obj).text();
                        descripcion = $("descripcion", obj).text();
                        forms_personal_datum_id = $("forms_personal_datum_id", obj).text();

                        if (id !== "") {
                            //Ahora busco aquel input que deba tener este dato
                            $("#DataDescripcionFPD" + forms_personal_datum_id).val(descripcion);
//                        $("#PeoplePers_id").val(id);
//                        personId = id;
//                        $("#PeoplePers_primNombre").val(nombre);
//                        $("#PeoplePers_primApellido").val(apellido);
//                        $("#UserCityId option[value=" + ciudad + "]").attr("selected", true);
//                        $("#PeoplePers_direccion").val(direccion);
//                        $("#PeoplePers_telefono").val(telefono);
//                        $("#PeoplePers_mail").val(email);
                            actualizar = 1;
                        } else {
//                        limpiar();
                            actualizar = 0;
                        }
                    });
                });
            });
        });
        function limpiar()
        {

            $("#PeoplePers_id").val("");
            $("#UserCityId option[value='']").attr("selected", true);
            $("#PeoplePers_primNombre").val("");
            $("#PeoplePers_primApellido").val("");
            $("#PeoplePers_direccion").val("");
            $("#PeoplePers_telefono").val("");
            $("#PeoplePers_mail").val("");
            $("#PersonDocumento").val("");
            $("#PersonRfid").val("");
        }

    });

</script>
<script>
    $(document).ready(function() {//Esta funcion se activa cuando se este ingresando texto en el cuadro
        $("input[type='password']").on('input', function(e) {
            if ($('#UserPistola').val().length === 170)
            {
                var documento = "";
                var apellido1 = "";
                var apellido2 = "";
                var nombre = "";
                var nombre2 ="";
                var sangre = "";
                // alert($('#PersonPistola').val().length);
                var sw = 0;
                for (var i = 0; i < $('#UserPistola').val().length; i++) {
                    if (i >= 48 && i < 58) {
                        var letra = $('#UserPistola').val()[i].toString();
                        if (letra != "0" || sw == 1) {
                            sw = 1;
                            documento = documento + letra;
                        }
                    }
                    if (i >= 58 && i < 81) {
                        var letra = $('#UserPistola').val()[i].toString();
                        if (letra != " ") {
                            apellido1 = apellido1 + letra;
                        }
                    }
                    if (i >= 81 && i < 104) {
                        var letra = $('#UserPistola').val()[i].toString();
                        if (letra != " ") {
                            apellido2 = apellido2 + letra;
                        }
                    }
                    if (i >= 104 && i < 127) {
                        var letra = $('#UserPistola').val()[i].toString();
                        if (letra != " ") {
                            nombre = nombre + letra;
                        }
                    }
                    if (i >= 127 && i < 150) {
                        var letra = $('#UserPistola').val()[i].toString();
                        if (letra != " ") {
                            nombre2 = nombre2 + letra;
                        }
                    }
                    if (i >= 166 && i < 169) {
                        var letra = $('#UserPistola').val()[i].toString();
                        if (letra != " ") {
                            sangre = sangre + letra;
                        }
                    }
//                            $('#documento').val(documento);
                }
                $('#PeopleDocumento').val(documento);
                $('#PeoplePers_primNombre').val(nombre+" "+nombre2);
                $('#PeoplePers_primApellido').val(apellido1 + " " + apellido2); 
//                $('#PersonPersTipoSangre').val(sangre);
                $('#UserPistola').val("");
//                $('#UserCategoriaId').focus();
//                        var url = "validar_admin.jsp"; // the script where you handle the form input. 

            }
        });
    });

</script>
