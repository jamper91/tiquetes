
<div class="people form">
    <?php echo $this->Form->create('Person'); ?>
    <fieldset>
        <legend><?php echo __('Buscar Persona'); ?></legend>
        <?php
        
        echo $this->Form->input('pers_documento', array(
            'label' => 'Número de Documento',
            'required' => 'false'
        ));
        echo $this->Form->input('pers_primNombre', array(
            'label' => 'Nombres',
            'required' => 'false'
        ));
        echo $this->Form->input('pers_primApellido', array(
            'label' => 'Apellidos',
            'required' => 'false'
        ));
        
        echo $this->form->input('input_identificador', array(
            'label' => 'Identificador de Escarapela',
            'required' => 'false'
        ));
       ?>

    </fieldset>
    <?php echo $this->Form->end(__('Buscar')); ?>
</div>

