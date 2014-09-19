<div class="entradasTorniquetes form">
    <?php echo $this->Form->create('EntradasTorniquete'); ?>
    <fieldset>
        <legend><?php echo __('Editar Accesos de Entradas'); ?></legend>
        <table>
            <tr>
                <td>
                    <?php
                    echo $this->Form->input('id');
                    echo $this->Form->input('entrada_id', array('label' => 'Entrada'));
                    ?>
                </td>
                <td>
                    <?php echo $this->Form->input('torniquete_id', array('label' => 'Punto de acceso')); ?>
                </td>
            </tr>
        </table>

    </fieldset>
    <?php echo $this->Form->end(__('Actualizar')); ?>
</div>

