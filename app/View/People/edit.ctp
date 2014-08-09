<div class="people form">
    <?php echo $this->Form->create('Person'); ?>
    <fieldset>
        <legend><?php echo __('Editar Persona'); ?></legend>
        <?php //var_dump($input); 

        $selected1=$input[0]["Input"]["categoria_id"];

        echo $this->Form->input('categoria_id', array(
            'label' => 'Tipo de Asistente',
            'required' => 'true',
            'selected'=>$selected1,
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
        ));?>
        <div id="adicionales" name="adicionales" style="display: none;" >
            <?php
            
            $selected=array();
            foreach ($products as $key => $item)
            {
                foreach ($products[$key] as $value) {
                  
                    array_push($selected,$value);
                    
                }
               
            }


            echo $this->form->input('producto', array(
//                "name" => $mnus['Product']['product_id'],
                "label"=>"Por favor seleccione los productos",
                "type" => "select",
                "multiple" => "checkbox",
                "selected"=>$selected,
                'options' => $products1,
            ));
            ?>
            <br>
        </div>
        <?php
        echo $this->Form->input('pers_tipoSangre', array(
            'label' => 'Tipo de Sangre',           
        ));  
        //var_dump($input);
        echo $this->form->input('input_identificador', array(
            'label' => 'Identificador de Escarapela',
            'required' => 'true',
            'value'=> (isset($input[0]["Input"]["entr_identificador"])) ? $input[0]["Input"]["entr_identificador"]  : ''
        ));
        echo $this->form->input('input_codigo', array(
            'label' => 'Codigo RFID',
            'required' => 'true',
            'value'=>(isset($input[0]["Input"]["entr_codigo"])) ? $input[0]["Input"]["entr_codigo"] : ''
        ));



        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Actualizar')); ?>
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