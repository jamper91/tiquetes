<?php
echo $this->Html->script(array('matrix.tables'));
?>
<div class="row-fluid">
    <div class="span12">
    	<div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Permisos</h5>
            </div>

			<div class="widget-content nopadding">
				
				<table class="table table-bordered data-table">
				<thead>
				<tr>
						
						<th>Usuario</th>
						<th>Permiso</th>
						<th>Evento</th>
						<th>Opciones</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($authorizationsUsers as $authorizationsUser): ?>
				<tr>
					<td>
						<?php echo h($authorizationsUser['User']['username']);?>
					</td>
					<td>
						<?php echo h($authorizationsUser['Authorization']['nombre']);?>
					</td>
					<td><?php echo h($authorizationsUser['Event']['even_nombre']); ?>&nbsp;</td>

					<td class="actions">
						<span class="btn btn-success btn-mini">
							<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $authorizationsUser['AuthorizationsUser']['id'])); ?>
						</span>
						<span class="btn btn-danger btn-mini">
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $authorizationsUser['AuthorizationsUser']['id']), array(), __('Are you sure you want to delete # %s?', $authorizationsUser['AuthorizationsUser']['id'])); ?>
						</span>
					</td>
				</tr>
				<?php endforeach; ?>
				</tbody>
				</table>
			</div>
		</div>	
	</div>
</div>