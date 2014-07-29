<div class="categorias view">
<h2><?php echo __('Categoria'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precio'); ?></dt>
		<dd>
			<?php echo h($categoria['Categoria']['precio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoria['Event']['id'], array('controller' => 'events', 'action' => 'view', $categoria['Event']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Categoria'), array('action' => 'edit', $categoria['Categoria']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Categoria'), array('action' => 'delete', $categoria['Categoria']['id']), array(), __('Are you sure you want to delete # %s?', $categoria['Categoria']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Discounts'), array('controller' => 'discounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Discount'), array('controller' => 'discounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gifts'), array('controller' => 'gifts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gift'), array('controller' => 'gifts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Validations'), array('controller' => 'validations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Validation'), array('controller' => 'validations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas'), array('controller' => 'entradas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entrada'), array('controller' => 'entradas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Discounts'); ?></h3>
	<?php if (!empty($categoria['Discount'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Porcentaje'); ?></th>
		<th><?php echo __('Fecha Inicio'); ?></th>
		<th><?php echo __('Fecha Fin'); ?></th>
		<th><?php echo __('Categoria Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($categoria['Discount'] as $discount): ?>
		<tr>
			<td><?php echo $discount['id']; ?></td>
			<td><?php echo $discount['porcentaje']; ?></td>
			<td><?php echo $discount['fecha_inicio']; ?></td>
			<td><?php echo $discount['fecha_fin']; ?></td>
			<td><?php echo $discount['categoria_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'discounts', 'action' => 'view', $discount['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'discounts', 'action' => 'edit', $discount['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'discounts', 'action' => 'delete', $discount['id']), array(), __('Are you sure you want to delete # %s?', $discount['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Discount'), array('controller' => 'discounts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Gifts'); ?></h3>
	<?php if (!empty($categoria['Gift'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Cantidad'); ?></th>
		<th><?php echo __('Categoria Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($categoria['Gift'] as $gift): ?>
		<tr>
			<td><?php echo $gift['id']; ?></td>
			<td><?php echo $gift['descripcion']; ?></td>
			<td><?php echo $gift['cantidad']; ?></td>
			<td><?php echo $gift['categoria_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'gifts', 'action' => 'view', $gift['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'gifts', 'action' => 'edit', $gift['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'gifts', 'action' => 'delete', $gift['id']), array(), __('Are you sure you want to delete # %s?', $gift['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Gift'), array('controller' => 'gifts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Validations'); ?></h3>
	<?php if (!empty($categoria['Validation'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Fechainicio'); ?></th>
		<th><?php echo __('Fechafin'); ?></th>
		<th><?php echo __('Cantidad Reingresos'); ?></th>
		<th><?php echo __('Categoria Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($categoria['Validation'] as $validation): ?>
		<tr>
			<td><?php echo $validation['id']; ?></td>
			<td><?php echo $validation['descripcion']; ?></td>
			<td><?php echo $validation['fechainicio']; ?></td>
			<td><?php echo $validation['fechafin']; ?></td>
			<td><?php echo $validation['cantidad_reingresos']; ?></td>
			<td><?php echo $validation['categoria_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'validations', 'action' => 'view', $validation['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'validations', 'action' => 'edit', $validation['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'validations', 'action' => 'delete', $validation['id']), array(), __('Are you sure you want to delete # %s?', $validation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Validation'), array('controller' => 'validations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Entradas'); ?></h3>
	<?php if (!empty($categoria['Entrada'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Paper Id'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($categoria['Entrada'] as $entrada): ?>
		<tr>
			<td><?php echo $entrada['id']; ?></td>
			<td><?php echo $entrada['paper_id']; ?></td>
			<td><?php echo $entrada['descripcion']; ?></td>
			<td><?php echo $entrada['nombre']; ?></td>
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
