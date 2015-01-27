<div class="pages form" align="center">
    <?php echo $this->Form->create('Page'); ?>
    <br><h2>Bienvenido por fabor ingresa tu Usuario y Contraseña</h2><br>
    <table>
        <tr>
            <td>NIT</td>
            <td><?php
                echo $this->Form->input('username', array(
                    'label' => '',
                    'required' => 'true'
                ));
                ?>
            </td>
        </tr>
        <tr>
            <td>Contraseña</td>
            <td>
                <?php
                echo $this->Form->input('password', array(
                    'label' => '',
                    'required' => 'true'
                ));
                ?>
            </td>
        </tr>
    </table>
    <br>
    <a href="<?= $this->Html->url(array("controller" => "Pages", "action" => "remember2")); ?>">Recordar Contraseña</a><br>
    <br>
    <?php echo $this->Form->end(__('Ingresar')); ?>
</div>