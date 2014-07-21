<div class="forms view">
<h2><?php echo __('Form'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($form['Form']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($form['Event']['id'], array('controller' => 'events', 'action' => 'view', $form['Event']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Form'), array('action' => 'edit', $form['Form']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Form'), array('action' => 'delete', $form['Form']['id']), array(), __('Are you sure you want to delete # %s?', $form['Form']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Forms'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Datas'), array('controller' => 'datas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Data'), array('controller' => 'datas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Personal Data'), array('controller' => 'personal_data', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Personal Datum'), array('controller' => 'personal_data', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Datas'); ?></h3>
	<?php if (!empty($form['Data'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Form Id'); ?></th>
		<th><?php echo __('Person Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($form['Data'] as $data): ?>
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
	<h3><?php echo __('Related Personal Data'); ?></h3>
	<?php if (!empty($form['PersonalDatum'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Id Padre'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th><?php echo __('Obligatorio'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($form['PersonalDatum'] as $personalDatum): ?>
		<tr>
			<td><?php echo $personalDatum['id']; ?></td>
			<td><?php echo $personalDatum['descripcion']; ?></td>
			<td><?php echo $personalDatum['id_padre']; ?></td>
			<td><?php echo $personalDatum['tipo']; ?></td>
			<td><?php echo $personalDatum['obligatorio']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'personal_data', 'action' => 'view', $personalDatum['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'personal_data', 'action' => 'edit', $personalDatum['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'personal_data', 'action' => 'delete', $personalDatum['id']), array(), __('Are you sure you want to delete # %s?', $personalDatum['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Personal Datum'), array('controller' => 'personal_data', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
