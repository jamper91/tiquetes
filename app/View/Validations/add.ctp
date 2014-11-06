
<div class="validations form">
    <?php echo $this->Form->create('Validation'); ?>
    <fieldset>
        <legend><?php echo __('Agregar validacion para el evento'); ?></legend>

        <table>
            <tr>
                <td>
                    <?php
                    echo $this->Form->input('event_id', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        "label" => "Evento",
                        "options" => $events,//"Event.even_nombre",
                        'required' => 'true',
                        "empty" => "Seleccione un Evento"
                    ));
                    ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('entrada_id', array(
                    'label' => 'Entrada',
                    'required' => 'true')); ?></td>
            </tr><?php
            //		echo $this->Form->input('descripcion');
            //		echo $this->Form->input('fechainicio');
            //		echo $this->Form->input('fechafin');
            //		echo $this->Form->input('cantidad_reingresos');
            //		echo $this->Form->input('categoria',array());
            ?>
            <tr>
                <td>
                    <!--id="EventsCategorias"-->
                    <?php
                    echo $this->Form->input('categoria_id', array("label" => "Categoria",'required' => 'true'));
                    ?>
                    <?php ?>
                </td>
            </tr>
            <tr>
                <td>
                    <!--id="EventsHotel"-->
                    <?php
                    echo $this->Form->input('cantidad_reingresos',array('label' => 'Cantidad de reingresos','required' => 'true'));
                    ?>
                </td>
            </tr>
            <?php echo $this->Form->input('dia', array('label'=>'',"type"=>"select", "style"=>array(
                'display:none'
            ))); ?>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Agregar')); ?>
</div>
<script>
    $("#ValidationEventId").change(function() {
        var datos2 = {
            event_id: $(this).val()
        };
        var url = urlbase + "categorias/getCategoriesByEvent.xml";
        ajax(url, datos2, function(xml) {
            $("#ValidationCategoriaId").html("<option>Seleccione una categoria</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("c");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#ValidationCategoriaId").append(html);
                }
            });
        });
        var url = urlbase + "events/getDaysByEvent.xml";
        ajax(url, datos2, function(xml) {
            $("#ValidationDia").html("<option>Seleccione un día</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("g");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#ValidationDia").append(html);
                }
            });
        });
        var url = urlbase + "entradas/getEntradasByEvent.xml";
        ajax(url, datos2, function(xml) {
            $("#ValidationEntradaId").html("<option>Seleccione una categoria</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("e");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#ValidationEntradaId").append(html);
                }
            });
        });
    });
</script>