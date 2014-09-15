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
        <legend><?php echo __('Modificar Persona'); ?></legend>
        <?php
        
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
    <?php echo $this->Form->end(__('Modificar')); ?>
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

