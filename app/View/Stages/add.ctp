<div class="stages form">
    <form method="POST" action="add" id="Stage" name="Stage" enctype="multipart/form-data">
    <?php // echo $this->Form->create('Stage'); ?>
    <fieldset>
        <legend><?php echo __('AGREGAR ESCENARIO'); ?></legend>
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
                        "empty" => "Seleccione Una Ciudad",
                        'required'=> 'true'
                    ));
                    ?>
                </td>
                <td><?php echo 'Nombre' ?></td>           
                <td>
                    <?php
                    echo $this->Form->input('esce_nombre',array(
                        'label' => '',
                        'required'=> 'true'
                    ));
                    ?>
                </td>
            </tr>
            <tr>
                <td><?php echo 'Direccion' ?></td>
                <td>
                    <?php
                    echo $this->Form->input('esce_direccion',array(
                        'label' => ''
                    ));
                    ?>
                </td>
                <td><?php echo 'telefono' ?></td>
                <td>
                    <?php
                    echo $this->Form->input('esce_telefono', Array(
                        'label'=>''
                    ));
                    ?>
                </td>
            </tr>
            <tr>
                <td><?php echo 'mapa' ?></td>
                <td>
                    <!--<input type="file" id="doc_file" name="doc_file">-->
                    <?php echo $this->Form->input('doc_file', array('type' => 'file', 'label' => '')); //, 'required'=> 'true'
                    ?>
                </td>
            </tr>
        </table>


    </fieldset>
    <?php // echo $this->Form->end(__('Submit')); ?>
        <br>
        <input type="submit" value="Crear" class="btn btn-success">
    </form>
</div>
<script>
    $(document).ready(function() {
//        $("#state_id").html("");
//        $("#city_id").html("");
        
        $("#country_id").change(function() {
            var url = urlbase + "states/getStatesByCountry.xml";
            var datos = {
                country_id: $(this).val()
            };
            ajax(url, datos, function(xml) {
                $("#state_id").html("<option>Seleccione un Departamento</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("State");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#state_id").append(html);
                    }
                });
            });
        });
        $("#state_id").change(function() {
            var url2 = urlbase + "cities/getCitiesByState.xml";
            var datos2 = {
                state_id: $(this).val()
            };

            ajax(url2, datos2, function(xml) {
                $("#city_id").html("<option>Seleccione una ciudad</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("City");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#city_id").append(html);
                    }
                });
            });
        });

//        $("#doc_file").change(function() {
//            alert("entra");
////            var ruta = urlbase + "stages/imagenAjax.xml";
////            alert("entro a la imagen:  "+$("#file").val());
//            var url3 = urlbase + "stages/imagenAjax.xml";
//            var datos3 = {
//                doc_file: $(this).val()
//            };
//            ajax(url3, datos3, function(xml) {
////                $("#StageCityId").html("<option>Seleccione una ciudad</option>");
//                $("datos", xml).each(function() {
////                    alert("regresa");
//                    var obj = $(this).text();
////                    var obj = $(xml).find("datos");
//                    alert(obj.toString());
//                });
//            });
////            $.ajax({
////                url: ruta,
////                type: "POST",
////                data: $("#Image").serialize(), ,
////                        contentType: false,
////                processData: false,
////                success: function(data) {
////                    alert("salio a la imagen" + data);
////                    $("#respuesta").html(data);
////                }
////            });
//        });
    });
//       
</script>