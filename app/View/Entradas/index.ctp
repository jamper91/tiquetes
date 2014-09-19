<div class="entradas index">
    <h2><?php echo __('Entradas'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('stage_id','Escenario'); ?></th>
                <th><?php echo $this->Paginator->sort('name','Nombre'); ?></th>			
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($entradas as $entrada): ?>
                <tr>
                    <td><?php echo h($entrada['Entrada']['id']); ?>&nbsp;&nbsp;&nbsp;</td>
                    <td><?php echo h($entrada['Stage']['esce_nombre']); ?>&nbsp;&nbsp;&nbsp;</td>
                    <td><?php echo h($entrada['Entrada']['name']); ?>&nbsp;&nbsp;&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $entrada['Entrada']['id']),array('class' => 'btn btn-warning btn-mini')); ?>
                        <?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $entrada['Entrada']['id']), array('class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $entrada['Entrada']['id'])); ?>
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
        echo $this->Paginator->numbers(array('separator' => ' '));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>