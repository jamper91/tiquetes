<div class="validations view">
<h2><?php echo __('Validation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($validation['Validation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($validation['Validation']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fechainicio'); ?></dt>
		<dd>
			<?php echo h($validation['Validation']['fechainicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fechafin'); ?></dt>
		<dd>
			<?php echo h($validation['Validation']['fechafin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad Reingresos'); ?></dt>
		<dd>
			<?php echo h($validation['Validation']['cantidad_reingresos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categoria'); ?></dt>
		<dd>
			<?php echo h($validation['Validation']['categoria']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Validation'), array('action' => 'edit', $validation['Validation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Validation'), array('action' => 'delete', $validation['Validation']['id']), array(), __('Are you sure you want to delete # %s?', $validation['Validation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Validations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Validation'), array('action' => 'add')); ?> </li>
	</ul>
</div>
