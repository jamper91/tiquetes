<div class="companies index" table-bordered table condensed  stages index>
    <div class="companies index">
        <h2><?php echo __('Empresas'); ?></h2>
        <table cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?>&nbsp;&nbsp;&nbsp;</th>
                    <th><?php echo $this->Paginator->sort('person_id', 'Representate'); ?>&nbsp;&nbsp;&nbsp;</th>
                    <th><?php echo $this->Paginator->sort('city_id', 'Ciudad'); ?>&nbsp;&nbsp;&nbsp;</th>
                    <th><?php echo $this->Paginator->sort('empr_nit', 'Nit'); ?>&nbsp;&nbsp;&nbsp;</th>
                    <th><?php echo $this->Paginator->sort('empr_nombre', 'Nombre'); ?>&nbsp;&nbsp;&nbsp;</th>
                    <th><?php echo $this->Paginator->sort('empr_telefono', 'Telefono'); ?>&nbsp;&nbsp;&nbsp;</th>
                    <th><?php echo $this->Paginator->sort('empr_mail', 'email'); ?>&nbsp;&nbsp;&nbsp;</th>
                    <th><?php echo $this->Paginator->sort('empr_direccion', 'Direccion'); ?>&nbsp;&nbsp;&nbsp;</th>
                    <th><?php echo $this->Paginator->sort('empr_barrio', 'Barrio'); ?>&nbsp;&nbsp;&nbsp;</th>
                    <th><?php echo $this->Paginator->sort('empr_pagiWeb', 'Pagina Web'); ?>&nbsp;&nbsp;&nbsp;</th>
                    <th class="actions"><?php echo __('opciones'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($companies as $company): ?>
                    <tr>
                        <td><?php echo h($company['Company']['id']); ?>&nbsp;</td>
                        <td>
                            <?php echo h($company['Person']['pers_primNombre']); ?>
                        </td>
                        <td>
                            <?php echo h($company['City']['name']); ?>
                        </td>
                        <td><?php echo h($company['Company']['empr_nit']); ?>&nbsp;</td>
                        <td><?php echo h($company['Company']['empr_nombre']); ?>&nbsp;</td>
                        <td><?php echo h($company['Company']['empr_telefono']); ?>&nbsp;</td>
                        <td><?php echo h($company['Company']['empr_mail']); ?>&nbsp;</td>
                        <td><?php echo h($company['Company']['empr_direccion']); ?>&nbsp;</td>
                        <td><?php echo h($company['Company']['empr_barrio']); ?>&nbsp;</td>
                        <td><?php echo h($company['Company']['empr_pagiWeb']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $company['Company']['id']), array('class' => 'btn btn-warning btn-mini')); ?>
                            <?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $company['Company']['id']), array('class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $company['Company']['id'])); ?>
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
