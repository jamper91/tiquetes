<div class="personalData view">
<h2><?php echo __('Personal Datum'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($personalDatum['PersonalDatum']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($personalDatum['PersonalDatum']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id Padre'); ?></dt>
		<dd>
			<?php echo h($personalDatum['PersonalDatum']['id_padre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($personalDatum['PersonalDatum']['tipo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Obligatorio'); ?></dt>
		<dd>
			<?php echo h($personalDatum['PersonalDatum']['obligatorio']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Personal Datum'), array('action' => 'edit', $personalDatum['PersonalDatum']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Personal Datum'), array('action' => 'delete', $personalDatum['PersonalDatum']['id']), array(), __('Are you sure you want to delete # %s?', $personalDatum['PersonalDatum']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Personal Data'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Personal Datum'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Forms'), array('controller' => 'forms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form'), array('controller' => 'forms', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Forms'); ?></h3>
	<?php if (!empty($personalDatum['Form'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Personal Datum Id'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($personalDatum['Form'] as $form): ?>
		<tr>
			<td><?php echo $form['id']; ?></td>
			<td><?php echo $form['personal_datum_id']; ?></td>
			<td><?php echo $form['event_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'forms', 'action' => 'view', $form['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'forms', 'action' => 'edit', $form['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'forms', 'action' => 'delete', $form['id']), array(), __('Are you sure you want to delete # %s?', $form['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Form'), array('controller' => 'forms', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
