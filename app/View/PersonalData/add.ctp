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
                        "class" => "span11",
                        'required' => 'true'
                    ));
                    ?>
                </div>
                <div class="control-group">
                    <label class="control-label">Tipo</label>
                    <?php
                    $sizes = array("number" => "Numerico", "text" => "Texto", "checkbox" => "Checkboxes", "select" => "Campos de seleccion", "data" => "Fecha");
                    echo $this->Form->input('tipo', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        "label" => "",
                        "options" => $sizes,
                        'required' => 'true'
                    ));

//                    echo $this->Form->input(
//                            'size', array('options' => $sizes, 'default' => 'm')
//                    );
                    ?>
                </div>

                <table id="tablaopciones" style="display: none;">
                    <tr>
                        <td>
                            <div class="control-group" id="opciones" name="opciones">

                            </div>
                        </td>
                        <td>
                            <input type='button' value='Más' id='otro' name='otro' class="btn-mini btn-info">                            
                            <input type='button' value='Menos' id='menos' name='menos' class="btn-mini btn-danger">
                        </td>
                    </tr>
                </table>


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
                <input type="hidden" id="PersonalDatumCount" name="data[PersonalDatum][count]" value="1">
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
<script>
    $(document).ready(function() {
        $("#PersonalDatumTipo").change(function() {
            var valor = $("#PersonalDatumTipo").val();
//            alert(valor);
            if (valor === 'radio' || valor === 'checkbox' || valor === 'select') {
                $("#tablaopciones").removeAttr("style");
                var i = $("#PersonalDatumCount").val();
                var html = "<input class='controls' type='text' id='PersonalDatumOpcion" + i + "' name='data[PersonalDatum][opcion" + i + "]' required='true' placeholder='OPCION" + i + "'> ";
                $("#opciones").append(html);
            }
        });
        $("#otro").click(function() {
            $("#PersonalDatumCount").val(parseInt($("#PersonalDatumCount").val()) + 1);
            var i = $("#PersonalDatumCount").val();
            var html = "<input class='controls' type='text' id='PersonalDatumOpcion" + i + "' name='data[PersonalDatum][opcion" + i + "]' required='true' placeholder='OPCION" + i + "'> ";
            $("#opciones").append(html);
        });
        $("#menos").click(function() {
            var i = $("#PersonalDatumCount").val();
            if (i > 1) {
//            var html = "<input class='controls' type='text' id='PersonalDatumOpcion" + i + "' name='data[PersonalDatum][opcion" + i + "]' required='true' placeholder='OPCION" + i + "'> ";
                $("#PersonalDatumOpcion" + i).remove();
                $("#PersonalDatumCount").val(parseInt($("#PersonalDatumCount").val()) - 1);
            }
        });
    });

</script>