<div class="properties index">
	<h2><?php echo __('Properties'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('beds'); ?></th>
			<th><?php echo $this->Paginator->sort('baths'); ?></th>
			<th><?php echo $this->Paginator->sort('garden'); ?></th>
			<th><?php echo $this->Paginator->sort('parking'); ?></th>
			<th><?php echo $this->Paginator->sort('hometype'); ?></th>
			<th><?php echo $this->Paginator->sort('year'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('featured'); ?></th>
			<th><?php echo $this->Paginator->sort('hide'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('postcode'); ?></th>
			<th><?php echo $this->Paginator->sort('houseno'); ?></th>
			<th><?php echo $this->Paginator->sort('street'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('customers_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($properties as $property): ?>
	<tr>
		<td><?php echo h($property['Property']['id']); ?>&nbsp;</td>
		<td><?php echo h($property['Property']['price']); ?>&nbsp;</td>
		<td><?php echo h($property['Property']['beds']); ?>&nbsp;</td>
		<td><?php echo h($property['Property']['baths']); ?>&nbsp;</td>
		<td><?php echo h($property['Property']['garden']); ?>&nbsp;</td>
		<td><?php echo h($property['Property']['parking']); ?>&nbsp;</td>
		<td><?php echo h($property['Property']['hometype']); ?>&nbsp;</td>
		<td><?php echo h($property['Property']['year']); ?>&nbsp;</td>
		<td><?php echo h($property['Property']['status']); ?>&nbsp;</td>
		<td><?php echo h($property['Property']['featured']); ?>&nbsp;</td>
		<td><?php echo h($property['Property']['hide']); ?>&nbsp;</td>
		<td><?php echo h($property['Property']['description']); ?>&nbsp;</td>
		<td><?php echo h($property['Property']['postcode']); ?>&nbsp;</td>
		<td><?php echo h($property['Property']['houseno']); ?>&nbsp;</td>
		<td><?php echo h($property['Property']['street']); ?>&nbsp;</td>
		<td><?php echo h($property['Property']['city']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($property['Customers']['id'], array('controller' => 'customers', 'action' => 'view', $property['Customers']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $property['Property']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $property['Property']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $property['Property']['id']), null, __('Are you sure you want to delete # %s?', $property['Property']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Property'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customers'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>
