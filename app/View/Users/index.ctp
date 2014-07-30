<div class="users index">
    <h2><?php echo __('Usuarios'); ?></h2>
    <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('Nombre de usuario'); ?></th>
                    <th><?php echo $this->Paginator->sort('Contraseña'); ?></th>
                    <th><?php echo $this->Paginator->sort('Persona'); ?></th>
                    <th><?php echo $this->Paginator->sort('Tipo de Usuario'); ?></th>
                    <th><?php echo $this->Paginator->sort('Departamento'); ?></th>
                </tr>
            </thead>           
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['password']); ?>&nbsp;</td>                           
                        <td>
                            <?php echo $this->Html->link($user['Person']['id'], array('controller' => 'people', 'action' => 'view', $user['Person']['id'])); ?>
                        </td>
                        <td>
                            <?php echo $this->Html->link($user['TypeUser']['id'], array('controller' => 'type_users', 'action' => 'view', $user['TypeUser']['id'])); ?>
                        </td>
                        <td>
                            <?php echo $this->Html->link($user['Department']['id'], array('controller' => 'departments', 'action' => 'view', $user['Department']['id'])); ?>
                        </td>                           
                        <td class="actions">
                             <span class="btn btn-success btn-mini">
                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
                             </span>
                             <span class="btn btn-danger btn-mini">
                            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
                             </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>
    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
<div class="actions"></div>
