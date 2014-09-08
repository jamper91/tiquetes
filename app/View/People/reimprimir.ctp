<div class="people form">
    <?php echo $this->Form->create('Person'); ?>
    <fieldset>
        <legend><?php echo __('Reimprimir Escarapela'); ?></legend>
        <?php
        
        echo $this->Form->input('pers_documento', array(
            'label' => 'Identificación',
        ));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Reimprimir')); ?>
</div>

