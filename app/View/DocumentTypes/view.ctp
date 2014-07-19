<div class="documentTypes view">
<h2><?php echo __('Document Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($documentType['DocumentType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tido Descripcion'); ?></dt>
		<dd>
			<?php echo h($documentType['DocumentType']['tido_descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Document Type'), array('action' => 'edit', $documentType['DocumentType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Document Type'), array('action' => 'delete', $documentType['DocumentType']['id']), array(), __('Are you sure you want to delete # %s?', $documentType['DocumentType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Document Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Document Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related People'); ?></h3>
	<?php if (!empty($documentType['Person'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Document Type Id'); ?></th>
		<th><?php echo __('City Id'); ?></th>
		<th><?php echo __('Pers Documento'); ?></th>
		<th><?php echo __('Pers PrimNombre'); ?></th>
		<th><?php echo __('Pers SegNombre'); ?></th>
		<th><?php echo __('Pers PrimApellido'); ?></th>
		<th><?php echo __('Pers SegApellido'); ?></th>
		<th><?php echo __('Pers Direccion'); ?></th>
		<th><?php echo __('Pers Barrio'); ?></th>
		<th><?php echo __('Pers Telefono'); ?></th>
		<th><?php echo __('Pers Celular'); ?></th>
		<th><?php echo __('Pers FechNacimiento'); ?></th>
		<th><?php echo __('Pers TipoSangre'); ?></th>
		<th><?php echo __('Pers Mail'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($documentType['Person'] as $person): ?>
		<tr>
			<td><?php echo $person['id']; ?></td>
			<td><?php echo $person['document_type_id']; ?></td>
			<td><?php echo $person['city_id']; ?></td>
			<td><?php echo $person['pers_documento']; ?></td>
			<td><?php echo $person['pers_primNombre']; ?></td>
			<td><?php echo $person['pers_segNombre']; ?></td>
			<td><?php echo $person['pers_primApellido']; ?></td>
			<td><?php echo $person['pers_segApellido']; ?></td>
			<td><?php echo $person['pers_direccion']; ?></td>
			<td><?php echo $person['pers_barrio']; ?></td>
			<td><?php echo $person['pers_telefono']; ?></td>
			<td><?php echo $person['pers_celular']; ?></td>
			<td><?php echo $person['pers_fechNacimiento']; ?></td>
			<td><?php echo $person['pers_tipoSangre']; ?></td>
			<td><?php echo $person['pers_mail']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'people', 'action' => 'view', $person['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'people', 'action' => 'edit', $person['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'people', 'action' => 'delete', $person['id']), array(), __('Are you sure you want to delete # %s?', $person['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
