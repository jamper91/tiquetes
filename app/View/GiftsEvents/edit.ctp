<div class="giftsEvents form">
    <?php
    echo $this->Form->create('GiftsEvent');
    if (CakeSession::read('idEvent')== '') {
        CakeSession::write('idEvent', $this->Form->data['GiftsEvent']['event_id']);
    }
    ?>

    <fieldset>
        <legend><?php
            echo __('Editar consumible por Evento');
//            debug($this->Form->data['GiftsEvent']['event_id']);
////            if (CakeSession::read('idEvent') != $this->Form->data['GiftsEvent']['event_id'] && CakeSession::read('sw')!='1') {
//                CakeSession::write('idEvent', $this->Form->data['GiftsEvent']['event_id']);
//                CakeSession::write('sw', '1');
//            }
            ?></legend>
        <input type="hidden" id="event" name="event" value="<?php echo CakeSession::read('idEvent') ?>">
        <?php
        echo $this->Form->input('event_id', array(
            "div" => array(
                "class" => "controls"
            ),
            "label" => "Evento",
            "options" => $events,
            "empty" => "Seleccione un evento",
            'disabled' => 'true',
            "style" => array(
                "display:block",
            )
        ));
        echo $this->Form->input('categoria_id', array(
            "label" => "Categoria",
            "options" => $cat,
            "required" => "true"
        ));
        echo $this->Form->input('gift_id', array("label" => "Consumible"));
        echo $this->Form->input('dia', array(
            "label" => "Día del Evento",
            "type" => "text",
            'readonly' => 'readonly',
        ));
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