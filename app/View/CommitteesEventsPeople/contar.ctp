<?php
echo $this->Html->script(array('jquery.multi-select'));
echo $this->Html->css(array('multi-select'));
?>
        <div class="people form">
            <form method="POST" action="contar" id="Committee" name="Committee" enctype="multipart/form-data">
                <fieldset>
                    <legend><?php echo __('Crear Persona'); ?></legend>
                    <input type= 'hidden' name='event_id' id="event_id" value=<?php echo $event_id?>>
                    <input type= 'hidden' name='committees_id' id="committees_id" value=<?php echo $committees_id?>>
                    <input type= 'hidden' name='cantidad' id="cantidad" value=<?php echo $cantidad?>>

                    <?php
                    $cant = $cantidad;
                    echo $this->Form->input('pers_documento', array(
                        'label' => 'Identificación',
                    ));
                    echo $this->Form->input('pers_primNombre', array(
                        'label' => 'Nombres',
                    ));
                    echo $this->Form->input('pers_primApellido', array(
                        'label' => 'Apellidos',
                    ));
                    // echo $this->Form->input('ciudad', array(
                    //     'label' => 'Ciudad',
                    //     'required' => 'true'
                    // ));
                    echo $this->Form->input('pers_direccion', array(
                        'label' => 'Direccion'
                    ));
                    // echo $this->Form->input('pers_telefono', array(
                    //     'label' => 'Telefono',
                    //     'required' => 'true'
                    // ));
                    echo $this->Form->input('pers_mail', array(
                        'label' => 'E-mail',
                        'type' => 'email'
                    ));

                    ?>       

                </fieldset>

                    <input type="button" value="Registrar" onclick="javascript:registrar(document.forms['Committee'])">

            </form>
        </div>

<script>
$(document).ready(function() {

    $("#pers_documento").keyup(function() {
        var url = urlbase + "companies/search.xml";
        var datos = {
            documento: $(this).val()
        };
        ajax(url, datos, function(xml) {
            $("datos", xml).each(function() {
                var obj = $(this).find("Person");
                var nombre, apellido, ciudad, direccion, telefono;
                nombre = $("pers_primNombre", obj).text();
                apellido = $("pers_primApellido", obj).text();
                //ciudad = $("city_id", obj).text();                    
                direccion = $("pers_direccion", obj).text();
                telefono = $("pers_mail", obj).text();
                if(nombre !== null){
                    $("#pers_primNombre").val(nombre);
                    $("#pers_primApellido").val(apellido);
                   // $("#CompanyCityId option[value="+ciudad+"]").attr("selected",true);
                    $("#pers_direccion").val(direccion);
                    $("#pers_mail").val(telefono);
                } else {
                    //$("#CompanyCityId option[value='']").attr("selected",true);
                    $("#pers_primNombre").val();
                    $("#pers_primApellido").val();
                    $("#pers_direccion").val();
                    $("#pers_mail").val();
                }
            });
        });
    });       
});

function registrar(frm)
    {
        var cant = $('#cantidad').val();
        var url = urlbase + "committeesEventsPeople/registrarPersona.xml";
        var datos = {
            documento: $("#pers_documento").val(),
            nombre: $("#pers_primNombre").val(),
            apellido: $("#pers_primApellido").val(),
            direccion: $("#pers_direccion").val(),
            correo: $("#pers_mail").val(),
            event_id: $('#event_id').val(),
            committee_id: $('#committees_id').val(),
            cantidad : cant,

        };

        ajax(url, datos, function(xml) {
            
            $("datos", xml).each(function() {
                
                var obj = $(this).find("person");
                var valor;
                valor = $("valor", obj).text();
                    if (valor != null) 
                    {
                        var aux = cant -1;
                        $('#cantidad').val(aux);
                        $("#pers_documento").val("");
                        $("#pers_primNombre").val("");
                        $("#pers_primApellido").val("");
                        $("#pers_direccion").val("");
                        $("#pers_mail").val("");
                     }
                    else
                    {
                        alert("Error al registrar la persona");
                    }

                    if($('#cantidad').val() == 0)
                    {
                        alert('El registro de todos los integrantes del comité ha sido exitoso');
                        window.location.href = "add";
                    }
                
                // else
                // {
                //   alert("El registro de todos los integrantes del comité ha sido exitoso");  
                // }
                
                    
            });
        });
    
    } 
</script>