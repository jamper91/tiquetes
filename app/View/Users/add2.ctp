<div class="users form"> 
    <?php echo $this->Form->create('User', array('action' => 'add2')); ?>
    <table>
        <tr>  


            <td >Número de Documento: </td>
            <td>
                <input type="hidden" name="data[user][pers_id]" id="UserPers_id">
                <input type="text" id="PersonalDatum_documento" name="data[PersonalDatum][documento]"/>
                <input id="buscar" type="button"  name="buscar" value='Buscar' class="btn-info"/>
            </td>
            <td>
                Lector de cédulas: 
            </td>
            <td>
                <?php
                echo $this->Form->input('pistola', array(
                    'label' => '',
                    'type' => 'password',
                        //'autofocus' => 'true'
                ));
                ?>

            </td>
        <tr>
            <td>Categoría: </td>
            <td>
                <?php
                echo $this->Form->input('categoria_id', array(
                    'label' => '',
                    'required' => 'true',
                    "options" => $categorias,
                    "empty" => "Seleccione una categoria",
                    'autofocus' => 'true'
                ));
                ?>
            </td>
            <td>Stand: </td>
            <td>
                <?php
                echo $this->Form->input('shelf_id', array(
                    'label' => '',
                    'required' => 'false',
                    "options" => $shelves,
                    "empty" => "Seleccione un stand",
                ));
                ?>					
            </td>
        </tr>

        <?php
        if ($form != '') {
            $count = 0;
            foreach ($form as $value) {
                ?>

                <?php if ($count % 2 == 0) { ?>
                    </tr>
                    <tr>
                    <?php } ?>
                    <td><?php echo '     ' . $value["PersonalDatum"]["descripcion"]; ?>
                    </td>
                    <?php
                    if ($value["PersonalDatum"]["tipo"] == "select") {
                        ?>
                        <td>
                            <?php
                            echo $this->Form->input($value["PersonalDatum"]["id"], array(
                                'options' => $value[0],
                                'empty' => 'Seleccione ' . $value["PersonalDatum"]["descripcion"],
                                'label' => '',
                                'name' => "data[PersonalDatum][" . $value["PersonalDatum"]["id"] . "]",
//                                'id' => 'data[PersonalDatum][' . $value["PersonalDatum"]["id"] . "]"
                            ))
                            ?>

                        </td>
                        <?php
                    } elseif ($value["PersonalDatum"]["tipo"] == "checkbox") {
                        ?>
                        <td>
                            <?php
                            echo $this->Form->input($value["PersonalDatum"]["id"], array(
//                "name" => $mnus['Product']['product_id'],
                                "label" => "",
                                "type" => "select",
                                "multiple" => "checkbox",
                                'options' => $value[0],
                                'name' => "data[PersonalDatum][" . $value["PersonalDatum"]["id"] . "]",
//                                'id' => 'data[PersonalDatum][' . $value["PersonalDatum"]["id"] . "]"
                            ));
                            ?>
                        </td>
                        <?php
                    } elseif ($value["PersonalDatum"]["tipo"] == "radio") {
                        ?>
                        <td>
                            <?php
                            echo $this->form->input($value["PersonalDatum"]["id"], array(
//                "name" => $mnus['Product']['product_id'],
                                "label" => "",
                                "type" => "radio",
//                                "multiple" => "radio",
                                'options' => $value[0],
                                'name' => "data[PersonalDatum][" . $value["PersonalDatum"]["id"] . "]",
//                                'id' => 'data[PersonalDatum][' . $value["PersonalDatum"]["id"] . "]"
                            ));
                            ?>
                        </td>
                        <?php
                    } else {
                        ?>

                        <td><input type="<?php echo $value["PersonalDatum"]["tipo"] ?>" 
                            <?php if ($value["PersonalDatum"]["obligatorio"] == 1) { ?>
                                       required=<?php
                                       echo 'true';
                                   }
                                   ?> id="User<?php echo $value["PersonalDatum"]["id"] ?>" name="data[PersonalDatum][<?php echo $value["PersonalDatum"]["id"] ?>]"/>
                        </td>




                        <?php
                    }
                    $count ++;
                }
            }
            ?>
        </tr>
    </table>
    <?php echo $this->Form->end(__('Enviar')); ?>
    <?php //echo $this->Form->create('User', array('action' => 'add2'));         ?>

</div>
<script>

    $(document).ready(function() {//Esta funcion se activa cuando se este ingresando texto en el cuadro
        $('#UserPistola').focus();
        $("input[type='password']").on('input', function(e) {
            if ($('#UserPistola').val().length === 170)
            {
                var documento = "";
                var apellido1 = "";
                var apellido2 = "";
                var nombre = "";
                var nombre2 = "";
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
                $('#PersonalDatum_documento').val(documento);
                $("#User1").val(nombre + " " + nombre2);
                $('#User2').val(apellido1 + " " + apellido2);
//                $('#PersonPersTipoSangre').val(sangre);
                $('#UserPistola').val("");
//                        var url = "validar_admin.jsp"; // the script where you handle the form input. 

            }
        });
    });

</script>
<script>
//    $('#PersonCategoriaId option[value="' + 7 + '"]').attr("selected", true);
    $("#UserShelfId").attr("disabled", "disabled");
    $("#UserCategoriaId").change(function() {
        var valor = $("#UserCategoriaId").val();
//        alert(valor);
        if (valor === '2') {
            $("#UserShelfId").attr("required", true);
            $("#UserShelfId").removeAttr("disabled");
        } else {
            $("#UserShelfId").attr("required", false);
            $("#UserShelfId").val($('#UserShelfId > option:first').val());
            $("#UserShelfId").attr("disabled", "disabled");
        }
    });

</script>
<script>
    $("#buscar").click(function() {
//            alert("aasd");
        var url = urlbase + "companies/search.xml";
        var datos = {
            documento: $("#PersonalDatum_documento").val()
        };
        ajax(url, datos, function(xml) {
            $("datos", xml).each(function() {
                var obj = $(this).find("Person");
                var nombre, td, apellido, cat, ciudad, direccion, telefono, exp, ciu, sec, mail, ins, st, car, pai, emp, cel, observa;
                id = $("id", obj).text();
                td = $("document_type_id", obj).text();
                cat = $("categoria_id", obj).text();
                nombre = $("pers_primNombre", obj).text();
                apellido = $("pers_primApellido", obj).text();
                ciudad = $("city_id", obj).text();
                direccion = $("pers_direccion", obj).text();
                telefono = $("pers_telefono", obj).text();
                cel = $("pers_celular", obj).text();
                mail = $("pers_mail", obj).text();
                ciu = $("ciudad", obj).text();
                ins = $("pers_institucion", obj).text();
                car = $("cargo", obj).text();
                exp = $("pers_expedicion", obj).text();
                emp = $("pers_empresa", obj).text();
                pai = $("pais", obj).text();
                st = $("stan", obj).text();
                sec = $("sector", obj).text();
                observa = $("observaciones", obj).text();
//                alert(sec);
                if (nombre !== "") {
                    $("#PeoplePers_id").val(id);
                    $("#PersonPersPrimNombre").val(nombre);
                    $("#PersonPersPrimApellido").val(apellido);
                    $("#PersonPersDireccion").val(direccion);
                    $("#PersonPersTelefono").val(telefono);
                    $("#PersonPersExpedicion").val(exp);
                    $("#PersonCiudad").val(ciu);
                    $("#PersonPersMail").val(mail);
                    $("#PersonPersInstitucion").val(ins);
                    $("#PersonCargo").val(car);
                    $("#PersonPersEmpresa").val(emp);
                    $("#PersonPersCelular").val(cel);
                    $("#PersonPais").val(pai);
                    $("#PersonObservaciones").val(observa);
                    $("#PersonShelfId").val($('#PersonShelfId > option:first').val());
                    $('#PersonCategoriaId').val($('#PersonCategoriaId > option:first').val());
                    $('#PersonSector').val(sec);
                    $('#PersonCategoriaId option[value="' + cat + '"]').attr("selected", true);
                    if (cat == 2) {
                        $("#PersonShelfId").removeAttr("disabled");
                        $("#PersonShelfId").attr("required", true);
                    }
                    else{
                        $("#PersonShelfId").attr("disabled","disabled");
                    }
                    $('#PersonShelfId option[value="' + st + '"]').attr("selected", true);
                    $('#PersonDocumentTypeId option[value="' + td + '"]').attr("selected", true);
                } else {
                    $("#PeoplePers_id").val("");
//                      console.log("asdasd");
                    //                 $("#PersonPersPrimNombre").val("");
                    //                 $("#PersonPersPrimApellido").val("");
                    $("#PersonPersDireccion").val("");
                    $("#PersonPersTelefono").val("");
                    $("#PersonPersExpedicion").val("");
                    //                 $("#PersonCiudad").val("");
                    $("#PersonPersMail").val("");
                    $("#PersonPersInstitucion").val("");
                    $("#PersonCargo").val("");
                    //               $("#PersonPersEmpresa").val("");
                    $("#PersonPersCelular").val("");
                    //               $("#PersonPais").val("");
                    $("#PersonShelfId").val($('#PersonShelfId > option:first').val());
                    //               $('#PersonDocumentTypeId').val($('#PersonDocumentTypeId > option:first').val());
                    $('#PersonCategoriaId').val($('#PersonCategoriaId > option:first').val());
                    $('#PersonSector').val("");
                    $("#PersonShelfId").attr("disabled","disabled");
                    $("#PersonObservaciones").val();
                    alert("No se encuentra una persona registrada con ese número de documento");
                }
            });
        });
    });
</script>