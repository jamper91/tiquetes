<div class="formsPersonalData view">
<h2><?php echo __('Forms Personal Datum'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($formsPersonalDatum['FormsPersonalDatum']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Personal Datum'); ?></dt>
		<dd>
			<?php echo $this->Html->link($formsPersonalDatum['PersonalDatum']['id'], array('controller' => 'personal_data', 'action' => 'view', $formsPersonalDatum['PersonalDatum']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Form'); ?></dt>
		<dd>
			<?php echo $this->Html->link($formsPersonalDatum['Form']['id'], array('controller' => 'forms', 'action' => 'view', $formsPersonalDatum['Form']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Forms Personal Datum'), array('action' => 'edit', $formsPersonalDatum['FormsPersonalDatum']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Forms Personal Datum'), array('action' => 'delete', $formsPersonalDatum['FormsPersonalDatum']['id']), array(), __('Are you sure you want to delete # %s?', $formsPersonalDatum['FormsPersonalDatum']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Forms Personal Data'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Forms Personal Datum'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Personal Data'), array('controller' => 'personal_data', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Personal Datum'), array('controller' => 'personal_data', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Forms'), array('controller' => 'forms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form'), array('controller' => 'forms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Datas'), array('controller' => 'datas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Data'), array('controller' => 'datas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Datas'); ?></h3>
	<?php if (!empty($formsPersonalDatum['Data'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Person Id'); ?></th>
		<th><?php echo __('Forms Personal Datum Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($formsPersonalDatum['Data'] as $data): ?>
		<tr>
			<td><?php echo $data['id']; ?></td>
			<td><?php echo $data['descripcion']; ?></td>
			<td><?php echo $data['person_id']; ?></td>
			<td><?php echo $data['forms_personal_datum_id']; ?></td>
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
