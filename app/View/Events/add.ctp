<?php
echo $this->Html->script(array('jquery.multi-select', 'jscal2', 'es'));
echo $this->Html->css(array('multi-select', 'jscal2', 'steel', 'border-radius'));
?>
<div class="events form">
    <?php // echo $this->Form->create('Event',array('enctype'=>'multipart/form-data')); ?>
    <form method="POST" action="add" id="Event" name="Event" enctype="multipart/form-data">
        <fieldset>
            <legend><?php echo __('AGREGAR EVENTO'); ?></legend>
            <table>
                <tr>
                    <td></td>
                    <td>
                        <?php
                        echo $this->Form->input('country_id', array(
                            "div" => array(
                                "class" => "controls"
                            ),
                            'label' => 'Pais',
                            "options" => $countriesName,
                            "empty" => "Seleccione un Pais"
                        ));
                        ?>
                    </td>
                    <td></td>
                    <td>
                        <?php
                        echo $this->Form->input('state_id', array(
                            "div" => array(
                                "class" => "controls"
                            ),
                            "label" => "Departamento",
                            "empty" => "seleccione un Departamento"
                        ));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <?php
                        echo $this->Form->input('city_id', array(
                            "div" => array(
                                "class" => "controls"
                            ),
                            "label" => "Ciudad",
                            "options" => $cities,
                            "empty" => "seleccione una ciudad",
//                            'required' => 'true'
                        ));
                        ?> 
                    </td>
                    <td></td>
                    <td>
                        <?php
                        echo $this->Form->input('stage_id', array(
                            "div" => array(
                                "class" => "controls"
                            ),
                            "label" => "Escenario",
                            "options" => $stages, //"Stage.esce_nombre",
                            "empty" => "seleccione un escenario",
                            'required' => 'true'
                        ));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <?php
                        echo $this->Form->input('event_type_id', array(
                            "div" => array(
                                "class" => "controls"
                            ),
                            "label" => "Tipo de Evento",
                            "options" => $eventTypesName,
                            "empty" => "Seleccione Tipo de Evento",
                            'required' => 'true'
                        ));
                        ?>
                    </td>
                    <td></td>
                    <td>
                        <?php
                        echo $this->Form->input('even_codigo', array('label' => 'Codigo del evento', 'required' => 'true'));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <?php
                        echo $this->Form->input('even_nombre', array('label' => 'Nombre', 'required' => 'true'));
                        ?> 
                    </td>
                    <td></td>
                    <td>
                        <?php
                        echo $this->Form->input('even_numeResolucion', array('label' => 'Numero de Resolucion', 'required' => 'true'));
                        ?>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <label  for= "EventPalaClave" > Palabra clave </label> 
                        <?php
                        echo $this->Form->textarea('even_palaClave', array ( 'escape'  =>  false, 'autocapitalize'=>'off', 'required' => 'true', 'rows'=>'2', 'cols'=>'30','maxlength'=>'20' ));
                        ?>
                    </td>
                    <td></td>
                    <td>
                        <label  for= "EventObservaciones" > Observaciones </label> 
                        <?php
                        echo $this->Form->textarea('even_observaciones', array ( 'escape'  =>  false, 'autocapitalize'=>'off', 'rows'=>'2', 'cols'=>'30','maxlength'=>'20' ));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td ><img src="<?php echo $this->webroot . '/img/calendario.png' ?>"  id="selector" name="selector" style="cursor:pointer" /></td>
                    <td>
                        <?php
                        echo $this->Form->input('even_fechInicio', array('label' => 'fecha inicio', 'maxlength' => '15', 'readonly' => 'readonly', 'required' => 'true'));
                        ?>                        
                    </td>                    
                    <td><img src="<?php echo $this->webroot . '/img/calendario.png' ?>" id="selector2" name="selector2" style="cursor:pointer" /></td>
                    <td>
                        <?php
                        echo $this->Form->input('even_fechFinal', array('label' => 'fecha final', 'maxlength' => '15', 'readonly' => 'readonly', 'required' => 'true'));
                        ?> 
                    </td>                    
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <?php
                        echo $this->Form->input('even_imagen1', array('type' => 'file', 'label' => 'Imagen 1'));//, 'required' => 'true'
                        ?>
                    </td>
                    <td></td>
                    <td>
                        <?php
                        echo $this->Form->input('even_imagen2', array('type' => 'file', 'label' => 'Imagen 2'));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><br></td>
                    <td>
                        <?php
                        ?>
                    </td>
                    <td></td>
                    <td>
                        <?php
                        ?>
                    </td>
                </tr>
                <tr>
                    <td ><img src="<?php echo $this->webroot . '/img/calendario.png' ?>"  id="selector3" name="selector3" style="cursor:pointer" /></td>
                    <td>
                        <?php
                        echo $this->Form->input('fechainiciopublicacion', array('label' => 'fecha inicio de publicacion', 'maxlength' => '15', 'readonly' => 'readonly'));
                        ?>                        
                    </td>                    
                    <td><img src="<?php echo $this->webroot . '/img/calendario.png' ?>" id="selector4" name="selector4" style="cursor:pointer" /></td>
                    <td>
                        <?php
                        echo $this->Form->input('fechafinpublicacion', array('label' => 'fecha final de publicacion', 'maxlength' => '15', 'readonly' => 'readonly'));
                        ?> <br>
                    </td>                    
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <?php
                        echo $this->Form->input('even_publicar', array('type' => 'checkbox', 'label' => 'Publicar evento'));
//                        echo $this->Form->input('even_estado', array('type' => 'checkbox', 'label' => 'estado'));
                        ?>
                        <br>
                    </td>
                    <td></td>
                    <td>
                        <?php
                        echo $this->Form->input('escarapela_id', array(
                            "div" => array(
                                "class" => "controls"
                            ),
                            "label" => "Tipo de escarapela",
                            "options" => $escarapelas, //"Stage.esce_nombre",
                            "empty" => "seleccione el tipo de escarapela",
//                            'required' => 'true'
                        ));
                        ?>
                    </td>
                </tr>

                <tr>
                    <td><br></td>
                    <td>
                        <!--id="EventsCompany"-->
                        <div class="control-group" >
                            <label class="control-label">Empresa Organizadora</label>
                            <?php
                            echo $this->Form->input('Company', array(
                                "div" => array(
                                    "class" => "controls"
                                ),
                                "label" => "",
                                "options" => $companies,
                                "multiple" => true
                            ));
//                    
                            ?>
                        </div>
                        <?php
                        ?>
                    </td>
                    <td></td>
                    <td>
                        <!--id="EventsCommittee"-->
                        <div class="control-group" >
                            <label class="control-label">Comites</label>
                            <?php
                            echo $this->Form->input('Committee', array(
                                "div" => array(
                                    "class" => "controls"
                                ),
                                "label" => "",
                                "options" => $committees,
                                "multiple" => true
                            ));
//                    
                            ?>
                        </div>
                        <?php
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>
                        <!--id="EventsPayment"-->
                        <div class="control-group"  >
                            <label class="control-label">Medios de Pago</label>
                            <?php
                            echo $this->Form->input('Payment', array(
                                "div" => array(
                                    "class" => "controls"
                                ),
                                "label" => "",
                                "options" => $paymentsName,
                                "multiple" => true
                            ));
//                    
                            ?>
                        </div>
                        <?php
                        ?>
                    </td>
                    <td></td>
                    <td>
                        <!--id="EventsHotel"-->
                        <div class="control-group" >
                            <label class="control-label">Hoteles</label>
                            <?php
                            echo $this->Form->input('Hotel', array(
                                "div" => array(
                                    "class" => "controls"
                                ),
                                "label" => "",
                                "options" => $hotels,
                                "multiple" => true
                            ));
//                    
                            ?>
                        </div>
                        <?php
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <!--id="EventsCategorias"-->
                        <div class="control-group"  >
                            <label class="control-label">Categorias</label>
                            <?php
                            echo $this->Form->input('Categoria', array(
                                "div" => array(
                                    "class" => "controls"
                                ),
                                "label" => "",
                                "options" => $categorias,
                                "multiple" => true
                            ));
//                    
                            ?>
                        </div>
                        <?php
                        ?>
                    </td>
                    <td></td>
                    <td>
                        <!--id="EventsHotel"-->
                        
                        <?php
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><br></td>
                    <td>
                        <!--                        <div class="control-group"  >
                            <label class="control-label">Tipos de Registro</label>
            <?php
//                echo $this->Form->input('RegistrationType', array(
//                    "div" => array(
//                        "class" => "controls"
//                    ),
//                    "label" => "",
//                    "options" => $registrationTypes,
//                    "multiple" => true
//                ));
//                    
            ?>
                        </div>-->
                        <?php
                        ?>
                    </td>
                    <td></td>
                    <td>
                        <?php
                        ?>
                    </td>
                </tr>
            </table>

        </fieldset>
        <input type="submit" value="Agregar" class="btn btn-success" >
    </form>
    <?php // echo $this->Form->end(__('Submit'));         ?>
</div>
<script>
    $("#country_id").change(function() {
//        alert($(this).val());
        if ($(this).val() !== "") {
            var url4 = urlbase + "cities/getCitiesByCountry.xml";
            var datos4 = {
                country_id: $(this).val()
            };
            ajax(url4, datos4, function(xml) {
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
        }
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

        $("#city_id").change(function() {
            var url2 = urlbase + "stages/getStagesByCity.xml";
            var datos2 = {
                city_id: $(this).val()
            };
            ajax(url2, datos2, function(xml) {
                $("#stage_id").html("<option>Seleccione un escenario</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("Stage");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#stage_id").append(html);
                    }
                });
            });

        });
    });
    $('#Categoria').multiSelect({
        afterSelect: function(values) {
            //  alert("Select value: " + values);
//            console.log($('#FormPersonalDatumId option[value="' + values + '"]').html());
            $('#Categoria option[value="' + values + '"]').attr("selected", "selected")
        }
    });
    $('#Payment').multiSelect({
        afterSelect: function(values) {
            //  alert("Select value: " + values);
//            console.log($('#FormPersonalDatumId option[value="' + values + '"]').html());
            $('#Payment option[value="' + values + '"]').attr("selected", "selected")
        }
    });//
    $('#Committee').multiSelect({
        afterSelect: function(values) {
            //  alert("Select value: " + values);
//            console.log($('#FormPersonalDatumId option[value="' + values + '"]').html());
            $('#Committee option[value="' + values + '"]').attr("selected", "selected")
        }
    });
    $('#Company').multiSelect({
        afterSelect: function(values) {
            //  alert("Select value: " + values);
//            console.log($('#FormPersonalDatumId option[value="' + values + '"]').html());
            $('#Company option[value="' + values + '"]').attr("selected", "selected")
        }
    });
    $('#Hotel').multiSelect({
        afterSelect: function(values) {
            //  alert("Select value: " + values);
//            console.log($('#FormPersonalDatumId option[value="' + values + '"]').html());
            $('#Hotel option[value="' + values + '"]').attr("selected", "selected")
        }
    });
    $('#RegistrationType').multiSelect({
        afterSelect: function(values) {
            //  alert("Select value: " + values);
//            console.log($('#FormPersonalDatumId option[value="' + values + '"]').html());
            $('#RegistrationType option[value="' + values + '"]').attr("selected", "selected")
        }
    });
</script>
<script>
    Calendar.setup({
        inputField: "even_fechInicio",
        trigger: "selector",
        onSelect: function() {
            this.hide()
        },
        dateFormat: "%Y-%m-%d"
    });
</script>
<script>
    Calendar.setup({
        inputField: "even_fechFinal",
        trigger: "selector2",
        onSelect: function() {
            this.hide()
        },
        dateFormat: "%Y-%m-%d"
    });
</script>
<script>
    Calendar.setup({
        inputField: "fechainiciopublicacion",
        trigger: "selector3",
        onSelect: function() {
            this.hide()
        },
        dateFormat: "%Y-%m-%d"
    });
</script>
<script>
    Calendar.setup({
        inputField: "fechafinpublicacion",
        trigger: "selector4",
        onSelect: function() {
            this.hide()
        },
        dateFormat: "%Y-%m-%d"
    });
</script>