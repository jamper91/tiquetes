<?php
echo $this->Html->script(array('jquery.multi-select', 'jscal2', 'es'));
echo $this->Html->css(array('multi-select', 'jscal2', 'steel', 'border-radius'));
?>
<div class="users form">    
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Crear Usuario'); ?></legend>
        <table>
            <tr>
                
                <td colspan="4" align="center">Número de Documento: <input type="text" required="true" id="PeoplePers_documento" name="data[People][pers_documento]"/> </td>
                <td><input type="hidden" name="data[Person][pers_id]" id="PeoplePers_id"></td>
            </tr>
            <tr>
                <td>Nombres</td>
                <td><input type="text" required="true" id="PeoplePers_primNombre" name="data[People][pers_primNombre]"/></td>
                <td>Apellidos</td>
                <td><input type="text" id="PeoplePers_primApellido" required="true" name="data[People][pers_primApellido]"/></td>
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
                        "empty" => "Seleccione Una Ciudad",
//                        'required'=>'true'
                    ));
                    ?>
                </td>
                <td>Dirección:</td>
                <td><input type="text" id="PeoplePers_direccion" name="data[People][pers_direccion]"/></td>
            </tr>
            <tr>
                <td>Teléfono</td>
                <td><input type="text" id="PeoplePers_telefono" name="data[People][pers_telefono]"/></td>
                <td>Fecha de Nacimiento<img src="<?php echo $this->webroot . '/img/calendario.png' ?>"  id="selector" name="selector" style="cursor:pointer" /></td>
                <td><input type="text" id="PeoplePers_fechNacimiento" name="data[People][pers_fechNacimiento]" readonly="readonly" /></td>
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
                <td>Área</td>
                <td><?php
                    echo $this->Form->input('department_id', array(
                        'label' => '',
                        "options" => $departmentName,
                        "empty" => "Seleccione"
                    ));
                    ?></td>
                <td>Nombre de Usuario</td>
                <td><input name="data[User][username]" required="true" maxlength="20" id="UserUsuario" type="text"></td>


            </tr>
            <tr>
                <td>Contraseña</td>
                <td><input name="data[User][password]" required="true" id="UserPassword" type="password"></td>
                <td>Confirmar Contraseña</td>
                <td><input name="data[User][passwordConfirm]" required="true" id="UserPasswordConfirm" type="password"></td> 

            </tr>
            <tr><td>Valido Desde<img src="<?php echo $this->webroot . '/img/calendario.png' ?>"  id="selector2" name="selector2" style="cursor:pointer" /></td>                
                <td>
                    <input id="validodesde" name="validodesde" readonly="readonly" type="text" required="true">
                    <?php
//                    echo $this->Form->input('validodesde', array(
//                        'label' => ''
//                    ));
                    ?>
                </td>
                <td>Valido Hasta<img src="<?php echo $this->webroot . '/img/calendario.png' ?>"  id="selector3" name="selector3" style="cursor:pointer" /></td>
                <td>
                    <input id="validohasta" name="validohasta" readonly="readonly" type="text" required="true">
                    <?php
//                    echo $this->Form->input('validohasta', array(
//                        'label' => ''
//                    ));
                    ?>
                </td>              

            </tr>
            <tr><td>Identificador</td>
                <td><input name="data[User][Identificador]"  id="UserIdentificador" type="text"></td>
            </tr>
        </table>



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
        $("#UserAddForm").submit(function(e) {

            if ($("#UserPassword").val() === $("#UserPasswordConfirm").val()) {
                return true;
            } else {
            $("#UserPassword").val("");
            $("#UserPasswordConfirm").val("");
            alert("Error la contraseña no coinside con la confirmación");
                return false;
            }
        });
        $("#UserStateId").html("");
//        $("#UserCityId").html("");
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
        $("#PeoplePers_documento").keyup(function() {
//            alert("aasd");
            var url = urlbase + "companies/search.xml";
            var datos = {
                documento: $(this).val()
            };
            ajax(url, datos, function(xml) {
                $("datos", xml).each(function() {
                    var obj = $(this).find("Person");
                    var nombre, apellido, ciudad, direccion, telefono, id, email;
                    id = $("id", obj).text();
                    nombre = $("pers_primNombre", obj).text();
                    apellido = $("pers_primApellido", obj).text();
                    ciudad = $("city_id", obj).text();
                    direccion = $("pers_direccion", obj).text();
                    telefono = $("pers_telefono", obj).text();
                    email = $("pers_mail", obj).text();
                    
                    if (nombre !== null) {
                        $("#PeoplePers_id").val(id);
                        $("#PeoplePers_primNombre").val(nombre);
                        $("#PeoplePers_primApellido").val(apellido);
                        $("#UserCityId option[value=" + ciudad + "]").attr("selected", true);
                        $("#PeoplePers_direccion").val(direccion);
                        $("#PeoplePers_telefono").val(telefono);
                        $("#PeoplePers_mail").val(email);
                    } else {
                        $("#PeoplePers_id").val();
                        $("#UserCityId option[value='']").attr("selected", true);
                        $("#PeoplePers_primNombre").val();
                        $("#PeoplePers_primApellido").val();
                        $("#PeoplePers_direccion").val();
                        $("#PeoplePers_telefono").val();
                        $("#PeoplePers_mail").val();
                    }
                });
            });
        });
    });



</script>
<script>
    Calendar.setup({
        inputField: "PeoplePers_fechNacimiento",
        trigger: "selector",
        onSelect: function() {
            this.hide()
        },
        dateFormat: "%Y-%m-%d"
    });
</script>
<script>
    Calendar.setup({
        inputField: "validodesde",
        trigger: "selector2",
        onSelect: function() {
            this.hide()
        },
        dateFormat: "%Y-%m-%d"
    });
</script>
<script>
    Calendar.setup({
        inputField: "validohasta",
        trigger: "selector3",
        onSelect: function() {
            this.hide()
        },
        dateFormat: "%Y-%m-%d"
    });
</script>
