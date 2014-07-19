<div class="committees view">
<h2><?php echo __('Committee'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($committee['Committee']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($committee['Committee']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Committee'), array('action' => 'edit', $committee['Committee']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Committee'), array('action' => 'delete', $committee['Committee']['id']), array(), __('Are you sure you want to delete # %s?', $committee['Committee']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Committees'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Committee'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Events'); ?></h3>
	<?php if (!empty($committee['Event'])): ?>
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
	<?php foreach ($committee['Event'] as $event): ?>
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
