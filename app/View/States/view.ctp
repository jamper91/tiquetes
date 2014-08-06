<div class="states view">
<h2><?php echo __('Departamento'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($state['State']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($state['Country']['id'], array('controller' => 'countries', 'action' => 'view', $state['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($state['State']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
</div>
