<div class="resultados view">
<h2><?php echo __('Resultado'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($resultado['Resultado']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Preguntas Eventos'); ?></dt>
		<dd>
			<?php echo $this->Html->link($resultado['PreguntasEventos']['id'], array('controller' => 'preguntas_eventos', 'action' => 'view', $resultado['PreguntasEventos']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Person'); ?></dt>
		<dd>
			<?php echo $this->Html->link($resultado['Person']['id'], array('controller' => 'people', 'action' => 'view', $resultado['Person']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Resultado'), array('action' => 'edit', $resultado['Resultado']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Resultado'), array('action' => 'delete', $resultado['Resultado']['id']), array(), __('Are you sure you want to delete # %s?', $resultado['Resultado']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Resultados'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resultado'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Preguntas Eventos'), array('controller' => 'preguntas_eventos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Preguntas Eventos'), array('controller' => 'preguntas_eventos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
</div>
