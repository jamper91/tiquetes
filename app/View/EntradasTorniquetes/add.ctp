<div class="entradasTorniquetes form">
    <?php echo $this->Form->create('EntradasTorniquete'); ?>
    <fieldset>
        <legend><?php echo __('Agregar Torniquete a Accesos'); ?></legend>
        <?php        
        echo $this->Form->input('entrada_id');
        echo $this->Form->input('torniquete_id');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions"></div>
