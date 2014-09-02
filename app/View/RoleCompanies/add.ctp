<div class="roleCompanies form">
    <?php echo $this->Form->create('RoleCompany'); ?>
    <fieldset>
        <legend><?php echo __('Agregar Patrocinador'); ?></legend>
        <?php
        echo $this->Form->input('company_id', array(
            "div" => array(
                "class" => "controls"
            ),
            "label" => "Empresa",
            "empty" => "Seleccione una Empresa",
            'required' => 'true'
        ));

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
    <?php echo $this->Form->end(__('Registar')); ?>
</div>
<script language="javascript" type="text/javascript">
    $(document).ready(function() {
        $("#RoleCompanyCantidad").keydown(function(event) {
            return soloNumeros(event);
        });
        
        $("#RoleCompanyPrecio").keydown(function(event) {
            return soloNumeros(event);
        });
        
        $("#RoleCompanyItem").on('keyup', function(){ 
           $("#RoleCompanyItem").val(conMayusculas($(this).val()));
        });
    });
</script>