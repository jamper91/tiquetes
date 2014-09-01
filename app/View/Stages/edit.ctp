<div class="stages form">
    <?php echo $this->Form->create('Stage', array('enctype' => 'multipart/form-data')); ?>
    <fieldset>
        <legend><?php echo __('Editando Escenario'); ?></legend>
        <?php
        if (CakeSession::read('sw') != '1') {
            if ($this->Form->data['Stage']['esce_mapa'] != "") {
                $nameimg = $this->Form->data['Stage']['esce_mapa'];
                CakeSession::write('nameimage', $nameimg);
                CakeSession::write('sw', '1');
            }
        }
        ?>
        <table>
            <tr>
                <td>
                    <?php
                    echo $this->Form->input('country_id', array(
                        'label' => 'PAIS',
                        "options" => $countries,
                        "empty" => "Seleccione un País"
                    ));
                    ?>

                </td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>
                    <?php
                    echo $this->Form->input('state_id', array(
                        'label' => 'DEPARTAMENTO',
                        "empty" => "Seleccione un Dpto"
                    ));
                    ?>

                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('city_id', array('label' => 'CIUDAD')); ?>
                </td>
                <td>&nbsp;</td>
                <td>
                    <?php echo $this->Form->input('esce_nombre', array('label' => 'NOMBRE')); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('esce_direccion', array('label' => 'DIRECCION')); ?>
                </td>
                <td>&nbsp;</td>
                <td>
                    <?php echo $this->Form->input('esce_telefono', array('label' => 'TELEFONO')); ?>
                </td>
            </tr>
            <tr>
                <td >
                    <?php
                    $sename = "";
                    $sename = CakeSession::read('nameimage');
                    $nombrese = $sename;
//                    debug($nombrese);
//                    $sename =$this->Session->read('nameimage'); 
                    ?>
                    <?php
                    //style="visibility: hidden"  , 'required' => 'true'
                    ?>
                    <img width="100px" style=""  id="imgprev" name="imgprev" src="<?php echo $this->webroot . '/img/escenario/' . $nombrese ?>" >
                    <input type="hidden" id="nameImage" name="nameImage" value="<?php echo $nombrese ?>"
                </td>
                <td>&nbsp;</td>
                <td>
                    <input type="checkbox" id="habimg" name="habimg">&nbsp;Cambiar imagen
                    <div id="imgyes" style=" display: none">
                        <?php
                        echo $this->Form->input('esce_mapa2', array('type' => 'file', 'label' => 'MAPA'));
                        ?>
                    </div>
                </td>
            </tr>
        </table>
        <?php
        echo $this->Form->input('id');
        ?>              

    </fieldset>
    <?php // echo $this->Form->end(__('Submit',array('class'=>'btn btn-success')));   ?>
    <br>
    <input type="submit" value="Actuailizar" class="btn btn-warning">
</div>
<script>
    $(document).ready(function() {
//        $("#state_id").html("");
//        $("#city_id").html("");


        $("#StageCountryId").change(function() {
            var url = urlbase + "states/getStatesByCountry.xml";
            var datos = {
                country_id: $(this).val()
            };
            ajax(url, datos, function(xml) {
                $("#StageStateId").html("<option>Seleccione un Dpto</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("State");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#StageStateId").append(html);
                    }
                });
            });
        });
        $("#StageStateId").change(function() {
            var url2 = urlbase + "cities/getCitiesByState.xml";
            var datos2 = {
                state_id: $(this).val()
            };

            ajax(url2, datos2, function(xml) {
                $("#StageCityId").html("<option>Seleccione una ciudad</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("City");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#StageCityId").append(html);
                    }
                });
            });
        });
    });
//       
</script>
<script>
    $("#habimg").change(function() {
//    alert($("#habimg").is(':checked'));
        if ($("#habimg").is(':checked') === true) {
            $("#imgyes").css("display", "block");
        } else {
            $("#imgyes").css("display", "none");
        }

    });
</script>