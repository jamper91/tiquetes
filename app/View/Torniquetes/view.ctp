<div class="torniquetes view">
<h2><?php echo __('Torniquete'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($torniquete['Torniquete']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($torniquete['Torniquete']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Torniquete'), array('action' => 'edit', $torniquete['Torniquete']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Torniquete'), array('action' => 'delete', $torniquete['Torniquete']['id']), array(), __('Are you sure you want to delete # %s?', $torniquete['Torniquete']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Torniquetes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Torniquete'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas'), array('controller' => 'entradas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entrada'), array('controller' => 'entradas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Entradas'); ?></h3>
	<?php if (!empty($torniquete['Entrada'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Paper Id'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($torniquete['Entrada'] as $entrada): ?>
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
