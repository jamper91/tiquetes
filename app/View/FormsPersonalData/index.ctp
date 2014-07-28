<div class="formsPersonalData index">
	<h2><?php echo __('Forms Personal Data'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('personal_datum_id'); ?></th>
			<th><?php echo $this->Paginator->sort('form_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($formsPersonalData as $formsPersonalDatum): ?>
	<tr>
		<td><?php echo h($formsPersonalDatum['FormsPersonalDatum']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($formsPersonalDatum['PersonalDatum']['id'], array('controller' => 'personal_data', 'action' => 'view', $formsPersonalDatum['PersonalDatum']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($formsPersonalDatum['Form']['id'], array('controller' => 'forms', 'action' => 'view', $formsPersonalDatum['Form']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $formsPersonalDatum['FormsPersonalDatum']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $formsPersonalDatum['FormsPersonalDatum']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $formsPersonalDatum['FormsPersonalDatum']['id']), array(), __('Are you sure you want to delete # %s?', $formsPersonalDatum['FormsPersonalDatum']['id'])); ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Forms Personal Datum'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Personal Data'), array('controller' => 'personal_data', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Personal Datum'), array('controller' => 'personal_data', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Forms'), array('controller' => 'forms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form'), array('controller' => 'forms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Datas'), array('controller' => 'datas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Data'), array('controller' => 'datas', 'action' => 'add')); ?> </li>
	</ul>
</div>
