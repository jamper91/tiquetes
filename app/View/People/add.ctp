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
            'label' => 'Tipo de Asistente',
            'required' => 'true',
            "options" => $categorias,
            "empty" => "Seleccione una categoria"
        ));
        echo $this->Form->input('pers_documento', array(
            'label' => 'Número de Documento',
        ));
        echo $this->Form->input('pers_primNombre', array(
            'label' => 'Nombres',
        ));
        echo $this->Form->input('pers_primApellido', array(
            'label' => 'Apellidos',
        ));
        echo $this->Form->input('pers_telefono', array(
            'label' => 'Telefono',
        ));
        echo $this->Form->input('pers_mail', array(
            'label'=>'E-mail'
        ));
        echo $this->Form->input('pers_empresa', array(
            'label' => 'Empresa',
        ));
        ?>       
        <div id="adicionales" name="adicionales" style="display: none;" >
            <?php
            echo $this->form->input('producto', array(
//                "name" => $mnus['Product']['product_id'],
                "label"=>"Por favor seleccione los productos",
                "type" => "select",
                "multiple" => "checkbox",
                'options' => $products,
            ));
            ?>
            <br>
        </div>
        <?php
        echo $this->Form->input('pers_tipoSangre', array(
            'label' => 'Tipo de Sangre',
            "options" => $bloodType,
            "empty" => "Seleccione un tipo de sangre"
        ));

        echo $this->form->input('input_identificador', array(
            'label' => 'Identificador de Escarapela',
            'required' => 'true'
        ));
        echo $this->form->input('input_codigo', array(
            'label' => 'Codigo RFID',
            'required' => 'true'
        ));
        ?>

    </fieldset>
    <?php echo $this->Form->end(__('Crear')); ?>
</div>

<script>

    $("#PersonCategoriaId").change(function() {
        if ($("#PersonCategoriaId").val() === "2") {
            $("#adicionales").css("display", "block");
        } else {
            $("#adicionales").css("display", "none");
        }

    });

</script>
