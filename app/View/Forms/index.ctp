<?php
echo $this->Html->script(array('matrix.tables'));
?>
<div class="row-fluid">
    <div class="span12">
        <ul class="quick-actions">
            <li class="bg_lg">
                <a href="<?= $this->Html->url(array("controller"=>"forms","action"=>"add"))?>">
                    <i class="icon-plus">
                        
                    </i>
                    Crear Formulario
                </a>
            </li>
            <li class="bg_lg">
                <a href="<?= $this->Html->url(array("controller"=>"PersonalData","action"=>"index"))?>">
                    <i class="icon-reorder">
                        
                    </i>
                    Campos
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
                            <th>Evento</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($forms as $dato): ?>
                            <tr>
                                <td><?php echo $dato['Form']['id']; ?>&nbsp;</td>

                                <td><?php echo $dato['Form']['nombre']; ?>&nbsp;</td>
                                <td>
                                    <?php echo $dato['Event']['even_nombre']; ?>
                                </td>
                                <td class="actions">
                                    <span class="btn btn-success btn-mini">
                                        <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $dato['Form']['id'])); ?>
                                    </span>
                                    <span class="btn btn-danger btn-mini">
                                        <?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $dato['Form']['id']), array(), __('Esta seguro que desea eliminar # %s?', $dato['Form']['id'])); ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
