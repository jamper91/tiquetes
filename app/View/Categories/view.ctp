<div class="categories view">
<h2><?php echo __('Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($category['Category']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precio'); ?></dt>
		<dd>
			<?php echo h($category['Category']['precio']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Related Entradas'); ?></h3>
	<?php if (!empty($category['Entrada'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Paper Id'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($category['Entrada'] as $entrada): ?>
		<tr>
			<td><?php echo $entrada['id']; ?></td>
			<td><?php echo $entrada['paper_id']; ?></td>
			<td><?php echo $entrada['descripcion']; ?></td>
			<td><?php echo $entrada['category_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'entradas', 'action' => 'view', $entrada['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'entradas', 'action' => 'edit', $entrada['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'entradas', 'action' => 'delete', $entrada['id']), array(), __('Are you sure you want to delete # %s?', $entrada['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Entrada'), array('controller' => 'entradas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Inputs'); ?></h3>
	<?php if (!empty($category['Input'])): ?>
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
	<?php foreach ($category['Input'] as $input): ?>
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
