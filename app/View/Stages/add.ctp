<div id="respuesta"></div>
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
                        'label' => ''
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
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<script>
    $(document).ready(function() {
        $("#CityStateId").html("");
        $("#CityCountryId").change(function() {
            var url = urlbase + "states/getStatesByCountry.xml";
            var datos = {
                country_id: $(this).val()
            };
            ajax(url, datos, function(xml) {
                $("#CityStateId").html("<option>Seleccione un Departamento</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("State");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#CityStateId").append(html);
                    }
                });
            });
        });

        $("input[name='file']").on("change", function() {
            var formData = new FormData($("#StageAddForm"));
            var ruta = urlbase + "stages/imagenAjax.xml";
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos) {
                    alert("salio a la imagen");
                    $("#respuesta").html(datos);
                }
            });
        });
    });
//        $("input[name='file']").on("change", function() {        
////        var formData = new FormData($("#StageAddForm"));
//            var ruta = urlbase + "stages/imagenAjax.xml";
//            var datos = {
//                file: $(this).val()
//            };
//            ajax(url, datos, function(xml) {
//                
//                $("datos", xml).each(function() {
//                    
//                        $("#respuesta").append(html);
//                    
//                });
//            });
//        
//    });

</script>