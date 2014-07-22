<div id="respuesta"></div>
<div class="stages form">
    <?php echo $this->Form->create('Stage'); ?>
    <fieldset>
        <legend><?php echo __('Add Stage'); ?></legend>

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
    $(function() {
        $("input[name='file']").on("change", function() {
            var formData = new FormData($("#StageAddForm"));
            var ruta = "/app/View/Stages/imagen-ajax.ctp";
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos) {
                    $("#respuesta").html(datos);
                }
            });
        });
    });
</script>