<div class="typeUsers index">
    <h2><?php echo __('Tipos de Usuario'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('descripcion'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($typeUsers as $typeUser): ?>
                <tr>
                    <td><?php echo h($typeUser['TypeUser']['id']); ?>&nbsp;</td>
                    <td><?php echo h($typeUser['TypeUser']['descripcion']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $typeUser['TypeUser']['id']),array('class'=>'btn btn-warning btn-mini')); ?>
                        <?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $typeUser['TypeUser']['id']),array('class'=>'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $typeUser['TypeUser']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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