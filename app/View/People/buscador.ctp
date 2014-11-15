
<div class="people form">
    <?php echo $this->Form->create('Person'); ?>
    <fieldset>
        <legend><?php echo __('Buscar Persona'); ?></legend>
        <?php
        
        echo $this->Form->input('pers_documento', array(
            'label' => 'Identificacion',
            'required' => 'false'
        ));
        echo $this->Form->input('pers_primNombre', array(
            'label' => 'Nombres',
            'required' => 'false'
        ));
        echo $this->Form->input('pers_primApellido', array(
            'label' => 'Apellidos',
            'required' => 'false'
        ));
        
        echo $this->Form->input('pers_empresa', array(
            'label' => 'Entidad',
            'required' => 'false'
        ));
       ?>

    </fieldset>
    <?php echo $this->Form->end(__('Buscar')); ?>
</div>

<?php if (isset($datos)) { ?>
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Resultado de la b&uacute;squeda</h5>
            <?php  //var_dump($datos); die(); ?>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>
                            Documento
                        </th>
                        <th>
                            Nombres
                        </th>
                        <th>
                            Apellidos
                        </th>
                        <th>
                            Entidad
                        </th>
                        <th>
                            Opciones
                        </th>

                    </tr>
                </thead>
                <tbody>
    <?php
    foreach ($datos as $dato) {
        ?>
                        <tr>
                            <td>
                                <?= $dato["people"]["pers_documento"] ?>
                            </td>
                            <td>
                        <?= $dato["people"]["pers_primNombre"] ?>
                            </td>
                            <td>
                        <?= $dato["people"]["pers_primApellido"]  ?>
                            </td>
                          <td>
                        <?= $dato["people"]["pers_empresa"]  ?>
                            </td>
                            <td>
                                <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $dato['people']['id']),array('class'=>'btn btn-warning')); ?>
                                <?php if (in_array('eliminar', $this->Session->read('controlador')) || $this->Session->read('User.type_user_id') == 1) { ?>
                                <?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $dato['people']['id']), array('class' => 'btn btn-danger'), __('Esta seguro que desea eliminar esta persona', $dato['people']['id'])); ?>
                                <?php } ?>
                            </td>
                        </tr>

        <?php
    }
    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>