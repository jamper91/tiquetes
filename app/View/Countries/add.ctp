<div class="row-fluid">
    <div class="span6">
        <div class="widget-box">
            <div class="widget-title">
                <h5>
                    Crear Pais
                </h5>
            </div>
            <div class="widget-content nopadding">
                <?php
                echo $this->Form->create('Country', array(
                    "class" => "form-horizontal"
                ));
                ?>
                <div class="control-group">
                    <label class="control-label">Nombre</label>
                    <?php
                    echo $this->Form->input('nombre', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        "label" => ""
                    ));
                    ?>
                </div>
                <?php
                echo $this->Form->end(array(
                    "div" => array(
                        "class" => "form-actions"
                    ),
                    "class" => "btn btn-success",
                    "label" => "Crear"
                ));
                ?>
            </div>

        </div>

    </div>
</div>
