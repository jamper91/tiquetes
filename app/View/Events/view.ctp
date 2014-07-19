<div class="events view">
<h2><?php echo __('Event'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($event['Event']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stage'); ?></dt>
		<dd>
			<?php echo $this->Html->link($event['Stage']['id'], array('controller' => 'stages', 'action' => 'view', $event['Stage']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($event['EventType']['id'], array('controller' => 'event_types', 'action' => 'view', $event['EventType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Even Nombre'); ?></dt>
		<dd>
			<?php echo h($event['Event']['even_nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Even NumeResolucion'); ?></dt>
		<dd>
			<?php echo h($event['Event']['even_numeResolucion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Even PalaClave'); ?></dt>
		<dd>
			<?php echo h($event['Event']['even_palaClave']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Even Observaciones'); ?></dt>
		<dd>
			<?php echo h($event['Event']['even_observaciones']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Even Estado'); ?></dt>
		<dd>
			<?php echo h($event['Event']['even_estado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Even Imagen1'); ?></dt>
		<dd>
			<?php echo h($event['Event']['even_imagen1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Even Imagen2'); ?></dt>
		<dd>
			<?php echo h($event['Event']['even_imagen2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Even FechInicio'); ?></dt>
		<dd>
			<?php echo h($event['Event']['even_fechInicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Even FechFinal'); ?></dt>
		<dd>
			<?php echo h($event['Event']['even_fechFinal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Even Publicar'); ?></dt>
		<dd>
			<?php echo h($event['Event']['even_publicar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Even Codigo'); ?></dt>
		<dd>
			<?php echo h($event['Event']['even_codigo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Event'), array('action' => 'edit', $event['Event']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Event'), array('action' => 'delete', $event['Event']['id']), array(), __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stages'), array('controller' => 'stages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stage'), array('controller' => 'stages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Event Types'), array('controller' => 'event_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event Type'), array('controller' => 'event_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Forms'), array('controller' => 'forms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form'), array('controller' => 'forms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Papers'), array('controller' => 'papers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paper'), array('controller' => 'papers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Committees'), array('controller' => 'committees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Committee'), array('controller' => 'committees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels'), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel'), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payments'), array('controller' => 'payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment'), array('controller' => 'payments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Registration Types'), array('controller' => 'registration_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Registration Type'), array('controller' => 'registration_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Forms'); ?></h3>
	<?php if (!empty($event['Form'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Personal Datum Id'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($event['Form'] as $form): ?>
		<tr>
			<td><?php echo $form['id']; ?></td>
			<td><?php echo $form['personal_datum_id']; ?></td>
			<td><?php echo $form['event_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'forms', 'action' => 'view', $form['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'forms', 'action' => 'edit', $form['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'forms', 'action' => 'delete', $form['id']), array(), __('Are you sure you want to delete # %s?', $form['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Form'), array('controller' => 'forms', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Papers'); ?></h3>
	<?php if (!empty($event['Paper'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th><?php echo __('Shelf Id'); ?></th>
		<th><?php echo __('Func Nombre'); ?></th>
		<th><?php echo __('Func FechInicio'); ?></th>
		<th><?php echo __('Func FechFinal'); ?></th>
		<th><?php echo __('Func Cortesia'); ?></th>
		<th><?php echo __('Func Estado'); ?></th>
		<th><?php echo __('Func Imagen'); ?></th>
		<th><?php echo __('Func PalaClaves'); ?></th>
		<th><?php echo __('Func CantEntradas'); ?></th>
		<th><?php echo __('Func CantAlerta'); ?></th>
		<th><?php echo __('Func Codigo'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($event['Paper'] as $paper): ?>
		<tr>
			<td><?php echo $paper['id']; ?></td>
			<td><?php echo $paper['event_id']; ?></td>
			<td><?php echo $paper['shelf_id']; ?></td>
			<td><?php echo $paper['func_nombre']; ?></td>
			<td><?php echo $paper['func_fechInicio']; ?></td>
			<td><?php echo $paper['func_fechFinal']; ?></td>
			<td><?php echo $paper['func_cortesia']; ?></td>
			<td><?php echo $paper['func_estado']; ?></td>
			<td><?php echo $paper['func_imagen']; ?></td>
			<td><?php echo $paper['func_palaClaves']; ?></td>
			<td><?php echo $paper['func_cantEntradas']; ?></td>
			<td><?php echo $paper['func_cantAlerta']; ?></td>
			<td><?php echo $paper['func_codigo']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'papers', 'action' => 'view', $paper['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'papers', 'action' => 'edit', $paper['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'papers', 'action' => 'delete', $paper['id']), array(), __('Are you sure you want to delete # %s?', $paper['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Paper'), array('controller' => 'papers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Committees'); ?></h3>
	<?php if (!empty($event['Committee'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($event['Committee'] as $committee): ?>
		<tr>
			<td><?php echo $committee['id']; ?></td>
			<td><?php echo $committee['nombre']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'committees', 'action' => 'view', $committee['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'committees', 'action' => 'edit', $committee['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'committees', 'action' => 'delete', $committee['id']), array(), __('Are you sure you want to delete # %s?', $committee['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Committee'), array('controller' => 'committees', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Companies'); ?></h3>
	<?php if (!empty($event['Company'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Person Id'); ?></th>
		<th><?php echo __('City Id'); ?></th>
		<th><?php echo __('Empr Nit'); ?></th>
		<th><?php echo __('Empr Nombre'); ?></th>
		<th><?php echo __('Empr Telefono'); ?></th>
		<th><?php echo __('Empr Mail'); ?></th>
		<th><?php echo __('Empr Direccion'); ?></th>
		<th><?php echo __('Empr Barrio'); ?></th>
		<th><?php echo __('Empr PagiWeb'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($event['Company'] as $company): ?>
		<tr>
			<td><?php echo $company['id']; ?></td>
			<td><?php echo $company['person_id']; ?></td>
			<td><?php echo $company['city_id']; ?></td>
			<td><?php echo $company['empr_nit']; ?></td>
			<td><?php echo $company['empr_nombre']; ?></td>
			<td><?php echo $company['empr_telefono']; ?></td>
			<td><?php echo $company['empr_mail']; ?></td>
			<td><?php echo $company['empr_direccion']; ?></td>
			<td><?php echo $company['empr_barrio']; ?></td>
			<td><?php echo $company['empr_pagiWeb']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'companies', 'action' => 'view', $company['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'companies', 'action' => 'edit', $company['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'companies', 'action' => 'delete', $company['id']), array(), __('Are you sure you want to delete # %s?', $company['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Hotels'); ?></h3>
	<?php if (!empty($event['Hotel'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Hote Nombre'); ?></th>
		<th><?php echo __('Hote Mit'); ?></th>
		<th><?php echo __('Hote Direccion'); ?></th>
		<th><?php echo __('Hote Telefono'); ?></th>
		<th><?php echo __('Hote Email'); ?></th>
		<th><?php echo __('Hote PagiWeb'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($event['Hotel'] as $hotel): ?>
		<tr>
			<td><?php echo $hotel['id']; ?></td>
			<td><?php echo $hotel['hote_nombre']; ?></td>
			<td><?php echo $hotel['hote_mit']; ?></td>
			<td><?php echo $hotel['hote_direccion']; ?></td>
			<td><?php echo $hotel['hote_telefono']; ?></td>
			<td><?php echo $hotel['hote_email']; ?></td>
			<td><?php echo $hotel['hote_pagiWeb']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'hotels', 'action' => 'view', $hotel['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'hotels', 'action' => 'edit', $hotel['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'hotels', 'action' => 'delete', $hotel['id']), array(), __('Are you sure you want to delete # %s?', $hotel['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Hotel'), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Payments'); ?></h3>
	<?php if (!empty($event['Payment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Mepa Descripcion'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($event['Payment'] as $payment): ?>
		<tr>
			<td><?php echo $payment['id']; ?></td>
			<td><?php echo $payment['mepa_descripcion']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'payments', 'action' => 'view', $payment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'payments', 'action' => 'edit', $payment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'payments', 'action' => 'delete', $payment['id']), array(), __('Are you sure you want to delete # %s?', $payment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Payment'), array('controller' => 'payments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Registration Types'); ?></h3>
	<?php if (!empty($event['RegistrationType'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($event['RegistrationType'] as $registrationType): ?>
		<tr>
			<td><?php echo $registrationType['id']; ?></td>
			<td><?php echo $registrationType['nombre']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'registration_types', 'action' => 'view', $registrationType['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'registration_types', 'action' => 'edit', $registrationType['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'registration_types', 'action' => 'delete', $registrationType['id']), array(), __('Are you sure you want to delete # %s?', $registrationType['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Registration Type'), array('controller' => 'registration_types', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
