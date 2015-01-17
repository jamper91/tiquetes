<div class="pages form" align="center">
    <?php echo $this->Form->create('Page'); ?>
    <div align="center">
        <h5>Por favor seleccione el evento para el que desea registrar el personal.</h5><br>
        <?php
        echo $this->Form->input('event_id', array(
            "div" => array(
                "class" => "controls"
            ),
            "label" => "Evento",
            "options" => $events,
            'required' => 'true',
            "empty" => "Seleccione un Evento"
        ));
        ?>
    </div>
    <?php echo $this->Form->end(__('Enviar'));
    ?>
</div>