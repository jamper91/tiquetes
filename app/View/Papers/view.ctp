<div class="papers view">
<h2><?php echo __('Paper'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($paper['Paper']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($paper['Event']['id'], array('controller' => 'events', 'action' => 'view', $paper['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shelf'); ?></dt>
		<dd>
			<?php echo $this->Html->link($paper['Shelf']['id'], array('controller' => 'shelves', 'action' => 'view', $paper['Shelf']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Func Nombre'); ?></dt>
		<dd>
			<?php echo h($paper['Paper']['func_nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Func FechInicio'); ?></dt>
		<dd>
			<?php echo h($paper['Paper']['func_fechInicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Func FechFinal'); ?></dt>
		<dd>
			<?php echo h($paper['Paper']['func_fechFinal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Func Cortesia'); ?></dt>
		<dd>
			<?php echo h($paper['Paper']['func_cortesia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Func Estado'); ?></dt>
		<dd>
			<?php echo h($paper['Paper']['func_estado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Func Imagen'); ?></dt>
		<dd>
			<?php echo h($paper['Paper']['func_imagen']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Func PalaClaves'); ?></dt>
		<dd>
			<?php echo h($paper['Paper']['func_palaClaves']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Func CantEntradas'); ?></dt>
		<dd>
			<?php echo h($paper['Paper']['func_cantEntradas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Func CantAlerta'); ?></dt>
		<dd>
			<?php echo h($paper['Paper']['func_cantAlerta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Func Codigo'); ?></dt>
		<dd>
			<?php echo h($paper['Paper']['func_codigo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Paper'), array('action' => 'edit', $paper['Paper']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Paper'), array('action' => 'delete', $paper['Paper']['id']), array(), __('Are you sure you want to delete # %s?', $paper['Paper']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Papers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paper'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shelves'), array('controller' => 'shelves', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shelf'), array('controller' => 'shelves', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas'), array('controller' => 'entradas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entrada'), array('controller' => 'entradas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Paper Inputs'), array('controller' => 'paper_inputs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paper Input'), array('controller' => 'paper_inputs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Entradas'); ?></h3>
	<?php if (!empty($paper['Entrada'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Paper Id'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($paper['Entrada'] as $entrada): ?>
		<tr>
			<td><?php echo $entrada['id']; ?></td>
			<td><?php echo $entrada['paper_id']; ?></td>
			<td><?php echo $entrada['descripcion']; ?></td>
			<td><?php echo $entrada['category_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'entradas', 'action' => 'view', $entrada['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'entradas', 'action' => 'edit', $entrada['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'entradas', 'action' => 'delete', $entrada['id']), array(), __('Are you sure you want to delete # %s?', $entrada['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Entrada'), array('controller' => 'entradas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Paper Inputs'); ?></h3>
	<?php if (!empty($paper['PaperInput'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Paper Id'); ?></th>
		<th><?php echo __('Input Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($paper['PaperInput'] as $paperInput): ?>
		<tr>
			<td><?php echo $paperInput['id']; ?></td>
			<td><?php echo $paperInput['paper_id']; ?></td>
			<td><?php echo $paperInput['input_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'paper_inputs', 'action' => 'view', $paperInput['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'paper_inputs', 'action' => 'edit', $paperInput['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'paper_inputs', 'action' => 'delete', $paperInput['id']), array(), __('Are you sure you want to delete # %s?', $paperInput['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Paper Input'), array('controller' => 'paper_inputs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
