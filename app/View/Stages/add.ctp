
<div class="stages form">
    <?php echo $this->Form->create('Stage'); ?>
    <fieldset>
        <legend><?php echo __('Add Stage'); ?></legend>
        <table>
            <tr>
                <td><?php echo 'País' ?></td>
                <td><?php
                    echo $this->Form->input('country_id', array(
                        'label' => '',
                        "options" => $countriesName,
                        "empty" => "Seleccione un País"
                    ));
                    ?>
                </td>
                <td><?php echo 'Departamento' ?></td>
                <td><?php
                    echo $this->Form->input('state_id', array(
                        'label' => '',
                        "empty" => "Seleccione un Dpto"
                    ));
                    ?>
                </td>
            </tr>
            <tr>
                <td><?php echo 'Ciudad' ?></td>
                <td>
                    <?php
                    echo $this->Form->input('city_id', array(
                        'label' => '',
                        "empty" => "Seleccione Una Ciudad"
                    ));
                    ?>
                </td>
            </tr>
        </table>
        <?php
        echo $this->Form->input('esce_nombre');
        echo $this->Form->input('esce_direccion');
        echo $this->Form->input('esce_telefono');
        echo $this->Form->input('esce_mapa');
        ?>

        <input type="file" id="file" name="file" >
        <div id="respuesta"></div>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<script>
    $(document).ready(function() {
        $("#StageStateId").html("");
        $("#StageCityId").html("");
        $("#StageCountryId").change(function() {
            var url = urlbase + "states/getStatesByCountry.xml";
            var datos = {
                country_id: $(this).val()
            };
            ajax(url, datos, function(xml) {
                $("#StageStateId").html("<option>Seleccione un Departamento</option>");
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

        $("input[name='file']").on("change", function() {
            var ruta = urlbase + "stages/imagenAjax.xml";
            alert("entro a la imagen:  "+$("#file").val());
            $.ajax({
                url: ruta,
                type: "POST",
                data: {"file": $("#file").val()},
                contentType: false,
                processData: false,
                success: function(data) {
                    alert("salio a la imagen"+data);
                    $("#respuesta").html(data);
                }
            });
        });
    });
//       
</script>