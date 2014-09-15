<div class="companies form">
    <?php echo $this->Form->create('Company'); ?>
    <fieldset>
        <legend><?php echo __('Crear Empresa'); ?></legend>
        <br>
        <legend><?php echo __('Datos del Representante Legal'); ?></legend>
        <table>
            <tr>
                <td colspan="2" align="center"><?php
                    echo $this->Form->input('pers_documento', array(
                        'label' => 'Identificación',
                        'required' => 'true'
                    ));
                    ?></td>
            </tr>
            <tr>
                <td><?php
                    echo $this->Form->input('pers_primNombre', array(
                        'label' => 'Nombres',
                        'required' => 'true'
                    ));
                    ?></td>
                <td><?php
                    echo $this->Form->input('pers_primApellido', array(
                        'label' => 'Apellidos',
                        'required' => 'true'
                    ));
                    ?></td>
            </tr>
            <tr>
                <td><?php
                    echo $this->Form->input('country_id', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        "label" => "País",
                        "empty" => "Seleccione un País"
                    ));
                    ?></td>
                <td><?php
                    echo $this->Form->input('state_id', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        "label" => "Departamento",
                    ));
//                    
                    ?></td>
            </tr>
            <tr>
                <td><?php
                    echo $this->Form->input('city_id', array(
                        'label' => 'Ciudad',
                        "empty" => "Seleccione Una Ciudad",
                        'required' => 'true'
                    ));
                    ?></td>
                <td><?php
                    echo $this->Form->input('pers_direccion', array(
                        'label' => 'Dirección'
                    ));
                    ?></td>
            </tr>
            <tr>
                <td><?php
                    echo $this->Form->input('pers_telefono', array(
                        'label' => 'Teléfono',
                        'required' => 'true'
                    ));
                    ?></td>
                <td><input type="hidden" name="data[people][pers_id]" id="PeoplePers_id"></td>
            </tr>
        </table>
        <legend><?php echo __('Datos de la Empresa'); ?></legend>
        <table>
            <tr>
                <td><?php
                    echo $this->Form->input('empr_nit', array(
                        'label' => 'NIT'
                    ));
                    ?></td>
                <td><?php
                    echo $this->Form->input('empr_nombre', array(
                        'label' => 'Nombre',
                        'required' => 'true'
                    ));
                    ?></td>
            </tr>
            <tr>
                <td><?php
                    echo $this->Form->input('empr_telefono', array(
                        'label' => 'Teléfono',
                        'required' => 'true'
                    ));
                    ?></td>
                <td><?php
                    echo $this->Form->input('empr_mail', array(
                        'label' => 'E-mail',
                        'type' => 'email'
                    ));
                    ?></td>
            </tr>
            <tr>
                <td> <?php
                    echo $this->Form->input('empr_direccion', array(
                        'label' => 'Dirección'
                    ));
                    ?></td>
                <td><?php
                    echo $this->Form->input('empr_barrio', array(
                        'label' => 'barrio'
                    ));
                    ?></td>                
            </tr>
            <tr>
                <td><?php
                    echo $this->Form->input('empr_pagiWeb', array(
                        'label' => 'Página WEB'
                    ));
                    ?></td>
            </tr>
        </table>

    </fieldset>
    <?php echo $this->Form->end(__('Crear')); ?>
</div>
<script>
    $("#CompanyStateId").change(function() {
        var url2 = urlbase + "cities/getCitiesByState.xml";
        var datos2 = {
            state_id: $(this).val()
        };

        ajax(url2, datos2, function(xml) {
            $("#CompanyCityId").html("<option>Seleccione una ciudad</option>");
            $("datos", xml).each(function() {
                var obj = $(this).find("City");
                var valor, texto;
                valor = $("id", obj).text();
                texto = $("name", obj).text();
                if (valor) {
                    var html = "<option value='$1'>$2</option>";
                    html = html.replace("$1", valor);
                    html = html.replace("$2", texto);
                    $("#CompanyCityId").append(html);
                }
            });
        });
    });
    $(document).ready(function() {
        $("#UserAddForm").submit(function(e) {

            if ($("#UserPassword").val() === $("#UserPasswordConfirm").val()) {
                return true;
            } else {
                alert("Error la contraseña no coinside con la confirmación");
                return false;
            }
        });
        $("#CompanyStateId").html("");        
        $("#CompanyCountryId").change(function() {
            var url = urlbase + "states/getStatesByCountry.xml";
            var datos = {
                country_id: $(this).val()
            };
            ajax(url, datos, function(xml) {
                $("#CompanyStateId").html("<option>Seleccione un Departamento</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("State");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#CompanyStateId").append(html);
                    }
                });
            });
        });
        $("#CompanyPersDocumento").keyup(function() {
//            alert("aasd");
            var url = urlbase + "companies/search.xml";
            var datos = {
                documento: $(this).val()
            };
            ajax(url, datos, function(xml) {
                $("datos", xml).each(function() {
                    var obj = $(this).find("Person");
                    var nombre, apellido, ciudad, direccion, telefono, id;
                    id = $("id", obj).text();
                    nombre = $("pers_primNombre", obj).text();
                    apellido = $("pers_primApellido", obj).text();
                    ciudad = $("city_id", obj).text();                    
                    direccion = $("pers_direccion", obj).text();
                    telefono = $("pers_telefono", obj).text();
                    if(nombre !== null){                        
                        $("#PeoplePers_id").val(id);
                        $("#CompanyPersPrimNombre").val(nombre);
                        $("#CompanyPersPrimApellido").val(apellido);
                        $("#CompanyCityId option[value="+ciudad+"]").attr("selected",true);
                        $("#CompanyPersDireccion").val(direccion);
                        $("#CompanyPersTelefono").val(telefono);
                    } else {                       
                        $("#CompanyCityId option[value='']").attr("selected",true);
                        $("#CompanyPersPrimNombre").val();
                        $("#CompanyPersPrimApellido").val();
                        $("#CompanyPersDireccion").val();
                        $("#CompanyPersTelefono").val();
                    }
                });
            });
        });
//                    var obj = $(this).find("State");
//                    var valor, texto;
//                    valor = $("id", obj).text();
//                    texto = $("name", obj).text();
//                    if (valor) {
//                        var html = "<option value='$1'>$2</option>";
//                        html = html.replace("$1", valor);
//                        html = html.replace("$2", texto);
//                        $("#CompanyStateId").append(html);
//                    }
//                });
    });
</script>
