<div class="inputs index">
	<h2><?php echo __('Inputs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('input_state_id'); ?></th>
			<th><?php echo $this->Paginator->sort('person_id'); ?></th>
			<th><?php echo $this->Paginator->sort('entr_imagen'); ?></th>
			<th><?php echo $this->Paginator->sort('entr_titulo'); ?></th>
			<th><?php echo $this->Paginator->sort('entr_fuenTitulo'); ?></th>
			<th><?php echo $this->Paginator->sort('entr_tamaTitulo'); ?></th>
			<th><?php echo $this->Paginator->sort('entr_fecha'); ?></th>
			<th><?php echo $this->Paginator->sort('entr_fuenFecha'); ?></th>
			<th><?php echo $this->Paginator->sort('entr_tamaFecha'); ?></th>
			<th><?php echo $this->Paginator->sort('entr_fuenCliente'); ?></th>
			<th><?php echo $this->Paginator->sort('entr_tamaCliente'); ?></th>
			<th><?php echo $this->Paginator->sort('entr_direccion'); ?></th>
			<th><?php echo $this->Paginator->sort('entr_fuenDireccion'); ?></th>
			<th><?php echo $this->Paginator->sort('entr_tamaDireccion'); ?></th>
			<th><?php echo $this->Paginator->sort('entr_codigo'); ?></th>
			<th><?php echo $this->Paginator->sort('entr_identificador'); ?></th>
			<th><?php echo $this->Paginator->sort('entr_impreso'); ?></th>
			<th><?php echo $this->Paginator->sort('events_registration_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cantidad_reingresos'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($inputs as $input): ?>
	<tr>
		<td><?php echo h($input['Input']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($input['InputState']['id'], array('controller' => 'input_states', 'action' => 'view', $input['InputState']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($input['Person']['id'], array('controller' => 'people', 'action' => 'view', $input['Person']['id'])); ?>
		</td>
		<td><?php echo h($input['Input']['entr_imagen']); ?>&nbsp;</td>
		<td><?php echo h($input['Input']['entr_titulo']); ?>&nbsp;</td>
		<td><?php echo h($input['Input']['entr_fuenTitulo']); ?>&nbsp;</td>
		<td><?php echo h($input['Input']['entr_tamaTitulo']); ?>&nbsp;</td>
		<td><?php echo h($input['Input']['entr_fecha']); ?>&nbsp;</td>
		<td><?php echo h($input['Input']['entr_fuenFecha']); ?>&nbsp;</td>
		<td><?php echo h($input['Input']['entr_tamaFecha']); ?>&nbsp;</td>
		<td><?php echo h($input['Input']['entr_fuenCliente']); ?>&nbsp;</td>
		<td><?php echo h($input['Input']['entr_tamaCliente']); ?>&nbsp;</td>
		<td><?php echo h($input['Input']['entr_direccion']); ?>&nbsp;</td>
		<td><?php echo h($input['Input']['entr_fuenDireccion']); ?>&nbsp;</td>
		<td><?php echo h($input['Input']['entr_tamaDireccion']); ?>&nbsp;</td>
		<td><?php echo h($input['Input']['entr_codigo']); ?>&nbsp;</td>
		<td><?php echo h($input['Input']['entr_identificador']); ?>&nbsp;</td>
		<td><?php echo h($input['Input']['entr_impreso']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($input['EventsRegistrationType']['id'], array('controller' => 'events_registration_types', 'action' => 'view', $input['EventsRegistrationType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($input['Category']['id'], array('controller' => 'categories', 'action' => 'view', $input['Category']['id'])); ?>
		</td>
		<td><?php echo h($input['Input']['cantidad_reingresos']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $input['Input']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $input['Input']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $input['Input']['id']), array(), __('Are you sure you want to delete # %s?', $input['Input']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Input'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Input States'), array('controller' => 'input_states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Input State'), array('controller' => 'input_states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events Registration Types'), array('controller' => 'events_registration_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Events Registration Type'), array('controller' => 'events_registration_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Delivery Methods'), array('controller' => 'delivery_methods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Delivery Method'), array('controller' => 'delivery_methods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sales'), array('controller' => 'sales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sale'), array('controller' => 'sales', 'action' => 'add')); ?> </li>
	</ul>
</div>
