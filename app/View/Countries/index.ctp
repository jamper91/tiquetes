<?php
echo $this->Html->script(array('matrix.tables'));
?>
<div class="row-fluid">
    <div class="span12">
        <ul class="quick-actions">
            <li class="bg_lg">
                <a href="<?= $this->Html->url(array("controller"=>"countries","action"=>"add"))?>">
                    <i class="icon-plus">
                        
                    </i>
                    Crear Pais
                </a>
            </li>
        </ul>
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Pais</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($countries as $dato): ?>
                            <tr>
                                <td><?php echo $dato['Country']['id']; ?>&nbsp;</td>

                                <td><?php echo $dato['Country']['name']; ?>&nbsp;</td>

                                <td class="actions">
                                    <span class="btn btn-success btn-mini">
                                        <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $dato['Country']['id'])); ?>
                                    </span>
                                    <span class="btn btn-danger btn-mini">
                                        <?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $dato['Country']['id']), array(), __('Esta seguro que desea eliminar # %s?', $dato['Country']['name'])); ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>