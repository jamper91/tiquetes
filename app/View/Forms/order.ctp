
<?php
echo $this->Html->script(array('jquery.multi-select'));
echo $this->Html->css(array('multi-select'));


echo "<pre>";
var_dump($personalData);
//var_dump($this->request->data); 
echo "</pre>";
?>
<div class="row-fluid">
    <div class="span6">
        <div class="widget-box">
            <div class="widget-title">
                <h5>
                    Ordenar Formulario
                </h5>
            </div>
            <div class="widget-content nopadding">
                <?php
                echo $this->Form->create('Form', array(
                    "class" => "form-horizontal"
                ));
                ?>
                <?= $this->Form->input('id'); ?>
                <div class="control-group">
                    <table>
                        <?php
                        if ($personalData != '') {
                            $count = 0;
                            foreach ($personalData as $value) {
                                ?>

                                <tr>
                                    <td><label><?php echo '     ' . $value["PersonalDatum"]["descripcion"]; ?></label>
                                    </td>
                                    <td><input type="number" required="true" id="data[PersonalDatum][<?php echo $value["PersonalDatum"]["id"] ?>]" name="data[PersonalDatum][<?php echo $value["PersonalDatum"]["id"] ?>]" value="<?php echo $value["PersonalDatum"]["ordenar"]; ?>"/>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        ?>
                        <tr>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <?php
                echo $this->Form->end(array(
//                    "div" => array(
//                        "class" => "form-actions"
//                    ),
                    "class" => "btn btn-success",
                    "label" => "Confirmar"
                ));
                ?>
            </div>

        </div>

    </div>
</div>