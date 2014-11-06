<div class="activities view">
<h2><?php echo __('Activity'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($activity['Event']['id'], array('controller' => 'events', 'action' => 'view', $activity['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Person'); ?></dt>
		<dd>
			<?php echo $this->Html->link($activity['Person']['id'], array('controller' => 'people', 'action' => 'view', $activity['Person']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location Id'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['location_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora Inicio'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['hora_inicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora Fin'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['hora_fin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Costo'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['costo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aforo'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['aforo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alerta Aforo'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['alerta_aforo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Control Aforo'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['control_aforo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Activity'), array('action' => 'edit', $activity['Activity']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Activity'), array('action' => 'delete', $activity['Activity']['id']), array(), __('Are you sure you want to delete # %s?', $activity['Activity']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Activities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activity'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
</div>
