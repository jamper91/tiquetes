<div class="pages form" align="center">
    <?php
    echo $this->Form->create('Page');
    echo $this->Form->input('nit', array(
        'label' => 'NIT',
        'required' => 'true'
    ));
    echo $this->Form->input('email', array(
        'label' => 'Email',
        'required' => 'true'
    ));
    echo $this->Form->end(__('Enviar'));
    ?>
</div>