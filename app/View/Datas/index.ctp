  	<div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <!-- <h5>Resultado de la b&uacute;squeda</h5> -->
            <h2>Datos almacenados</h2>
           
        </div>
    	<div class="widget-content nopadding">
	
			<table class="table table-bordered data-table">
			<thead>
			<tr>
					
					<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
					<th><?php echo $this->Paginator->sort('form_id'); ?></th>
					<th><?php echo $this->Paginator->sort('person_id'); ?></th>
					<!-- <th class="actions"><?php //echo __('Actions'); ?></th> -->
			</tr>
			</thead>
			<tbody>
			<?php foreach ($datas as $data): ?>
			<tr>
				<?php //debug($data);?>
				
				<td><?php echo h($data['Data']['descripcion']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($data['FormsPersonalDatum']['form_id'], array('controller' => 'forms', 'action' => 'view', $data['FormsPersonalDatum']['form_id'])); ?>
				</td>
				<td>
					<?php echo $this->Html->link($data['Person']['id'], array('controller' => 'people', 'action' => 'view', $data['Person']['id'])); ?>
				</td>
				<!-- <td class="actions">
					<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $data['Data']['id'])); ?>
					<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $data['Data']['id']), array(), __('Are you sure you want to delete # %s?', $data['Data']['id'])); ?>
				</td> -->
			</tr>
		<?php endforeach; ?>
			</tbody>
			</table>
		</div>
	</div>	

</div>