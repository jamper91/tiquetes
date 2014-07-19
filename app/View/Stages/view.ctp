<div class="stages view">
<h2><?php echo __('Stage'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($stage['Stage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stage['City']['id'], array('controller' => 'cities', 'action' => 'view', $stage['City']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Esce Nombre'); ?></dt>
		<dd>
			<?php echo h($stage['Stage']['esce_nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Esce Direccion'); ?></dt>
		<dd>
			<?php echo h($stage['Stage']['esce_direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Esce Telefono'); ?></dt>
		<dd>
			<?php echo h($stage['Stage']['esce_telefono']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Esce Mapa'); ?></dt>
		<dd>
			<?php echo h($stage['Stage']['esce_mapa']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Stage'), array('action' => 'edit', $stage['Stage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Stage'), array('action' => 'delete', $stage['Stage']['id']), array(), __('Are you sure you want to delete # %s?', $stage['Stage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Stages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stage'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations'), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('controller' => 'locations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Events'); ?></h3>
	<?php if (!empty($stage['Event'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Stage Id'); ?></th>
		<th><?php echo __('Event Type Id'); ?></th>
		<th><?php echo __('Even Nombre'); ?></th>
		<th><?php echo __('Even NumeResolucion'); ?></th>
		<th><?php echo __('Even PalaClave'); ?></th>
		<th><?php echo __('Even Observaciones'); ?></th>
		<th><?php echo __('Even Estado'); ?></th>
		<th><?php echo __('Even Imagen1'); ?></th>
		<th><?php echo __('Even Imagen2'); ?></th>
		<th><?php echo __('Even FechInicio'); ?></th>
		<th><?php echo __('Even FechFinal'); ?></th>
		<th><?php echo __('Even Publicar'); ?></th>
		<th><?php echo __('Even Codigo'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($stage['Event'] as $event): ?>
		<tr>
			<td><?php echo $event['id']; ?></td>
			<td><?php echo $event['stage_id']; ?></td>
			<td><?php echo $event['event_type_id']; ?></td>
			<td><?php echo $event['even_nombre']; ?></td>
			<td><?php echo $event['even_numeResolucion']; ?></td>
			<td><?php echo $event['even_palaClave']; ?></td>
			<td><?php echo $event['even_observaciones']; ?></td>
			<td><?php echo $event['even_estado']; ?></td>
			<td><?php echo $event['even_imagen1']; ?></td>
			<td><?php echo $event['even_imagen2']; ?></td>
			<td><?php echo $event['even_fechInicio']; ?></td>
			<td><?php echo $event['even_fechFinal']; ?></td>
			<td><?php echo $event['even_publicar']; ?></td>
			<td><?php echo $event['even_codigo']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'events', 'action' => 'view', $event['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'events', 'action' => 'edit', $event['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'events', 'action' => 'delete', $event['id']), array(), __('Are you sure you want to delete # %s?', $event['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Locations'); ?></h3>
	<?php if (!empty($stage['Location'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Loca Nombre'); ?></th>
		<th><?php echo __('Stage Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Loca Fila'); ?></th>
		<th><?php echo __('Loca Colomnna'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($stage['Location'] as $location): ?>
		<tr>
			<td><?php echo $location['id']; ?></td>
			<td><?php echo $location['loca_nombre']; ?></td>
			<td><?php echo $location['stage_id']; ?></td>
			<td><?php echo $location['parent_id']; ?></td>
			<td><?php echo $location['loca_fila']; ?></td>
			<td><?php echo $location['loca_colomnna']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'locations', 'action' => 'view', $location['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'locations', 'action' => 'edit', $location['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'locations', 'action' => 'delete', $location['id']), array(), __('Are you sure you want to delete # %s?', $location['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Location'), array('controller' => 'locations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
