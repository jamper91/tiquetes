
<div class="row-fluid">
    <div class="span6">
        <div class="widget-box">
            <div class="widget-title">
                <h5>
                    Crear Ciudad
                </h5>
            </div>
            <div class="widget-content nopadding">
                <?php
                echo $this->Form->create('City', array(
                    "class" => "form-horizontal"
                ));
                ?>
                <div class="control-group">
                    <label class="control-label">Pais</label>
                    <?php
                    echo $this->Form->input('country_id', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        "label" => "",
                        "empty" => "Seleccione un País"
                    ));
                    ?>
                </div>
                <div class="control-group">
                    <label class="control-label">Departamento</label>
                    <?php
//                    echo $this->Form->input('PersonalDatum');
                    ?>
                    <?php
                    echo $this->Form->input('state_id', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        "label" => "",
                    ));
//                    
                    ?>
                </div>
                <div class="control-group">
                    <label class="control-label">Nombre</label>
                    <?php
//                    echo $this->Form->input('PersonalDatum');
                    ?>
                    <?php
                    echo $this->Form->input('name', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        "label" => ""
                    ));
//                    
                    ?>
                </div>
                <?php
                echo $this->Form->end(array(
                    "div" => array(
                        "class" => "form-actions"
                    ),
                    "class" => "btn btn-success",
                    "label" => "Crear"
                ));
                ?>
            </div>

        </div>

    </div>
</div>
<script>
    $(document).ready(function() {
        $("#CityStateId").html("");
        $("#CityCountryId").change(function() {
            var url = urlbase + "states/getStatesByCountry.xml";
            var datos = {
                country_id: $(this).val()
            };
            ajax(url, datos, function(xml) {
                $("#CityStateId").html("<option>Seleccione un Departamento</option>");
                $("datos", xml).each(function() {
                    var obj = $(this).find("State");
                    var valor, texto;
                    valor = $("id", obj).text();
                    texto = $("name", obj).text();
                    if (valor) {
                        var html = "<option value='$1'>$2</option>";
                        html = html.replace("$1", valor);
                        html = html.replace("$2", texto);
                        $("#CityStateId").append(html);
                    }
                });
            });
        });
    });

</script>