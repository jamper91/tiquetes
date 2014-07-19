<div class="companies index">
	<h2><?php echo __('Companies'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('person_id'); ?></th>
			<th><?php echo $this->Paginator->sort('city_id'); ?></th>
			<th><?php echo $this->Paginator->sort('empr_nit'); ?></th>
			<th><?php echo $this->Paginator->sort('empr_nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('empr_telefono'); ?></th>
			<th><?php echo $this->Paginator->sort('empr_mail'); ?></th>
			<th><?php echo $this->Paginator->sort('empr_direccion'); ?></th>
			<th><?php echo $this->Paginator->sort('empr_barrio'); ?></th>
			<th><?php echo $this->Paginator->sort('empr_pagiWeb'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($companies as $company): ?>
	<tr>
		<td><?php echo h($company['Company']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($company['Person']['id'], array('controller' => 'people', 'action' => 'view', $company['Person']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($company['City']['id'], array('controller' => 'cities', 'action' => 'view', $company['City']['id'])); ?>
		</td>
		<td><?php echo h($company['Company']['empr_nit']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['empr_nombre']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['empr_telefono']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['empr_mail']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['empr_direccion']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['empr_barrio']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['empr_pagiWeb']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $company['Company']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $company['Company']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $company['Company']['id']), array(), __('Are you sure you want to delete # %s?', $company['Company']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Company'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
