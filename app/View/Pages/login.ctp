<div class="pages form" align="center">
    <?php echo $this->Form->create('Page'); ?>
    <br><h2>Bienvenido por fabor ingrese el nit de su empresa y la contraseña que le fue asignada</h2><br>
    <table>
        <tr>
            <td>NIT</td>
            <td><?php
                echo $this->Form->input('nit', array(
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
    <a href="<?= $this->Html->url(array("controller" => "Pages", "action" => "remember")); ?>">Recordar Contraseña</a><br>
    <a href="<?= $this->Html->url(array("controller" => "Pages", "action" => "dont")); ?>">No tengo contraseña</a>
    <br>
    <br>
    <?php echo $this->Form->end(__('Ingresar')); ?>
</div>