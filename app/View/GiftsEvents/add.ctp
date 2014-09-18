<div class="giftsEvents form">
    <?php echo $this->Form->create('GiftsEvent'); ?>
    <fieldset>
        <legend><?php echo __('Consumibles por Evento'); ?></legend>
        <?php
        echo $this->Form->input('event_id', array(
            "div" => array(
                "class" => "controls"
            ),
            "label" => "Evento",
            "options" => $events,
            "empty" => "Seleccione un evento",
            "style" => array(
                "display:block"
            )
        ));

        echo $this->Form->input('categoria_id', array("label" => "Categoria"));
        echo $this->Form->input('gift_id', array("label" => "Consumible"));
        echo $this->Form->input('dia', array("label" => "Día del Evento", "type"=>"select"));
              
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Registrar')); ?>
</div>
<script>
    $(document).ready(function() {
        $("#GiftsEventEventId").change(function() {
            var url2 = urlbase + "gifts/getGiftWhitoutEvent.xml";
            var datos2 = {
                event_id: $(this).val()
            };
            ajax(url2, datos2, function(xml) {
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
            var url = urlbase + "categorias/getCategoriesByEvent.xml";            
            ajax(url, datos2, function(xml) {
                $("#GiftsEventCategoriaId").html("<option>Seleccione una categoria</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("c");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#GiftsEventCategoriaId").append(html);
                    }
                });
            });
            
            var url = urlbase + "events/getDaysByEvent.xml";            
            ajax(url, datos2, function(xml) {
                $("#GiftsEventDia").html("<option>Seleccione un día</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("g");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#GiftsEventDia").append(html);
                    }
                });
            });
        });
    });
</script>