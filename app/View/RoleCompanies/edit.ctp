<div class="roleCompanies form">
    <?php echo $this->Form->create('RoleCompany'); ?>
    <fieldset>
        <legend><?php echo __('Editar'); ?></legend>
        <?php
//        if ($RoleCompany != array()) {
//            $selected1 = $RoleCompany[0]["RoleCompany"]["company_id"];

            echo $this->Form->input('company_id', array(
                "div" => array(
                    "class" => "controls"
                ),
                "label" => "Empresa",
//                'selected'=>$selected1,
                "empty" => "Seleccione una Empresa",
                'required' => 'true'
            ));
//        }
        echo $this->Form->input('event_id', array(
            "div" => array(
                "class" => "controls"
            ),
            "label" => "Evento",
            "empty" => "Seleccione un Evento",
            'required' => 'true'
        ));

        echo $this->Form->input('item', array(
            'label' => 'Servicio',
            'required' => 'true'
        ));

        echo $this->Form->input('cantidad', array(
            'label' => 'Cantidad',
            'required' => 'true'
        ));

        echo $this->Form->input('precio', array(
            'label' => 'Precio',
            'required' => 'true'
        ));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Editar')); ?>
</div>
<script language="javascript" type="text/javascript">
    $(document).ready(function() {
        $("#RoleCompanyCantidad").keydown(function(event) {
            return soloNumeros(event);
        });

        $("#RoleCompanyPrecio").keydown(function(event) {
            return soloNumeros(event);
        });

        $("#RoleCompanyItem").on('keyup', function() {
            $("#RoleCompanyItem").val(conMayusculas($(this).val()));
        });
    });
</script>