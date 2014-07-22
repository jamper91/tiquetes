<?php
echo $this->Html->script(array('jquery.multi-select'));
echo $this->Html->css(array('multi-select'));
?>
<div class="users form">    
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Crear Usuario'); ?></legend>
        <table>
            <tr>
                <td>Nombres</td>
                <td><input type="text" required="true" id="PeoplePers_primNombre" name="data[People][pers_primNombre]"/></td>
                <td>Apellidos</td>
                <td><input type="text" id="PeoplePers_primApellido" name="data[People][pers_primApellido]"/></td>
            </tr>
            <tr>
                <td><?php echo 'Tipo de Documento'; ?></td>
                <td><?php
                    echo $this->Form->input('document_type_id', array(
                        'label' => '',
                        "options" => $documentTypeName,
                        "empty" => "Seleccione un tipo de documento"
                    ));
                    ?>
                </td>
                <td>Número de Documento: </td>
                <td><input type="text" id="PeoplePers_documento" name="data[People][pers_documento]"/></td>
            </tr>
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
                <td>Dirección:</td>
                <td><input type="text" id="PeoplePers_direccion" name="data[People][pers_direccion]"/></td>
            </tr>
            <tr>
                <td>Teléfono</td>
                <td><input type="text" id="PeoplePers_telefono" name="data[People][pers_telefono]"/></td>
                <td>Celular</td>
                <td><input type="text" id="PeoplePers_celular" name="data[People][pers_celular]"/></td>
            </tr>
            <tr>
                <td>Fecha de Nacimiento</td>
                <td><input type="text" id="PeoplePers_fechNacimiento" name="data[People][pers_fechNacimiento]"/></td>
                <td>Tipo de Sangre</td>
                <td><input type="text" id="PeoplePers_tipoSangre" name="data[People][pers_tipoSangre]"/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" id="PeoplePers_mail" name="data[People][pers_mail]"/></td>
                <td>Tipo de Usuario</td>
                <td>
                    <?php
                    echo $this->Form->input('type_user_id', array(
                        'label' => '',
                        "options" => $typeUserName,
                        "empty" => "Seleccione"
                    ));
                    ?>
                </td>
            </tr>
            <tr>
                <td>Departamento</td>
                <td><?php
                    echo $this->Form->input('department_id', array(
                        'label' => '',
                        "options" => $departmentName,
                        "empty" => "Seleccione"
                    ));
                    ?></td>
                <td>Nombre de Usuario</td>
                <td><input name="data[User][username]" maxlength="20" id="UserUsuario" type="text"></td>
                

            </tr>
            <tr>
                <td>Contraseña</td>
                <td><input name="data[User][password]" id="UserPassword" type="password"></td>
                <td>Confirmar Contraseña</td>
                <td><input name="data[User][passwordConfirm]" id="UserPasswordConfirm" type="password"></td> 
                                
            </tr>
            <tr><td>Valido Desde</td>                
                <td>
                    <?php
                    echo $this->Form->input('validodesde', array(
                        'label' => ''
                    ));
                    ?>
                </td>
                <td>Valido Hasta</td>
                <td>
                    <?php
                    echo $this->Form->input('validohasta', array(
                        'label' => ''
                    ));
                    ?>
                </td>              
                
            </tr>
            <tr><td>Indentificador</td>
                <td>
                    <?php
                    echo $this->Form->input('Identificador', array(
                        'label' => ''
                    ));
                    ?>
                </td></tr>
        </table>
<!--        <table>
            <tr>
                <td>Permisos</td>
                <td><?php
                    echo $this->Form->input('Authorization', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        "label" => "",
                        "options" => $authorizations,
                        "multiple" => true
                    ));
//                    ?></td>
            </tr>
                    //echo $this->Form->input('type_user_id');
                        //echo $this->Form->input('document_type_id');
                        //echo $this->Form->input('department_id');                        
                        //echo $this->Form->input('city_id');

            <?php
            //echo $this->Form->input('Authorization');
            ?>
        </table>-->
    </fieldset>
    <?php echo $this->Form->end(__('Crear')); ?>
</div>


<script>
    $("#UserStateId").change(function() {
        var url2 = urlbase + "cities/getCitiesByState.xml";
        var datos2 = {
            state_id: $(this).val()
        };

        ajax(url2, datos2, function(xml) {
            $("#UserCityId").html("<option>Seleccione una ciudad</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("City");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();               
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#UserCityId").append(html);
                }
            });
        });
    });
    $(document).ready(function() {
        $("#UserAddForm").submit(function(e){
            
            if($("#UserPassword").val()===$("#UserPasswordConfirm").val()){
                return true;
            } else{
                alert("Error la contraseña no coinside con la confirmación");
                return false; 
            }
        });
        $("#UserStateId").html("");
        $("#UserCityId").html("");
        $("#UserCountryId").change(function() {
            var url = urlbase + "states/getStatesByCountry.xml";
            var datos = {
                country_id: $(this).val()
            };
            ajax(url, datos, function(xml) {
                $("#UserStateId").html("<option>Seleccione un Departamento</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("State");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#UserStateId").append(html);
                    }
                });
            });
        });
    });
    
    $('#AuthorizationAuthorization').multiSelect({
        afterSelect: function(values) {
                //alert("Select value: " + values);
//            console.log($('#FormPersonalDatumId option[value="' + values + '"]').html());
            $('#AuthorizationAuthorization option[value="' + values + '"]').attr("selected", "selected")
        }
    });

</script>
