<div class="entradasTorniquetes index">
	<h2><?php echo __('Puntos de acceso por entradas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('stage_id','Escenario'); ?></th>
			<th><?php echo $this->Paginator->sort('entrada_id','Entrada'); ?></th>
			<th><?php echo $this->Paginator->sort('torniquete_id','Punto de acceso'); ?></th>
			<th class="actions"><?php echo __('Opciones'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($entradasTorniquetes as $entradasTorniquete): ?>
	<tr>
		<td><?php echo h($entradasTorniquete['EntradasTorniquete']['id']); ?>&nbsp;</td>
		<td>
			<?php echo h($entradasTorniquete['Entrada']['stage_id']); ?>
		</td>
		<td>
			<?php echo h($entradasTorniquete['Entrada']['name']); ?>
		</td>
                <td>
			<?php echo h($entradasTorniquete['Torniquete']['name']); ?>
		</td>
		<td class="actions">
			<?php  echo $this->Html->link(__('Editar'), array('action' => 'edit', $entradasTorniquete['EntradasTorniquete']['id'],$entradasTorniquete['Entrada']['stage_id']),array('class' => 'btn btn-warning btn-mini')); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $entradasTorniquete['EntradasTorniquete']['id']),array('class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $entradasTorniquete['EntradasTorniquete']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>