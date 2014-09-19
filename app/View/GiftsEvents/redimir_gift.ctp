<div class="giftsEvents form">
    <?php echo $this->Form->create('GiftsEvent'); ?>
    <fieldset>
        <legend><?php echo __('Redimir Consumibles'); ?></legend>
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
        echo $this->Form->input('gift_id', array(
            "div" => array(
                "class" => "controls"
            ),
            "label" => "Consumible",
            "empty" => "Seleccione un consumible",
            "required" => "true",
            "style" => array(
                "display:block"
            )
        ));
        echo $this->Form->input('documento', array(
            "label" => "Documento",
            "type" => "text",
        ));
//        echo $this->Form->input('rfid', array(
//            "label" => "RFID",
//            "type" => "text",
//        ));
//        echo $this->Form->input('barcode', array(
//            "label" => "Codigo de barras",
//            "type" => "text",
//        ));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Buscar')); ?>
</div>
<script>
    $(document).ready(function() {
        $('#GiftsEventEventId').val($('#GiftsEventEventId > option:first').val());
        $('#GiftsEventGiftId').val($('#GiftsEventGiftId > option:first').val());
        $("#GiftsEventEventId").change(function() {
            var datos2 = {
                event_id: $(this).val()
            };
            var url = urlbase + "giftsevents/getGiftsByEvent.xml";
            ajax(url, datos2, function(xml) {
                $("#GiftsEventGiftId").html("<option>Seleccione un consumible</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("g");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#GiftsEventGiftId").append(html);
                    }
                });
            });
        });
    });
</script>
