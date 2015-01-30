<!--<div class="text">
    <form >
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Enter Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Enter Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="InputEmailFirst" name="InputEmail" placeholder="Enter Email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Confirm Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="InputEmailSecond" name="InputEmail" placeholder="Confirm Email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputMessage">Enter Message</label>
                    <div class="input-group">
                        <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>
    </div>-->
<div class="pages form">
    <?php echo $this->Form->create('Person'); ?>
    <fieldset>
        <h2>Bienvenido, por favor ingresa tus datos personales</h2>
        <table>
            <tr>
                <td><label for="PersonPersDocumento">Identificación</label></td>
                <td>
                    <div class="input text required">

                        <input id="PersonPersDocumento" type="text" required="required" maxlength="50" name="data[Person][pers_documento]" autofocus="true"/>
                        <input id="buscar" type="button"  name="buscar" value='Buscar' class="btn-info"/>
                    </div>
                </td>
                <td><label for="PersonDocumentTypeId">Tipo de Documento</label></td>
                <td>
                    <?php
                    echo $this->Form->input('document_type_id', array(
                        "div" => array(
                            "class" => "input text"
                        ),
                        "label" => "",
                        "options" => $documentTypes,
                        "required" => "true",
                    ));
                    ?>
                </td>
            </tr>
            <tr>
                <td><label for="PersonPersPrimNombre">Nombres</label></td>
                <td>
                    <?php
                    echo $this->Form->input('pers_primNombre', array(
                        'label' => '',
                    ));
                    ?>
                </td>
                <td><label for="PersonPersPrimApellido">Apellidos</label></td>
                <td>
                    <?php
                    echo $this->Form->input('pers_primApellido', array(
                        'label' => '',
                    ));
                    ?>
                </td>

            </tr>
            <tr>
            <tr>
                <td><label for="PersonPersTelefono">Teléfono</label></td>
                <td>
                    <?php
                    echo $this->Form->input('pers_telefono', array(
                        'label' => '',
                    ));
                    ?>
                </td>
                <td><label for="PersonPersemail">Email</label></td>
                <td>
                    <?php
                    echo $this->Form->input('pers_mail', array(
                        'label' => '',
                        'type' => 'email'
                    ));
                    ?>
                </td>
            </tr>
            <tr>
                <td><label for="PersonObservaciones">Usuario</label></td>
                <td>
                    <?php
                    echo $this->Form->input('observaciones', array(
                        'label' => '',
                    ));
                    ?>
                </td>
                <td><label for="PersonObservaciones">Contraseña</label></td>
                <td>
                    <?php
                    echo $this->Form->input('pers_institucion', array(
                        'label' => '',
                        'type' => 'password'
                    ));
                    ?>
                </td>
            </tr>
            <tr>
                <td><label for="PersonRecordarContraseña">Confirmar</label></td>
                <td>
                    <?php
                    echo $this->Form->input('recordarContraseña', array(
                        'label' => '',
                        'type' => 'password'
                    ));
                    ?>
                </td>
            </tr>

        </table>

        <div id="adicionales" name="adicionales" style="display: none;" >

            <input type="hidden" name="data[people][pers_id]" id="PeoplePers_id">
        </div>


    </fieldset>
    <input value="Crear" id="crear" name="crear" type="submit" class="btn-success" width="20" height="15">
</div>


<script>
    $("#PersonRegistroForm").submit(function(e) {

        if ($("#PersonPersInstitucion").val() === $("#PersonRecordarContraseña").val()) {
            return true;
        } else {
            $("#PersonPersInstitucion").val("");
            $("#PersonRecordarContraseña").val("");
            alert("Error la contraseña no coinside con la confirmación");
            return false;
        }
    });
    $("#buscar").click(function() {
        var url = urlbase + "companies/search.xml";
        var datos = {
            documento: $("#PersonPersDocumento").val()
        };
        ajax(url, datos, function(xml) {
            $("datos", xml).each(function() {
                var obj = $(this).find("Person");
                var nombre, td, apellido, cat, ciudad, direccion, telefono, exp, ciu, sec, mail, ins, st, car, pai, emp, cel, observa;
                id = $("id", obj).text();
                td = $("document_type_id", obj).text();
                cat = $("categoria_id", obj).text();
                nombre = $("pers_primNombre", obj).text();
                apellido = $("pers_primApellido", obj).text();
                ciudad = $("city_id", obj).text();
                direccion = $("pers_direccion", obj).text();
                telefono = $("pers_telefono", obj).text();
                cel = $("pers_celular", obj).text();
                mail = $("pers_mail", obj).text();
                ciu = $("ciudad", obj).text();
                ins = $("pers_institucion", obj).text();
                car = $("cargo", obj).text();
                exp = $("pers_expedicion", obj).text();
                emp = $("pers_empresa", obj).text();
                pai = $("pais", obj).text();
                st = $("stan", obj).text();
                sec = $("sector", obj).text();
                observa = $("observaciones", obj).text();
                if (nombre !== "") {
                    $("#PeoplePers_id").val(id);
                    $("#PersonPersPrimNombre").val(nombre);
                    $("#PersonPersPrimApellido").val(apellido);
                    $("#PersonPersDireccion").val(direccion);
                    $("#PersonPersTelefono").val(telefono);
                    $("#PersonPersExpedicion").val(exp);
                    $("#PersonCiudad").val(ciu);
                    $("#PersonPersMail").val(mail);
                    $("#PersonPersInstitucion").val(ins);
                    $("#PersonCargo").val(car);
                    $("#PersonPersEmpresa").val(emp);
                    $("#PersonPersCelular").val(cel);
                    $("#PersonPais").val(pai);
                    $("#PersonObservaciones").val(observa);
                    $("#PersonShelfId").val($('#PersonShelfId > option:first').val());
                    $('#PersonCategoriaId').val($('#PersonCategoriaId > option:first').val());
                    $('#PersonSector').val(sec);
                    $('#PersonCategoriaId option[value="' + cat + '"]').attr("selected", true);
                    if (cat === 2) {
                        $("#PersonShelfId").removeAttr("disabled");
                        $("#PersonShelfId").attr("required", true);
                    } else {
                        $("#PersonShelfId").attr("disabled", "disabled");
                    }
                    $('#PersonShelfId option[value="' + st + '"]').attr("selected", true);
                    $('#PersonDocumentTypeId option[value="' + td + '"]').attr("selected", true);
                } else {
                    $("#PeoplePers_id").val("");
                    $("#PersonPersPrimNombre").val("");
                    $("#PersonPersPrimApellido").val("");
                    $("#PersonPersDireccion").val("");
                    $("#PersonPersTelefono").val("");
                    $("#PersonPersExpedicion").val("");
                    $("#PersonCiudad").val("");
                    $("#PersonPersMail").val("");
                    $("#PersonPersInstitucion").val("");
                    $("#PersonCargo").val("");
                    $("#PersonPersEmpresa").val("");
                    $("#PersonPersCelular").val("");
                    $("#PersonPais").val("");
                    $("#PersonObservaciones").val("");
                    $("#PersonShelfId").val($('#PersonShelfId > option:first').val());
                    $('#PersonCategoriaId').val($('#PersonCategoriaId > option:first').val());
                    $('#PersonSector').val("");
                    $("#PersonShelfId").attr("disabled", "disabled");
                    $("#PersonObservaciones").val("");
                    alert("No se encuentra una persona registrada con ese número de documento");
                }
            });
        });
    });
    
    
</script>


