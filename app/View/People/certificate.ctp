
<div class="people form">
    <?php echo $this->Form->create('Person'); ?>
    <fieldset>
        <legend><?php echo __('Generar certificado'); ?></legend>

        <table>
            <tr>
                <td>
                    <?php
                    echo $this->Form->input('codigo', array(
                        'label' => 'Codigo de barras',
                        'required' => 'false',
                        'autofocus' => 'true'
                    ));
                    ?>
                </td>
                <td>
                    <?php
                    echo $this->Form->input('cedula', array(
                        'label' => 'Identificacion',
                        'required' => 'true',
                    ));
                    ?>
                </td>
                <td><input class="btn-info" id="buscar" name="buscar" value="buscar" type="button"></td>
                <td></td>
            </tr>
            <tr>
<!--                <td><?php
//                    echo $this->Form->input('document_type_id', array(
//                        "div" => array(
//                            "class" => "input text"
//                        ),
//                        "label" => "Tipo de Documento",
//                        "options" => $documentTypes,
//                        //            "empty" => "Seleccione un tipo de documento",
//                        "required" => "true",
//                    ));
                    ?>
                </td>-->
                <td>
                    <?php
                    echo $this->Form->input('pers_primNombre', array(
                        'label' => 'Nombres',
                        'required' => 'true'
                    ));
                    ?>
                </td>
                <td>
                    <?php
                    echo $this->Form->input('pers_primApellido', array(
                        'label' => 'Apellidos',
                        'required' => 'true'
                    ));
                    ?>
                </td>
                <td>
                    <?php
                    echo $this->Form->input('pers_empresa', array(
                        'label' => 'Institucion',
                    ));
                    ?>
                </td>
                <td>
                    <?php
//                    echo $this->Form->input('categoria_id', array(
//                        'label' => 'Categoría',
//                        'required' => 'true',
//                        "options" => $categorias,
//                        "empty" => "Seleccione una categoria",
//                        'autofocus' => 'true'
//                    ));
//                    
                    ?>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="data[people][pers_id]" id="PeoplePers_id">
                </td>
            </tr>
        </table>

    </fieldset>
<?php //echo $this->Form->end(__('Buscar'));   ?>
    <div class="submit">
        <input class="btn-success" id="imprimir" name="imprimir" value="Imprimir" type="submit">
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#PersonCodigo").keydown(function(event) {
            return soloNumeros(event);
        });

//        $("#PersonCedula").keydown(function(event) {
//            return soloNumeros(event);
//        });

    });
</script>
<script>
    $("#imprimir").click(function() {
        setTimeout('limpiar()', 3000);
        $("#PersonCodigo").focus();
    });
    function limpiar() {
        $("#PersonCodigo").val("");
        $("#PersonCedula").val("");
        $("#PeoplePers_id").val("");
//                      console.log("asdasd");
        $("#PersonPersPrimNombre").val("");
        $("#PersonPersPrimApellido").val("");
//                    $("#PersonPersDireccion").val("");
//                    $("#PersonPersTelefono").val("");
//                    $("#PersonPersExpedicion").val("");
        //                 $("#PersonCiudad").val("");
//                    $("#PersonPersMail").val("");
//                    $("#PersonPersInstitucion").val("");
//                    $("#PersonCargo").val("");
        $("#PersonPersEmpresa").val("");
//                    $("#PersonPersCelular").val("");
        //               $("#PersonPais").val("");
//                    $("#PersonStan").val("");
        $('#PersonDocumentTypeId').val($('#PersonDocumentTypeId > option:first').val());
//        $('#PersonCategoriaId').val($('#PersonCategoriaId > option:first').val());
//                    $('#PersonSector').val($('#PersonSector > option:first').val());
        location.reload();
    }
    $("#buscar").click(function() {
//            alert("aasd");
        var url = urlbase + "companies/searchCertificate.xml";
        var datos = {
            documento: $("#PersonCedula").val(),
            barras: $("#PersonCodigo").val()
        };
        ajax(url, datos, function(xml) {
            $("datos", xml).each(function() {
                var obj = $(this).find("Person");
                var nombre, td, apellido, cat, ciudad, direccion, telefono, exp, identificacion, sec, mail, ins, st, car, pai, emp, cel;
                id = $("id", obj).text();
                td = $("document_type_id", obj).text();
                identificacion = $("pers_documento", obj).text();
//                cat = $("categoria_id", obj).text();
                nombre = $("pers_primNombre", obj).text();
                apellido = $("pers_primApellido", obj).text();
//                ciudad = $("city_id", obj).text();
//                direccion = $("pers_direccion", obj).text();
//                telefono = $("pers_telefono", obj).text();
//                cel = $("pers_celular", obj).text();
//                mail = $("pers_mail", obj).text();
//                ciu = $("ciudad", obj).text();
//                ins = $("pers_institucion", obj).text();
//                car = $("cargo", obj).text();
//                exp = $("pers_expedicion", obj).text();
                emp = $("pers_empresa", obj).text();
//                pai = $("pais", obj).text();
//                st = $("stan", obj).text();
//                sec = $("sector", obj).text();
//                alert(sec);
                if (nombre !== "") {
                    $("#PeoplePers_id").val(id);
                    $("#PersonCedula").val(identificacion);
                    $("#PersonPersPrimNombre").val(nombre);
                    $("#PersonPersPrimApellido").val(apellido);
//                    $("#PersonPersDireccion").val(direccion);
//                    $("#PersonPersTelefono").val(telefono);
//                    $("#PersonPersExpedicion").val(exp);
//                    $("#PersonCiudad").val(ciu);
//                    $("#PersonPersMail").val(mail);
//                    $("#PersonPersInstitucion").val(ins);
//                    $("#PersonCargo").val(car);
                    $("#PersonPersEmpresa").val(emp);
//                    $("#PersonPersCelular").val(cel);
//                    $("#PersonPais").val(pai);
//                    $("#PersonStan").val(st);
//                    $('#PersonCategoriaId').val($('#PersonCategoriaId > option:first').val());
//                    $('#PersonSector option[value="' + sec + '"]').attr("selected", true);
//                    $('#PersonCategoriaId option[value="' + cat + '"]').attr("selected", true);
                    $('#PersonDocumentTypeId option[value="' + td + '"]').attr("selected", true);
                } else {
                    $("#PeoplePers_id").val("");
//                      console.log("asdasd");
                    $("#PersonPersPrimNombre").val("");
                    $("#PersonPersPrimApellido").val("");
//                    $("#PersonPersDireccion").val("");
//                    $("#PersonPersTelefono").val("");
//                    $("#PersonPersExpedicion").val("");
                    //                 $("#PersonCiudad").val("");
//                    $("#PersonPersMail").val("");
//                    $("#PersonPersInstitucion").val("");
//                    $("#PersonCargo").val("");
                    $("#PersonPersEmpresa").val("");
//                    $("#PersonPersCelular").val("");
                    //               $("#PersonPais").val("");
//                    $("#PersonStan").val("");
                    $('#PersonDocumentTypeId').val($('#PersonDocumentTypeId > option:first').val());
//                    $('#PersonCategoriaId').val($('#PersonCategoriaId > option:first').val());
//                    $('#PersonSector').val($('#PersonSector > option:first').val());
                    alert("No se encuentra una persona registrada");
                }
            });
        });
    });
</script>
