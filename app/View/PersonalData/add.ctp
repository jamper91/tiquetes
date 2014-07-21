<div class="row-fluid">
    <div class="span6">
        <div class="widget-box">
            <div class="widget-title">
                <h5>
                    Agregar Campo
                </h5>
            </div>
            <div class="widget-content nopadding">
                <?php
                echo $this->Form->create('PersonalDatum', array(
                    "class" => "form-horizontal"
                ));
                ?>
                <div class="control-group">
                    <label class="control-label">Descripcion</label>
                    <?php
                    echo $this->Form->input('descripcion', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        "label" => "",
                        "class" => "span11"
                    ));
                    ?>
                </div>
                <div class="control-group">
                    <label class="control-label">Tipo</label>
                    <?php
                    $sizes = array("number"=>"Numerico","text"=>"Texto","data"=>"Fecha");
                    echo $this->Form->input('tipo', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        "label" => "",
                        "options"=>$sizes
                    ));
                    
//                    echo $this->Form->input(
//                            'size', array('options' => $sizes, 'default' => 'm')
//                    );
                    ?>
                </div>
                <div class="control-group">
                    <label class="control-label">Obligatorio</label>
                    <?php
                    echo $this->Form->input('obligatorio', array(
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