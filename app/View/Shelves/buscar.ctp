
<div class="people form">
    <?php echo $this->Form->create('Shelf'); ?>
    <fieldset>
        <legend><?php echo __('Buscar Stands'); ?></legend>
        <?php
        echo $this->Form->input('codigo', array(
            'label' => 'Stand',
        ));
        echo $this->Form->input('esta_nombre', array(
            'label' => 'Nombre',
            'required' => 'false'
        ));
        echo $this->form->input('genero', array(
            'label' => 'Genero',
        ));
        echo $this->Form->input('representante', array(
            'label' => 'Representante',
        ));

        echo $this->form->input('ubicacion', array(
            'label' => 'Ubicacion',
        ));
        ?>

    </fieldset>
    <?php echo $this->Form->end(__('Buscar')); ?>
</div>

<?php if (isset($datos)) { ?>
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Resultado de la b&uacute;squeda</h5>
            <?php //var_dump($datos); die();  ?>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>
                            Stand
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Genero
                        </th>

                        <th>
                            Representante
                        </th>
                        <th>
                            Ubicacion
                        </th>
                        
<!--                        <th>
                            Mts
                        </th>-->
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($datos as $dato) {
                        ?>
                        <tr>
                            <td>
                                <?= $dato["shelves"]["codigo"] ?>
                            </td>
                            <td>
                                <?= $dato["shelves"]["esta_nombre"] ?>
                            </td>
                            <td>
                                <?= $dato["shelves"]["genero"] ?>
                            </td>
                            <td>
                                <?= $dato["shelves"]["representante"] ?>
                            </td>
                            <td>
                                <?= $dato["shelves"]["ubicacion"] ?>
                            </td>
        <!--                            <td>
                            <?= $dato["shelves"]["mts"] ?>
                            </td>-->
                            <td>

                                <?php if (in_array('eliminar', $this->Session->read('controlador')) || $this->Session->read('User.type_user_id') == 1) { ?>
                                    <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $dato['shelves']['id']), array('class' => 'btn btn-warning')); ?>
                                    <?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $dato['shelves']['id']), array('class' => 'btn btn-danger'), __('Esta seguro que desea eliminar el stand', $dato['shelves']['esta_nombre'])); ?>
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