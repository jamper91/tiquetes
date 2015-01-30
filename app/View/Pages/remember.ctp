<div class="pages form" align="center">
    <br><h2>Bienvenido por fabor ingrese el NIT de su empresa, su número de documento y un correo electronico para el envio de su contraseña</h2><br>
    <?php
    echo $this->Form->create('Page');
    echo $this->form->label("NIT");
    echo $this->Form->input('nit', array(
        'label' => '',
        'required' => 'true'
    ));
    echo $this->form->label("Documento");
    echo $this->Form->input('documento', array(
        'label' => '',
        'required' => 'true'
    ));
    echo $this->form->label("Email");
    echo $this->Form->input('email', array(
        'label' => '',
        'required' => 'true'
    ));
    echo $this->form->label("");
    echo $this->Form->end(__('Enviar'));
    ?>
</div>