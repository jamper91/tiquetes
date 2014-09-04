<div class="roleCompanies index">
    <h2><?php echo __('Patrocinadores'); ?></h2>
    <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('id','id'); ?></th>
                    <th><?php echo $this->Paginator->sort('empr_nombre','Empresa'); ?></th>
                    <th><?php echo $this->Paginator->sort('even_nombre','Evento'); ?></th>
                    <th><?php echo $this->Paginator->sort('item','Servicio'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($patrocinadores as $patrocinio ): ?>
                    <tr>
                        <td><?php echo h($patrocinio['r']['id']); ?>&nbsp;</td>
                        <td><?php echo h($patrocinio['c']['empr_nombre']); ?>&nbsp;</td>
                        <td><?php echo h($patrocinio['e']['even_nombre']); ?>&nbsp;</td>
                        <td><?php echo h($patrocinio['r']['item']); ?>&nbsp;</td>
                        <td class="actions">
                            <span class="btn btn-success btn-mini">
                                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $patrocinio['r']['id'])); ?>
                            </span>
                            <span class="btn btn-danger btn-mini">
                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $patrocinio['r']['id']), array(), __('Are you sure you want to delete # %s?', $patrocinio['r']['id'])); ?>
                            </span>
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
</div>
