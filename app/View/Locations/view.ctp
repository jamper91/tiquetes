<div class="locations view">
<h2><?php echo __('Location'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($location['Location']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Loca Nombre'); ?></dt>
		<dd>
			<?php echo h($location['Location']['loca_nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stage'); ?></dt>
		<dd>
			<?php echo $this->Html->link($location['Stage']['id'], array('controller' => 'stages', 'action' => 'view', $location['Stage']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Location'); ?></dt>
		<dd>
			<?php echo $this->Html->link($location['ParentLocation']['id'], array('controller' => 'locations', 'action' => 'view', $location['ParentLocation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Loca Fila'); ?></dt>
		<dd>
			<?php echo h($location['Location']['loca_fila']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Loca Colomnna'); ?></dt>
		<dd>
			<?php echo h($location['Location']['loca_colomnna']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Location'), array('action' => 'edit', $location['Location']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Location'), array('action' => 'delete', $location['Location']['id']), array(), __('Are you sure you want to delete # %s?', $location['Location']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stages'), array('controller' => 'stages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stage'), array('controller' => 'stages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations'), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Location'), array('controller' => 'locations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shelves'), array('controller' => 'shelves', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shelf'), array('controller' => 'shelves', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Locations'); ?></h3>
	<?php if (!empty($location['ChildLocation'])): ?>
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
	<?php foreach ($location['ChildLocation'] as $childLocation): ?>
		<tr>
			<td><?php echo $childLocation['id']; ?></td>
			<td><?php echo $childLocation['loca_nombre']; ?></td>
			<td><?php echo $childLocation['stage_id']; ?></td>
			<td><?php echo $childLocation['parent_id']; ?></td>
			<td><?php echo $childLocation['loca_fila']; ?></td>
			<td><?php echo $childLocation['loca_colomnna']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'locations', 'action' => 'view', $childLocation['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'locations', 'action' => 'edit', $childLocation['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'locations', 'action' => 'delete', $childLocation['id']), array(), __('Are you sure you want to delete # %s?', $childLocation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Location'), array('controller' => 'locations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Shelves'); ?></h3>
	<?php if (!empty($location['Shelf'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Location Id'); ?></th>
		<th><?php echo __('Esta Nombre'); ?></th>
		<th><?php echo __('Esta Estado'); ?></th>
		<th><?php echo __('Esta Precio'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($location['Shelf'] as $shelf): ?>
		<tr>
			<td><?php echo $shelf['id']; ?></td>
			<td><?php echo $shelf['location_id']; ?></td>
			<td><?php echo $shelf['esta_nombre']; ?></td>
			<td><?php echo $shelf['esta_estado']; ?></td>
			<td><?php echo $shelf['esta_precio']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'shelves', 'action' => 'view', $shelf['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'shelves', 'action' => 'edit', $shelf['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'shelves', 'action' => 'delete', $shelf['id']), array(), __('Are you sure you want to delete # %s?', $shelf['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Shelf'), array('controller' => 'shelves', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
