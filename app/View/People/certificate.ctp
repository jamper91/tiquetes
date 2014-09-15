
<div class="people form">
    <?php echo $this->Form->create('Person'); ?>
    <fieldset>
        <legend><?php echo __('Generar certificado'); ?></legend>
        <?php
        
        echo $this->Form->input('codigo', array(
            'label' => 'Codigo de barras',
            'required' => 'false'
        ));
        echo $this->Form->input('cedula', array(
            'label' => 'Identificacion',
            'required' => 'false'
        ));
        
       ?>

    </fieldset>
    <?php echo $this->Form->end(__('Buscar')); ?>
</div>
<script>
    $(document).ready(function() {
        $("#PersonCodigo").keydown(function(event) {
            return soloNumeros(event);
        });
        
        $("#PersonCedula").keydown(function(event) {
            return soloNumeros(event);
        });
        
    });
</script>
