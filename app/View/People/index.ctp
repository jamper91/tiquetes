<div class="people index">
	<h2><?php echo __('People'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('document_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('city_id'); ?></th>
			<th><?php echo $this->Paginator->sort('pers_documento'); ?></th>
			<th><?php echo $this->Paginator->sort('pers_primNombre'); ?></th>
			<th><?php echo $this->Paginator->sort('pers_segNombre'); ?></th>
			<th><?php echo $this->Paginator->sort('pers_primApellido'); ?></th>
			<th><?php echo $this->Paginator->sort('pers_segApellido'); ?></th>
			<th><?php echo $this->Paginator->sort('pers_direccion'); ?></th>
			<th><?php echo $this->Paginator->sort('pers_barrio'); ?></th>
			<th><?php echo $this->Paginator->sort('pers_telefono'); ?></th>
			<th><?php echo $this->Paginator->sort('pers_celular'); ?></th>
			<th><?php echo $this->Paginator->sort('pers_fechNacimiento'); ?></th>
			<th><?php echo $this->Paginator->sort('pers_tipoSangre'); ?></th>
			<th><?php echo $this->Paginator->sort('pers_mail'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($people as $person): ?>
	<tr>
		<td><?php echo h($person['Person']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($person['DocumentType']['id'], array('controller' => 'document_types', 'action' => 'view', $person['DocumentType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($person['City']['id'], array('controller' => 'cities', 'action' => 'view', $person['City']['id'])); ?>
		</td>
		<td><?php echo h($person['Person']['pers_documento']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['pers_primNombre']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['pers_segNombre']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['pers_primApellido']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['pers_segApellido']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['pers_direccion']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['pers_barrio']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['pers_telefono']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['pers_celular']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['pers_fechNacimiento']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['pers_tipoSangre']); ?>&nbsp;</td>
		<td><?php echo h($person['Person']['pers_mail']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $person['Person']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $person['Person']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $person['Person']['id']), array(), __('Are you sure you want to delete # %s?', $person['Person']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Person'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Document Types'), array('controller' => 'document_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Document Type'), array('controller' => 'document_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Datas'), array('controller' => 'datas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Data'), array('controller' => 'datas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inputs'), array('controller' => 'inputs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Input'), array('controller' => 'inputs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Committees Events'), array('controller' => 'committees_events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Committees Event'), array('controller' => 'committees_events', 'action' => 'add')); ?> </li>
	</ul>
</div>
