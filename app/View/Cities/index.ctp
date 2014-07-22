<?php
echo $this->Html->script(array('matrix.tables'));
?>
<div class="row-fluid">
    <div class="span12">
        <ul class="quick-actions">
            <li class="bg_lg">
                <a href="<?= $this->Html->url(array("controller"=>"cities","action"=>"add"))?>">
                    <i class="icon-plus">
                        
                    </i>
                    Crear Ciudad
                </a>
            </li>
            <li class="bg_lg">
                <a href="<?= $this->Html->url(array("controller"=>"states","action"=>"index"))?>">
                    <i class="icon-reorder">
                        
                    </i>
                    Departamentos
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
                            <th>Ciudad</th>
                            <th>Departamento</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cities as $city): ?>
                            <tr>
                                <td><?php echo $city['City']['id']; ?>&nbsp;</td>

                                <td><?php echo $city['City']['name']; ?>&nbsp;</td>
                                <td>
                                    <?php echo $city['State']['name']; ?>
                                </td>
                                <td class="actions">
                                    <span class="btn btn-success btn-mini">
                                        <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $city['City']['id'])); ?>
                                    </span>
                                    <span class="btn btn-danger btn-mini">
                                        <?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $city['City']['id']), array(), __('Esta seguro que desea eliminar # %s?', $city['City']['name'])); ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>



