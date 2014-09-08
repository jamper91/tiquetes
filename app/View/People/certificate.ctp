
<div class="people form">
    <?php echo $this->Form->create('Person'); ?>
    <fieldset>
        <legend><?php echo __('Generar certificado'); ?></legend>
        <?php
        
        echo $this->Form->input('codigo', array(
            'label' => 'Codigo de barras',
            'required' => 'true'
        ));
        
       ?>

    </fieldset>
    <?php echo $this->Form->end(__('Buscar')); ?>
</div>

