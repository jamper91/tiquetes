<!--<div class="people form">
<?php echo $this->Form->create('Person'); ?>
        <fieldset>
                <legend><?php echo __('Crear Persona'); ?></legend>
<?php
echo $this->Form->input('document_type_id');
echo $this->Form->input('city_id');
echo $this->Form->input('pers_documento');
echo $this->Form->input('pers_primNombre');
echo $this->Form->input('pers_segNombre');
echo $this->Form->input('pers_primApellido');
echo $this->Form->input('pers_segApellido');
echo $this->Form->input('pers_direccion');
echo $this->Form->input('pers_barrio');
echo $this->Form->input('pers_telefono');
echo $this->Form->input('pers_celular');
echo $this->Form->input('pers_fechNacimiento');
echo $this->Form->input('pers_tipoSangre');
echo $this->Form->input('pers_mail');
echo $this->Form->input('CommitteesEvent');
?>
        </fieldset>
<?php echo $this->Form->end(__('Crear')); ?>
</div>-->
<div class="people form">
    <?php echo $this->Form->create('Person'); ?>
    <fieldset>
        <legend><?php echo __('Crear Persona'); ?></legend>
        <?php
        echo $this->Form->input('categoria_id', array(
            'label' => 'Categoría',
            'required' => 'true',
            "options" => $categorias,
            "empty" => "Seleccione una categoria"
        ));
        echo $this->Form->input('pistola', array(
            'label' => 'Código de Barras',
            'type' => 'password'
        ));
        echo $this->Form->input('pers_documento', array(
            'label' => 'Identificación',
        ));
        echo $this->Form->input('pers_expedicion', array(
            'label' => 'Lugar de Expedición',
        ));
        echo $this->Form->input('pers_primNombre', array(
            'label' => 'Nombres',
        ));
        echo $this->Form->input('pers_primApellido', array(
            'label' => 'Apellidos',
        ));
        echo $this->Form->input('ciudad', array(
            'label' => 'Ciudad',
            'required' => 'true'
        ));
        echo $this->Form->input('pers_direccion', array(
            'label' => 'Direccion'
        ));
        echo $this->Form->input('pers_telefono', array(
            'label' => 'Telefono',
            'required' => 'true'
        ));
        echo $this->Form->input('pers_mail', array(
            'label' => 'E-mail',
            'type' => 'email'
        ));
        echo $this->Form->input('pers_institucion', array(
            'label' => 'Institución',
        ));
        echo $this->Form->input('pers_cargo', array(
            'label' => 'Cargo',
        ));
        ?>       
        <div id="adicionales" name="adicionales" style="display: none;" >
            <?php
//            echo $this->form->input('producto', array(
////                "name" => $mnus['Product']['product_id'],
//                "label" => "Por favor seleccione los productos",
//                "type" => "select",
//                "multiple" => "checkbox",
//                'options' => $products,
//            ));
//            echo $this->Form->input('stand', array(
//                'label' => 'Número de Stand'
//            ));
            ?>
            <input type="hidden" name="data[people][pers_id]" id="PeoplePers_id">
        </div>
        <?php
//        echo $this->Form->input('pers_tipoSangre', array(
//            'label' => 'Tipo de Sangre',
//        ));
//        echo $this->form->input('input_identificador', array(
//            'label' => 'Identificador de Escarapela',
//            'required' => 'true'
//        ));
//        echo $this->form->input('input_codigo', array(
//            'label' => 'Codigo RFID',
//            'required' => 'true',
//            'type' => 'password'
//        ));
        ?>

    </fieldset>
    <?php echo $this->Form->end(__('Crear')); ?>
</div>

<script>
//    $(documet).ready(function() {
//        $("#PersonPistola").val("");
//        $('#PersonCategoriaId').val($('#PersonCategoriaId > option:first').val());
//        $("#PersonPersDocumento").val("");
//        $("#PersonPersPrimNombre").val("");
//        $("#PersonPersPrimApellido").val("");
//        $("#PersonPersTelefono").val("");
//        $("#PersonPersMail").val("");
//        $("#PersonPersEmpresa").val("");
//        $("#PersonPersTipoSangre").val(""); 
//        $("#input_identificador").val("");
//        $("#input_codigo").val("");
//    });
    $("#PersonCategoriaId").change(function() {
        if ($("#PersonCategoriaId").val() === "2") {
            $("#adicionales").css("display", "block");
        } else {
            $("#adicionales").css("display", "none");
        }

    });

</script>
<script>
    $(document).ready(function() {//Esta funcion se activa cuando se este ingresando texto en el cuadro
        $("input[type='password']").on('input', function(e) {
            if ($('#PersonPistola').val().length === 170)
            {
                var documento = "";
                var apellido1 = "";
                var apellido2 = "";
                var nombre = "";
                var sangre = "";
                // alert($('#PersonPistola').val().length);
                var sw = 0;
                for (var i = 0; i < $('#PersonPistola').val().length; i++) {
                    if (i >= 48 && i < 58) {
                        var letra = $('#PersonPistola').val()[i].toString();
                        if (letra != "0" || sw == 1) {
                            sw = 1;
                            documento = documento + letra;
                        }
                    }
                    if (i >= 58 && i < 81) {
                        var letra = $('#PersonPistola').val()[i].toString();
                        if (letra != " ") {
                            apellido1 = apellido1 + letra;
                        }
                    }
                    if (i >= 81 && i < 104) {
                        var letra = $('#PersonPistola').val()[i].toString();
                        if (letra != " ") {
                            apellido2 = apellido2 + letra;
                        }
                    }
                    if (i >= 104 && i < 127) {
                        var letra = $('#PersonPistola').val()[i].toString();
                        if (letra != " ") {
                            nombre = nombre + letra;
                        }
                    }
                    if (i >= 166 && i < 169) {
                        var letra = $('#PersonPistola').val()[i].toString();
                        if (letra != " ") {
                            sangre = sangre + letra;
                        }
                    }
//                            $('#documento').val(documento);
                }
                $('#PersonPersDocumento').val(documento);
                $('#PersonPersPrimNombre').val(nombre);
                $('#PersonPersPrimApellido').val(apellido1); //+ " " + apellido2
//                $('#PersonPersTipoSangre').val(sangre);
                $('#PersonPistola').val("");
                $('#PersonCategoriaId').focus();
//                        var url = "validar_admin.jsp"; // the script where you handle the form input. 

            }
        });
        $("#PersonPersDocumento").keyup(function() {
//            alert("aasd");
            var url = urlbase + "companies/search.xml";
            var datos = {
                documento: $(this).val()
            };
            ajax(url, datos, function(xml) {
                $("datos", xml).each(function() {
                    var obj = $(this).find("Person");
                    var nombre, apellido, ciudad, direccion, telefono, exp, ciu, mail, ins, car;
                    id = $("id", obj).text();
                    nombre = $("pers_primNombre", obj).text();
                    apellido = $("pers_primApellido", obj).text();
                    ciudad = $("city_id", obj).text();
                    direccion = $("pers_direccion", obj).text();
                    telefono = $("pers_telefono", obj).text();
                    mail = $("pers_mail", obj).text();
                    ciu = $("ciudad", obj).text();
                    ins = $("pers_institucion", obj).text();
                    car =  $("pers_cargo", obj).text();
                    exp = $("pers_expedicion", obj).text();
//                    alert(ciu+ins+car+exp+mail);
                    if (nombre !== null) {
                        $("#CompanyPers_id").val(id);
                        $("#PersonPersPrimNombre").val(nombre);
                        $("#PersonPersPrimApellido").val(apellido);
                        $("#PersonPersDireccion").val(direccion);
                        $("#PersonPersTelefono").val(telefono);
                        $("#PersonPersExpedicion").val(exp);
                        $("#PersonCiudad").val(ciu);
                        $("#PersonPersMail").val(mail);
                        $("#PersonPersInstitucion").val(ins);
                        $("#PersonPersCargo").val(car);
                    } else {
                        $("#PersonPersPrimNombre").val();
                        $("#PersonPersPrimApellido").val();
                        $("#PersonPersDireccion").val();
                        $("#PersonPersTelefono").val();
                        $("#PersonPersExpedicion").val();
                        $("#PersonCiudad").val();
                        $("#PersonPersMail").val();
                        $("#PersonPersInstitucion").val();
                        $("#PersonPersCargo").val();
                    }
                });
            });
        });
        $("#PersonPersPrimNombre").on('keyup', function(){ 
           $("#PersonPersPrimNombre").val(conMayusculas($(this).val()));
        });
        $("#PersonPersPrimApellido").on('keyup', function(){ 
           $("#PersonPersPrimApellido").val(conMayusculas($(this).val()));
        });
        $("#PersonPersDireccion").on('keyup', function(){ 
           $("#PersonPersDireccion").val(conMayusculas($(this).val()));
        });
        $("#PersonPersExpedicion").on('keyup', function(){ 
           $("#PersonPersExpedicion").val(conMayusculas($(this).val()));
        });
        $("#PersonCiudad").on('keyup', function(){ 
           $("#PersonCiudad").val(conMayusculas($(this).val()));
        });
        $("#PersonPersMail").on('keyup', function(){ 
           $("#PersonPersMail").val(conMayusculas($(this).val()));
        });
        $("#PersonPersInstitucion").on('keyup', function(){ 
           $("#PersonPersInstitucion").val(conMayusculas($(this).val()));
        });
        $("#PersonPersCargo").on('keyup', function(){ 
           $("#PersonPersCargo").val(conMayusculas($(this).val()));
        });
    });

</script>

