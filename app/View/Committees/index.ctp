<div class="committees index">
	<h2 style="text-align:center"><?php echo __('Listado de comites'); ?></h2>
	<div class="widget-content nopadding">
		<table class="table table-bordered data-table">
		<thead>
		<tr>
				<!-- <th><?php //echo $this->Paginator->sort('id'); ?></th> -->
				<th><?php echo $this->Paginator->sort('nombre'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($committees as $committee): ?>
			<tr>
				<!-- <td><?php //echo h($committee['Committee']['id']); ?>&nbsp;</td> -->
				<td><?php echo h($committee['Committee']['nombre']); ?>&nbsp;</td>
				<td class="actions">
					<span class="btn btn-success btn-mini">
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $committee['Committee']['id'])); ?>
					</span>
					<span class="btn btn-danger btn-mini">
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $committee['Committee']['id']), array(), __('Are you sure you want to delete # %s?', $committee['Committee']['id'])); ?>
					</span>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
		</table>
	</div>
<!-- 	<p>
	<?php
	// echo $this->Paginator->counter(array(
	// 'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	// ));
	?>	</p>
	<div class="paging">
	<?php
		// echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		// echo $this->Paginator->numbers(array('separator' => ''));
		// echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div> -->
</div>
