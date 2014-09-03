<div class="events index">
    <h2><?php
        echo __('Eventos');
        ;
        ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?>&nbsp;</th>
                <th><?php echo $this->Paginator->sort('even_codigo', 'codigo'); ?>&nbsp;</th>
                <th><?php echo $this->Paginator->sort('stage_id', 'Escenario'); ?>&nbsp;</th>
                <th><?php echo $this->Paginator->sort('event_type_id', 'tipo de evento'); ?>&nbsp;</th>
                <th><?php echo $this->Paginator->sort('even_nombre', 'nombre'); ?></th>
                <th><?php echo $this->Paginator->sort('even_numeResolucion', 'Resolucion'); ?>&nbsp;</th>
<!--			<th><?php // echo $this->Paginator->sort('even_palaClave','');    ?></th>
                <th><?php // echo $this->Paginator->sort('even_observaciones');    ?></th>
                <th><?php // echo $this->Paginator->sort('even_estado');    ?></th>-->
                <th><?php echo $this->Paginator->sort('even_imagen1', 'Imagen 1'); ?>&nbsp;</th>
                <th><?php echo $this->Paginator->sort('even_imagen2', 'Imagen 2'); ?>&nbsp;</th>
                <th><?php echo $this->Paginator->sort('even_fechInicio', 'Fecha inicio'); ?>&nbsp;</th>
                <th><?php echo $this->Paginator->sort('even_fechFinal', 'Fecha final'); ?>&nbsp;</th>
                <th><?php echo $this->Paginator->sort('even_publicar', 'publicado'); ?>&nbsp;</th>			
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
<?php foreach ($events as $event): ?>
                <tr>
                    <td><?php echo h($event['Event']['id']); ?>&nbsp;</td>
                    <td><?php echo h($event['Event']['even_codigo']); ?>&nbsp;</td>
                    <td>
    <?php echo h($event['Stage']['id']); ?>
                    </td>                    
                    <td>
    <?php echo h($event['EventType']['id']); ?>
                    </td>
                    <td><?php echo h($event['Event']['even_nombre']); ?>&nbsp;</td>
                    <td><?php echo h($event['Event']['even_numeResolucion']); ?>&nbsp;</td>
    <!--		<td><?php // echo h($event['Event']['even_palaClave']);    ?>&nbsp;</td>
                    <td><?php // echo h($event['Event']['even_observaciones']);    ?>&nbsp;</td>
                    <td><?php // echo h($event['Event']['even_estado']);    ?>&nbsp;</td>-->
                    <td><img width="100px"   src="<?php echo $this->webroot . '/img/events1/' . h($event['Event']['even_imagen1']); ?>" />&nbsp;</td>
                    <td><img width="100px"   src="<?php echo $this->webroot . '/img/events2/' . h($event['Event']['even_imagen2']); ?>" />&nbsp;</td>
                    <td><?php echo h($event['Event']['even_fechInicio']); ?>&nbsp;</td>
                    <td><?php echo h($event['Event']['even_fechFinal']); ?>&nbsp;</td>
                    <td><?php echo h($event['Event']['even_publicar']); ?>&nbsp;</td>

                    <td class="actions">
                        <?php echo $this->Html->link(__('Coordenadas'), array('action' => 'mapea', $event['Event']['id'], 0), array('class' => 'btn btn-primary btn-mini')); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $event['Event']['id']), array('class' => 'btn btn-warning btn-mini')); ?>
    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $event['Event']['id']), array('class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?>
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