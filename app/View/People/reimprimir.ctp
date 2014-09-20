<div class="people form">
    <?php echo $this->Form->create('Person'); ?>
    <fieldset>
        <legend><?php echo __('Reimprimir Escarapela'); ?></legend>
        <?php
        echo $this->Form->input('event_id', array(
            "div" => array(
                "class" => "controls"
            ),
            "label" => "Evento",
            "options" => $events,
            "empty" => "Seleccione un evento",
            "required" => "true",
            "style" => array(
                "display:block"
            )
        ));
        ?>        
        <table  style=" padding-left: 10px">
            <tr>                           
                <td colspan="2" align="center" >
                    <input type="radio" name="data[Person][tipoE]" required="true" value="RFID" onclick="mostrar()" />RFID
                    <input type="radio" name="data[Person][tipoE]" required="true" value="Codigo Barra" onclick="ocultar()"/>Codigo de Barras
                    <input type="radio" name="data[Person][tipoE]" required="true" value="ambos" onclick="mostrar()" />Ambas
                </td>
            </tr>
        </table>
        <div name="rfid" id="rfid" style="display:none">
            <table  style=" padding-left: 10px">
                <tr>                           
                    <?php
                    echo $this->Form->input('input_codigo', array(
                        'label' => 'RFID',
                        'type' => 'password',
                    ));
                    ?>
                </tr>
            </table>

        </div>
        <?php
        echo $this->Form->input('pers_documento', array(
            'label' => 'Identificación',
        ));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Reimprimir')); ?>
</div>
<script>
//    
    function mostrar() {
        $("#rfid").css("display", "block");
    }
    function ocultar()
    {
        $("#rfid").css("display", "none");
    }
    $(document).ready(function() {
        $('#PersonEventId').val($('#GiftsEventEventId > option:first').val());
        $('#PersonPersDocumento'),val("");
//        $('#GiftsEventGiftId').val($('#GiftsEventGiftId > option:first').val());
    });
</script>
