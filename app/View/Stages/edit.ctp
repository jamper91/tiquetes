<div class="stages form">
    <?php echo $this->Form->create('Stage', array( 'enctype'=>'multipart/form-data')); ?>
    <fieldset>
        <legend><?php echo __('Editando Escenario'); ?></legend>
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
                    <!--<img id="viewprev" src="<?php // echo $this->webroot.'/img/escenario/'."esce_mapa"  ?>" align="center">-->
                    <?php // echo $this->Html->image( '/escenario/'.'esce_mapa'); ?>
                    <!--<img width="100px" id="imgprev" src="<?php // echo $this->webroot . '/img/escenario/' . $this->Form->data['Stage']['esce_mapa'] ?>" >-->
                </td>
                <td>&nbsp;</td>
                <td>
                    <?php echo $this->Form->input('esce_mapa', array('type' => 'file', 'label' => 'MAPA', 'required'=> 'true')); ?>
                </td>
            </tr>
        </table>
        <?php
        echo $this->Form->input('id');
        ?>              

    </fieldset>
    <?php // echo $this->Form->end(__('Submit',array('class'=>'btn btn-success'))); ?>
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