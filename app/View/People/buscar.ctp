<div class="people form">
    <?php echo $this->Form->create('Person'); ?>
    <fieldset>
        <legend><?php echo __('Buscar Persona'); ?></legend>

        <table>
            <tr>
                <td>
                    <?=
                    $this->Form->input('pers_documento', array(
                        'required' => false
                    ));
                    ?>
                </td>
                <td>
                    <?=
                    $this->Form->input('pers_primNombre', array(
                        'required' => false
                    ));
                    ?>
                </td>
                <td>
                    <?=
                    $this->Form->input('pers_segNombre', array(
                        'required' => false
                    ));
                    ?>
                </td>
                <td>
<?=
$this->Form->input('pers_primApellido', array(
    'required' => false
));
?>
                </td>

            </tr>
            <tr>

                <td>
<?=
$this->Form->input('pers_segApellido', array(
    'required' => false
));
?>
                </td>
                <td>
                    <?=
                    $this->Form->input('pers_direccion', array(
                        'required' => false
                    ));
                    ?>
                </td>
                <td>
<?=
$this->Form->input('pers_barrio', array(
    'required' => false
));
?>
                </td>
                <td>
                    <?=
                    $this->Form->input('pers_telefono', array(
                        'required' => false
                    ));
                    ?>
                </td>

            </tr>
            <tr>

                <td>
    <?=
    $this->Form->input('pers_celular', array(
        'required' => false
    ));
    ?>
                </td>
                <td>
<?=
$this->Form->input('pers_tipoSangre', array(
    'required' => false
));
?>
                </td>
                <td>
<?=
$this->Form->input('pers_mail', array(
    'required' => false
));
?>
                </td>
            </tr>
        </table>
    </fieldset>
<?php echo $this->Form->end(__('Buscar')); ?>
</div>
<?php if (isset($datos)) { ?>
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Resultado de la b&uacute;squeda</h5>

        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>
                            Documento
                        </th>
                        <th>
                            Nombres
                        </th>
                        <th>
                            Apellidos
                        </th>
                        <th>
                            Telefono
                        </th>
                        <th>
                            Fecha Nacimiento
                        </th>
                        <th>
                            Correo
                        </th>
                        <th>
                            Opciones
                        </th>

                    </tr>
                </thead>
                <tbody>
    <?php
    foreach ($datos as $dato) {
        ?>
                        <tr>
                            <td>
                                <?= $dato["people"]["pers_documento"] ?>
                            </td>
                            <td>
                        <?= $dato["people"]["pers_primNombre"] . ' ' . $dato["people"]["pers_segNombre"] ?>
                            </td>
                            <td>
                        <?= $dato["people"]["pers_primApellido"] . ' ' . $dato["people"]["pers_segApellido"] ?>
                            </td>
                            <td>
        <?= $dato["people"]["pers_telefono"] ?>
                            </td>
                            <td>
        <?= $dato["people"]["pers_fechNacimiento"] ?>
                            </td>
                            <td>
        <?= $dato["people"]["pers_mail"] ?>
                            </td>
                            <td>
                                <div onclick="asociarTarjeta(<?= $dato['people']['id'] ?>)">
                                    <label id="lbl<?= $dato['people']['id'] ?>" href="#" >
                                        Asociar Tarjeta
                                    </label>
                                    <input id="input<?= $dato['people']['id'] ?>" type="password" style="display: none" />
                                    <a id="lnk<?= $dato['people']['id'] ?>" onclick="asociarTarjeta2(<?= $dato['people']['id'] ?>)" style="display: none">
                                        Asociar
                                    </a>
                                </div>

                            </td>
                        </tr>

        <?php
    }
    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>

<script>
    $(document).ready(
            function()
            {
                $("#event_id").change(function() {
                    var event_id = $(this).val();
                    alert(event_id);
                    $("#enviar-usu-proy").click(function() {
                        //$("#datosUsuario").val('algo');
                        $("#datosEvent").val(event_id);
                        $("#formpdf").submit();
                    });
                });


            });
    function asociarTarjeta(id)
    {
        $("#lbl" + id).css("display", "none");
        $("#input" + id).css("display", "block");
        $("#lnk" + id).css("display", "block");
        $("#input" + id).focus();


    }
    function asociarTarjeta2(id)
    {
        var url = '<?= $this->Html->url(array("controller" => "users", "action" => "asociartarjeta.xml")) ?>';
        //Tomo el codigo
        var codigo = $("#input" + id).val();
        if (codigo != "")
        {
            var datos = {
                person_id: id,
                codigo:codigo
            }
            ajax(url, datos, function(xml)
            {
                $("datos", xml).each(function() {
                    var texto;
                    texto = $(this).text();
                    alert(texto);

                });
            });
        }


    }

</script>


