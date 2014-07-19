<div class="people view">
<h2><?php echo __('Person'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($person['Person']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Document Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($person['DocumentType']['id'], array('controller' => 'document_types', 'action' => 'view', $person['DocumentType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo $this->Html->link($person['City']['id'], array('controller' => 'cities', 'action' => 'view', $person['City']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pers Documento'); ?></dt>
		<dd>
			<?php echo h($person['Person']['pers_documento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pers PrimNombre'); ?></dt>
		<dd>
			<?php echo h($person['Person']['pers_primNombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pers SegNombre'); ?></dt>
		<dd>
			<?php echo h($person['Person']['pers_segNombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pers PrimApellido'); ?></dt>
		<dd>
			<?php echo h($person['Person']['pers_primApellido']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pers SegApellido'); ?></dt>
		<dd>
			<?php echo h($person['Person']['pers_segApellido']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pers Direccion'); ?></dt>
		<dd>
			<?php echo h($person['Person']['pers_direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pers Barrio'); ?></dt>
		<dd>
			<?php echo h($person['Person']['pers_barrio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pers Telefono'); ?></dt>
		<dd>
			<?php echo h($person['Person']['pers_telefono']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pers Celular'); ?></dt>
		<dd>
			<?php echo h($person['Person']['pers_celular']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pers FechNacimiento'); ?></dt>
		<dd>
			<?php echo h($person['Person']['pers_fechNacimiento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pers TipoSangre'); ?></dt>
		<dd>
			<?php echo h($person['Person']['pers_tipoSangre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pers Mail'); ?></dt>
		<dd>
			<?php echo h($person['Person']['pers_mail']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Person'), array('action' => 'edit', $person['Person']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Person'), array('action' => 'delete', $person['Person']['id']), array(), __('Are you sure you want to delete # %s?', $person['Person']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Companies'); ?></h3>
	<?php if (!empty($person['Company'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Person Id'); ?></th>
		<th><?php echo __('City Id'); ?></th>
		<th><?php echo __('Empr Nit'); ?></th>
		<th><?php echo __('Empr Nombre'); ?></th>
		<th><?php echo __('Empr Telefono'); ?></th>
		<th><?php echo __('Empr Mail'); ?></th>
		<th><?php echo __('Empr Direccion'); ?></th>
		<th><?php echo __('Empr Barrio'); ?></th>
		<th><?php echo __('Empr PagiWeb'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($person['Company'] as $company): ?>
		<tr>
			<td><?php echo $company['id']; ?></td>
			<td><?php echo $company['person_id']; ?></td>
			<td><?php echo $company['city_id']; ?></td>
			<td><?php echo $company['empr_nit']; ?></td>
			<td><?php echo $company['empr_nombre']; ?></td>
			<td><?php echo $company['empr_telefono']; ?></td>
			<td><?php echo $company['empr_mail']; ?></td>
			<td><?php echo $company['empr_direccion']; ?></td>
			<td><?php echo $company['empr_barrio']; ?></td>
			<td><?php echo $company['empr_pagiWeb']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'companies', 'action' => 'view', $company['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'companies', 'action' => 'edit', $company['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'companies', 'action' => 'delete', $company['id']), array(), __('Are you sure you want to delete # %s?', $company['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Datas'); ?></h3>
	<?php if (!empty($person['Data'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Form Id'); ?></th>
		<th><?php echo __('Person Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($person['Data'] as $data): ?>
		<tr>
			<td><?php echo $data['id']; ?></td>
			<td><?php echo $data['descripcion']; ?></td>
			<td><?php echo $data['form_id']; ?></td>
			<td><?php echo $data['person_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'datas', 'action' => 'view', $data['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'datas', 'action' => 'edit', $data['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'datas', 'action' => 'delete', $data['id']), array(), __('Are you sure you want to delete # %s?', $data['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Data'), array('controller' => 'datas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Inputs'); ?></h3>
	<?php if (!empty($person['Input'])): ?>
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
	<?php foreach ($person['Input'] as $input): ?>
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
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($person['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Estado'); ?></th>
		<th><?php echo __('Person Id'); ?></th>
		<th><?php echo __('Type User Id'); ?></th>
		<th><?php echo __('Department Id'); ?></th>
		<th><?php echo __('Validodesde'); ?></th>
		<th><?php echo __('Validohasta'); ?></th>
		<th><?php echo __('Identificador'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($person['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['estado']; ?></td>
			<td><?php echo $user['person_id']; ?></td>
			<td><?php echo $user['type_user_id']; ?></td>
			<td><?php echo $user['department_id']; ?></td>
			<td><?php echo $user['validodesde']; ?></td>
			<td><?php echo $user['validohasta']; ?></td>
			<td><?php echo $user['identificador']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array(), __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Committees Events'); ?></h3>
	<?php if (!empty($person['CommitteesEvent'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Committee Id'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($person['CommitteesEvent'] as $committeesEvent): ?>
		<tr>
			<td><?php echo $committeesEvent['id']; ?></td>
			<td><?php echo $committeesEvent['committee_id']; ?></td>
			<td><?php echo $committeesEvent['event_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'committees_events', 'action' => 'view', $committeesEvent['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'committees_events', 'action' => 'edit', $committeesEvent['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'committees_events', 'action' => 'delete', $committeesEvent['id']), array(), __('Are you sure you want to delete # %s?', $committeesEvent['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Committees Event'), array('controller' => 'committees_events', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
