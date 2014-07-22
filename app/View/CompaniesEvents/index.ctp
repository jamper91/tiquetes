<div class="companiesEvents index">
    <h2><?php echo __('Companies Events'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('company_id'); ?></th>
                <th><?php echo $this->Paginator->sort('event_id'); ?></th>
                <th><?php echo $this->Paginator->sort('role_company_id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($companiesEvents as $companiesEvent): ?>
                <tr>
                    <td><?php echo h($companiesEvent['CompaniesEvent']['id']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($companiesEvent['Company']['id'], array('controller' => 'companies', 'action' => 'view', $companiesEvent['Company']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($companiesEvent['Event']['id'], array('controller' => 'events', 'action' => 'view', $companiesEvent['Event']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($companiesEvent['RoleCompany']['id'], array('controller' => 'role_companies', 'action' => 'view', $companiesEvent['RoleCompany']['id'])); ?>
                    </td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $companiesEvent['CompaniesEvent']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $companiesEvent['CompaniesEvent']['id']), array(), __('Are you sure you want to delete # %s?', $companiesEvent['CompaniesEvent']['id'])); ?>
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
