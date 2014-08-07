<div class="people form">
    <?php echo $this->Form->create('Person'); ?>
    <fieldset>
        <legend><?php echo __('Editar Persona'); ?></legend>
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
        echo $this->Form->input('pers_tipoSangre', array(
            'label' => 'Tipo de Sangre',           
        ));       
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Actualizar')); ?>
</div>
