
<?php
echo $this->Html->script(array('jquery.multi-select'));
echo $this->Html->css(array('multi-select'));
?>
<div class="row-fluid">
    <div class="span6">
        <div class="widget-box">
            <div class="widget-title">
                <h5>
                    Editar Formulario
                </h5>
            </div>
            <div class="widget-content nopadding">
                <?php
                echo $this->Form->create('Form', array(
                    "class" => "form-horizontal"
                ));
                ?>
                <div class="control-group">
                    <label class="control-label">Evento</label>
                    <?php
                    echo $this->Form->input('event_id', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        "label" => "",
                        "options" => $events
                    ));
                    ?>
                </div>
                <div class="control-group">
                    <label class="control-label">Campos</label>
                    <?php
//                    echo $this->Form->input('PersonalDatum');
                    ?>
                    <?php
                    echo $this->Form->input('personal_datum_id', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        "label" => "",
                        "options" => $personalData,
                        "multiple" => true
                    ));
//                    ?>
                </div>
                <?php
                echo $this->Form->end(array(
                    "div" => array(
                        "class" => "form-actions"
                    ),
                    "class" => "btn btn-success",
                    "label" => "Actualizar"
                ));
                ?>
            </div>

        </div>

    </div>
</div>
<script>
    $('#FormPersonalDatumId').multiSelect({
        afterSelect: function(values) {
//                alert("Select value: " + values);
//            console.log($('#FormPersonalDatumId option[value="' + values + '"]').html());
            $('#FormPersonalDatumId option[value="' + values + '"]').attr("selected", "selected")
        }
    });
</script>