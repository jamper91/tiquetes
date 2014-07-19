<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Ingreso'); ?>
        </legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
        <?php
    
    echo $this->Html->link(
    'Registrar',
    '/users/add',
    array('class' => 'button', 'target' => '_blank')
);
    
    ?>
</div>