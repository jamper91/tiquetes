<div class="locations form">
    <?php echo $this->Form->create('Location'); ?>
    <fieldset>
        <legend><?php echo __('Editar Localidad'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('loca_nombre', array('label' => 'nombre'));
        echo $this->Form->input('stage_id', array(
            "div" => array(
                "class" => "controls"
            ),
            "label" => "Escenario",
            "options" => $stages,//"Stage.esce_nombre",
        ));
        echo $this->Form->input('parent_id', array('label' => 'localidad padre'));
        echo $this->Form->input('loca_fila', array('label' => 'numero de filas'));
        echo $this->Form->input('loca_colomnna', array('label' => 'numero de columnas'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Actualizar')); ?>
</div>

