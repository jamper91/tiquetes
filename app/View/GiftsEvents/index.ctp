<div class="giftsEvents index">
    <h2><?php echo __('Consumibles por Evento'); ?></h2>
    <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
            <thead>
                <tr>                    
                    <th><?php echo $this->Paginator->sort('gift_id','Consumible'); ?></th>
                    <th><?php echo $this->Paginator->sort('event_id', 'Evento'); ?></th>			
                    <th><?php echo $this->Paginator->sort('categoria_id'); ?></th>
                    <th class="actions"><?php echo __('Opciones'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($giftsEvents as $giftsEvent): ?>
                    <tr>
                        <!--<td ><?php echo h($giftsEvent['GiftsEvent']['id']); ?>&nbsp;</td>-->
                        <td >
                            <?php echo $this->Html->link($giftsEvent['Gift']['descripcion'], array('controller' => 'gifts', 'action' => 'view', $giftsEvent['Gift']['id'])); ?>
                        </td>
                        <td >
                            <?php echo $this->Html->link($giftsEvent['Event']['even_nombre'], array('controller' => 'events', 'action' => 'view', $giftsEvent['Event']['id'])); ?>
                        </td>

                        <td >
                            <?php echo $this->Html->link($giftsEvent['Categoria']['descripcion'], array('controller' => 'categorias', 'action' => 'view', $giftsEvent['Categoria']['id'])); ?>
                        </td>

                        <td class="actions">
                            <span class="btn btn-warning btn-mini">
                                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $giftsEvent['GiftsEvent']['id'])); ?>
                            </span>
                            <span class="btn btn-danger btn-mini">
                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $giftsEvent['GiftsEvent']['id']), array(), __('Are you sure you want to delete # %s?', $giftsEvent['GiftsEvent']['id'])); ?>
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
