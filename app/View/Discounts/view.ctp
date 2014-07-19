<div class="discounts view">
<h2><?php echo __('Discount'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($discount['Discount']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Porcentaje'); ?></dt>
		<dd>
			<?php echo h($discount['Discount']['porcentaje']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Inicio'); ?></dt>
		<dd>
			<?php echo h($discount['Discount']['fecha_inicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Fin'); ?></dt>
		<dd>
			<?php echo h($discount['Discount']['fecha_fin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categoria'); ?></dt>
		<dd>
			<?php echo h($discount['Discount']['categoria']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Discount'), array('action' => 'edit', $discount['Discount']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Discount'), array('action' => 'delete', $discount['Discount']['id']), array(), __('Are you sure you want to delete # %s?', $discount['Discount']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Discounts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Discount'), array('action' => 'add')); ?> </li>
	</ul>
</div>
