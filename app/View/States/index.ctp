<?php
echo $this->Html->script(array('matrix.tables'));
?>
<div class="row-fluid">
    <div class="span12">
        <ul class="quick-actions">
            <li class="bg_lg">
                <a href="<?= $this->Html->url(array("controller"=>"states","action"=>"add"))?>">
                    <i class="icon-plus">
                        
                    </i>
                    Crear Departamento
                </a>
            </li>
            <li class="bg_lg">
                <a href="<?= $this->Html->url(array("controller"=>"countries","action"=>"index"))?>">
                    <i class="icon-reorder">
                        
                    </i>
                    Paises
                </a>
            </li>
        </ul>
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Ciudades</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Pais</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($states as $state): ?>
                            <tr>
                                <td><?php echo $state['State']['id']; ?>&nbsp;</td>

                                <td><?php echo $state['State']['name']; ?>&nbsp;</td>
                                <td>
                                    <?php echo $state['Country']['name']; ?>
                                </td>
                                <td class="center">
                                    <span class="btn btn-success btn-mini">
                                        <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $state['State']['id'])); ?>
                                    </span>
                                    <span class="btn btn-danger btn-mini">
                                        <?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $state['State']['id']), array(), __('Esta seguro que desea eliminar # %s?', $state['State']['name'])); ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
