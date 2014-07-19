<div class="eventsRegistrationTypes view">
<h2><?php echo __('Events Registration Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($eventsRegistrationType['EventsRegistrationType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Registration Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($eventsRegistrationType['RegistrationType']['id'], array('controller' => 'registration_types', 'action' => 'view', $eventsRegistrationType['RegistrationType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($eventsRegistrationType['Event']['id'], array('controller' => 'events', 'action' => 'view', $eventsRegistrationType['Event']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Events Registration Type'), array('action' => 'edit', $eventsRegistrationType['EventsRegistrationType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Events Registration Type'), array('action' => 'delete', $eventsRegistrationType['EventsRegistrationType']['id']), array(), __('Are you sure you want to delete # %s?', $eventsRegistrationType['EventsRegistrationType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Events Registration Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Events Registration Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Registration Types'), array('controller' => 'registration_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Registration Type'), array('controller' => 'registration_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inputs'), array('controller' => 'inputs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Input'), array('controller' => 'inputs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Inputs'); ?></h3>
	<?php if (!empty($eventsRegistrationType['Input'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Input State Id'); ?></th>
		<th><?php echo __('Person Id'); ?></th>
		<th><?php echo __('Entr Imagen'); ?></th>
		<th><?php echo __('Entr Titulo'); ?></th>
		<th><?php echo __('Entr FuenTitulo'); ?></th>
		<th><?php echo __('Entr TamaTitulo'); ?></th>
		<th><?php echo __('Entr Fecha'); ?></th>
		<th><?php echo __('Entr FuenFecha'); ?></th>
		<th><?php echo __('Entr TamaFecha'); ?></th>
		<th><?php echo __('Entr FuenCliente'); ?></th>
		<th><?php echo __('Entr TamaCliente'); ?></th>
		<th><?php echo __('Entr Direccion'); ?></th>
		<th><?php echo __('Entr FuenDireccion'); ?></th>
		<th><?php echo __('Entr TamaDireccion'); ?></th>
		<th><?php echo __('Entr Codigo'); ?></th>
		<th><?php echo __('Entr Identificador'); ?></th>
		<th><?php echo __('Entr Impreso'); ?></th>
		<th><?php echo __('Events Registration Type Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Cantidad Reingresos'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($eventsRegistrationType['Input'] as $input): ?>
		<tr>
			<td><?php echo $input['id']; ?></td>
			<td><?php echo $input['input_state_id']; ?></td>
			<td><?php echo $input['person_id']; ?></td>
			<td><?php echo $input['entr_imagen']; ?></td>
			<td><?php echo $input['entr_titulo']; ?></td>
			<td><?php echo $input['entr_fuenTitulo']; ?></td>
			<td><?php echo $input['entr_tamaTitulo']; ?></td>
			<td><?php echo $input['entr_fecha']; ?></td>
			<td><?php echo $input['entr_fuenFecha']; ?></td>
			<td><?php echo $input['entr_tamaFecha']; ?></td>
			<td><?php echo $input['entr_fuenCliente']; ?></td>
			<td><?php echo $input['entr_tamaCliente']; ?></td>
			<td><?php echo $input['entr_direccion']; ?></td>
			<td><?php echo $input['entr_fuenDireccion']; ?></td>
			<td><?php echo $input['entr_tamaDireccion']; ?></td>
			<td><?php echo $input['entr_codigo']; ?></td>
			<td><?php echo $input['entr_identificador']; ?></td>
			<td><?php echo $input['entr_impreso']; ?></td>
			<td><?php echo $input['events_registration_type_id']; ?></td>
			<td><?php echo $input['category_id']; ?></td>
			<td><?php echo $input['cantidad_reingresos']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'inputs', 'action' => 'view', $input['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'inputs', 'action' => 'edit', $input['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'inputs', 'action' => 'delete', $input['id']), array(), __('Are you sure you want to delete # %s?', $input['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Input'), array('controller' => 'inputs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
