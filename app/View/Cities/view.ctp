<div class="cities view">
<h2><?php echo __('City'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($city['City']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo $this->Html->link($city['Department']['id'], array('controller' => 'departments', 'action' => 'view', $city['Department']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($city['City']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit City'), array('action' => 'edit', $city['City']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete City'), array('action' => 'delete', $city['City']['id']), array(), __('Are you sure you want to delete # %s?', $city['City']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stages'), array('controller' => 'stages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stage'), array('controller' => 'stages', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Companies'); ?></h3>
	<?php if (!empty($city['Company'])): ?>
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
	<?php foreach ($city['Company'] as $company): ?>
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
	<h3><?php echo __('Related People'); ?></h3>
	<?php if (!empty($city['Person'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Document Type Id'); ?></th>
		<th><?php echo __('City Id'); ?></th>
		<th><?php echo __('Pers Documento'); ?></th>
		<th><?php echo __('Pers PrimNombre'); ?></th>
		<th><?php echo __('Pers SegNombre'); ?></th>
		<th><?php echo __('Pers PrimApellido'); ?></th>
		<th><?php echo __('Pers SegApellido'); ?></th>
		<th><?php echo __('Pers Direccion'); ?></th>
		<th><?php echo __('Pers Barrio'); ?></th>
		<th><?php echo __('Pers Telefono'); ?></th>
		<th><?php echo __('Pers Celular'); ?></th>
		<th><?php echo __('Pers FechNacimiento'); ?></th>
		<th><?php echo __('Pers TipoSangre'); ?></th>
		<th><?php echo __('Pers Mail'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($city['Person'] as $person): ?>
		<tr>
			<td><?php echo $person['id']; ?></td>
			<td><?php echo $person['document_type_id']; ?></td>
			<td><?php echo $person['city_id']; ?></td>
			<td><?php echo $person['pers_documento']; ?></td>
			<td><?php echo $person['pers_primNombre']; ?></td>
			<td><?php echo $person['pers_segNombre']; ?></td>
			<td><?php echo $person['pers_primApellido']; ?></td>
			<td><?php echo $person['pers_segApellido']; ?></td>
			<td><?php echo $person['pers_direccion']; ?></td>
			<td><?php echo $person['pers_barrio']; ?></td>
			<td><?php echo $person['pers_telefono']; ?></td>
			<td><?php echo $person['pers_celular']; ?></td>
			<td><?php echo $person['pers_fechNacimiento']; ?></td>
			<td><?php echo $person['pers_tipoSangre']; ?></td>
			<td><?php echo $person['pers_mail']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'people', 'action' => 'view', $person['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'people', 'action' => 'edit', $person['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'people', 'action' => 'delete', $person['id']), array(), __('Are you sure you want to delete # %s?', $person['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Stages'); ?></h3>
	<?php if (!empty($city['Stage'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('City Id'); ?></th>
		<th><?php echo __('Esce Nombre'); ?></th>
		<th><?php echo __('Esce Direccion'); ?></th>
		<th><?php echo __('Esce Telefono'); ?></th>
		<th><?php echo __('Esce Mapa'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($city['Stage'] as $stage): ?>
		<tr>
			<td><?php echo $stage['id']; ?></td>
			<td><?php echo $stage['city_id']; ?></td>
			<td><?php echo $stage['esce_nombre']; ?></td>
			<td><?php echo $stage['esce_direccion']; ?></td>
			<td><?php echo $stage['esce_telefono']; ?></td>
			<td><?php echo $stage['esce_mapa']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'stages', 'action' => 'view', $stage['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'stages', 'action' => 'edit', $stage['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'stages', 'action' => 'delete', $stage['id']), array(), __('Are you sure you want to delete # %s?', $stage['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Stage'), array('controller' => 'stages', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
