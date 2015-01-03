<div class="preguntas form">
    <?php echo $this->Form->create('Pregunta'); ?>
    <fieldset>
        <legend><?php echo __('Agregar Respuestas'); ?></legend>
        <table>
            <tr>
                <td><h5>Enunciado</h5></td>
            </tr>
            <tr>
                <td><?php echo($pregunta) ?></td>
            </tr>
        </table>
        <table id="table" name="table">
            <tr>
                <td id="resp" style="display: none"><h5>Respuestas</h5></td>
            </tr>
        </table>
        <?php
        echo $this->Form->input('respuesta', array('label' => 'Digite la respuesta'));
        ?>
    </fieldset>
    <input type="hidden" id="cuenta" name="cuenta" value="0">
    <table>
        <tr>
            <td><input type="button" value="Agregar" id="add" name="add"></td>
            <td><?php echo $this->Form->end(__('Crear')); ?></td>
        </tr>
    </table>
</div>

<script>
    $(document).ready(function(){
        $("#cuenta").val('0');
    });
    $("#add").click(function() {
        var x = $("#PreguntaRespuesta").val();
        var y = $("#cuenta").val();
        var z = parseInt(y) + 1;
        $("#cuenta").val(z);
        var html = "<tr><td>" + x + "<input type='hidden' name ='respuesta" + z + "' value ='" + x + "'></td></tr>";
        $("#table").append(html);
        document.getElementById('resp').style.display = 'block';
        $("#PreguntaRespuesta").val('');
    });
    

</script>