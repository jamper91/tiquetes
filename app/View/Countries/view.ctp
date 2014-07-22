<div class="countries view">
<h2><?php echo __('Country'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($country['Country']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($country['Country']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Country'), array('action' => 'edit', $country['Country']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Country'), array('action' => 'delete', $country['Country']['id']), array(), __('Are you sure you want to delete # %s?', $country['Country']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related States'); ?></h3>
	<?php if (!empty($country['State'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($country['State'] as $state): ?>
		<tr>
			<td><?php echo $state['id']; ?></td>
			<td><?php echo $state['country_id']; ?></td>
			<td><?php echo $state['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'states', 'action' => 'view', $state['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'states', 'action' => 'edit', $state['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'states', 'action' => 'delete', $state['id']), array(), __('Are you sure you want to delete # %s?', $state['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
