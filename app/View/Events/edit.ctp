<?php
echo $this->Html->script(array('jquery.multi-select', 'jscal2', 'es'));
echo $this->Html->css(array('multi-select', 'jscal2', 'steel', 'border-radius'));
?>
<div class="events form">
    <?php echo $this->Form->create('Event', array('enctype' => 'multipart/form-data')); ?>
    <fieldset>
        <legend><?php echo __('Editar Evento'); ?></legend>
        <?php
//        echo $this->Form->input('id');
//        echo $this->Form->input('stage_id');
//        echo $this->Form->input('event_type_id');
//        echo $this->Form->input('even_nombre');
//        echo $this->Form->input('even_numeResolucion');
//        echo $this->Form->input('even_palaClave');
//        echo $this->Form->input('even_observaciones');
//        echo $this->Form->input('even_estado');
//        echo $this->Form->input('even_imagen1');
//        echo $this->Form->input('even_imagen2');
//        echo $this->Form->input('even_fechInicio');
//        echo $this->Form->input('even_fechFinal');
//        echo $this->Form->input('even_publicar');
//        echo $this->Form->input('even_codigo');
//        echo $this->Form->input('Committee');
//        echo $this->Form->input('Company');
//        echo $this->Form->input('Hotel');
//        echo $this->Form->input('Payment');
//        echo $this->Form->input('RegistrationType');
        ?>
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
                            'required' => 'true'
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
                        <!--<input name="EvenFechInicio" id="EvenFechInicio" readonly="readonly" required="true" maxlength="15" value="<?php // echo $this->Form->data['Event']['even_fechInicio'];?>">-->
                        <?php
                        echo $this->Form->input('EvenFechInicio', array('label' => 'fecha inicio', 'maxlength' => '15', 'readonly' => 'readonly', 'required' => 'true', 'value'=> $this->Form->data['Event']['even_fechInicio']));
                        ?>                        
                    </td>                    
                    <td><img src="<?php echo $this->webroot . '/img/calendario.png' ?>" id="selector2" name="selector2" style="cursor:pointer" /></td>
                    <td>
                        <?php
                        echo $this->Form->input('EvenFechFinal', array('label' => 'fecha inicio', 'maxlength' => '15', 'readonly' => 'readonly', 'required' => 'true', 'value'=> $this->Form->data['Event']['even_fechFinal']));
                        ?> 
                    </td>                    
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <?php
                        echo $this->Form->input('even_imagen1', array('type' => 'file', 'label' => 'Imagen 1', 'required' => 'true'));
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
                        echo $this->Form->input('EvenFechainiciopublicacion', array('label' => 'fecha inicio de publicacion', 'maxlength' => '15', 'readonly' => 'readonly', 'required' => 'true', 'value'=> $this->Form->data['Event']['fechainiciopublicacion']));
//                        echo $this->Form->input('fechainiciopublicacion', array('label' => 'fecha inicio de publicacion', 'maxlength' => '15', 'readonly' => 'readonly'));
                        ?>                        
                    </td>                    
                    <td><img src="<?php echo $this->webroot . '/img/calendario.png' ?>" id="selector4" name="selector4" style="cursor:pointer" /></td>
                    <td>
                        <?php
                        echo $this->Form->input('EvenFechafinpublicacion', array('label' => 'fecha final de publicacion', 'maxlength' => '15', 'readonly' => 'readonly', 'required' => 'true', 'value'=> $this->Form->data['Event']['fechafinpublicacion']));
//                        echo $this->Form->input('fechafinpublicacion', array('label' => 'fecha final de publicacion', 'maxlength' => '15', 'readonly' => 'readonly'));
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
                                "options" => $payments,
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
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<script>
    $("#EventCountryId").change(function() {
//        alert($(this).val());
        if ($(this).val() !== "") {
            var url4 = urlbase + "cities/getCitiesByCountry.xml";
            var datos4 = {
                EventCountryId: $(this).val()
            };
            ajax(url4, datos4, function(xml) {
                $("#EventCityId").html("<option>Seleccione una ciudad</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("City");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#EventCityId").append(html);
                    }
                });
            });
        }
    });

    $("#EventStateId").change(function() {
        var url2 = urlbase + "cities/getCitiesByState.xml";
        var datos2 = {
            EventStateId: $(this).val()
        };
        ajax(url2, datos2, function(xml) {
            $("#EventCityId").html("<option>Seleccione una ciudad</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("City");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#EventCityId").append(html);
                }
            });
        });
    });

    $(document).ready(function() {
//        $("#state_id").html("");
//        $("#city_id").html("");
        $("#EventCountryId").change(function() {
            var url = urlbase + "states/getStatesByCountry.xml";
            var datos = {
                EventCountryId: $(this).val()
            };
            ajax(url, datos, function(xml) {
                $("#EventStateId").html("<option>Seleccione un Departamento</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("State");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#EventStateId").append(html);
                    }
                });
            });
        });

        $("#EventCityId").change(function() {
            var url2 = urlbase + "stages/getStagesByCity.xml";
            var datos2 = {
                EventCityId: $(this).val()
            };
            ajax(url2, datos2, function(xml) {
                $("#EventStageId").html("<option>Seleccione un escenario</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("Stage");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#EventStageId").append(html);
                    }
                });
            });

        });
    });
    $('#PaymentPayment').multiSelect({
        afterSelect: function(values) {
            //  alert("Select value: " + values);
//            console.log($('#FormPersonalDatumId option[value="' + values + '"]').html());
            $('#Payment option[value="' + values + '"]').attr("selected", "selected")
        }
    });//
    $('#CommitteeCommittee').multiSelect({
        afterSelect: function(values) {
            //  alert("Select value: " + values);
//            console.log($('#FormPersonalDatumId option[value="' + values + '"]').html());
            $('#Committee option[value="' + values + '"]').attr("selected", "selected")
        }
    });
    $('#CompanyCompany').multiSelect({
        afterSelect: function(values) {
            //  alert("Select value: " + values);
//            console.log($('#FormPersonalDatumId option[value="' + values + '"]').html());
            $('#Company option[value="' + values + '"]').attr("selected", "selected")
        }
    });
    $('#HotelHotel').multiSelect({
        afterSelect: function(values) {
            //  alert("Select value: " + values);
//            console.log($('#FormPersonalDatumId option[value="' + values + '"]').html());
            $('#Hotel option[value="' + values + '"]').attr("selected", "selected")
        }
    });
    $('#RegistrationTypeRegistrationType').multiSelect({
        afterSelect: function(values) {
            //  alert("Select value: " + values);
//            console.log($('#FormPersonalDatumId option[value="' + values + '"]').html());
            $('#RegistrationType option[value="' + values + '"]').attr("selected", "selected")
        }
    });
</script>
<script>
    Calendar.setup({
        inputField: "EventEvenFechInicio",
        trigger: "selector",
        onSelect: function() {
            this.hide()
        },
        dateFormat: "%Y-%m-%d"
    });
</script>
<script>
    Calendar.setup({
        inputField: "EventEvenFechFinal",
        trigger: "selector2",
        onSelect: function() {
            this.hide()
        },
        dateFormat: "%Y-%m-%d"
    });
</script>
<script>
    Calendar.setup({
        inputField: "EventEvenFechainiciopublicacion",
        trigger: "selector3",
        onSelect: function() {
            this.hide()
        },
        dateFormat: "%Y-%m-%d"
    });
</script>
<script>
    Calendar.setup({
        inputField: "EventEvenFechafinpublicacion",
        trigger: "selector4",
        onSelect: function() {
            this.hide()
        },
        dateFormat: "%Y-%m-%d"
    });
</script>