<div class="pages form" align="center">
    <?php echo $this->Form->create('Page'); ?>
    <table>
        <tr>
            <td><?php
                echo $this->Form->input('nit', array(
                    'label' => 'NIT',
                    'required' => 'true'
                ));
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                echo $this->Form->input('password', array(
                    'label' => 'Contraseña',
                    'required' => 'true'
                ));
                ?>
            </td>
        </tr>
    </table>
    <br>
    <a href="<?= $this->Html->url(array("controller" => "Pages", "action" => "remember")); ?>">Recordar Contraseña</a>
    <br>
    <br>
    <?php echo $this->Form->end(__('Ingresar')); ?>
</div>