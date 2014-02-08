<div class="documents index">
	<h2><?php echo __('Documents'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('docs'); ?></th>
			<th><?php echo $this->Paginator->sort('properties_id'); ?></th>
			<th><?php echo $this->Paginator->sort('customers_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($documents as $document): ?>
	<tr>
		<td><?php echo h($document['Document']['id']); ?>&nbsp;</td>
		<td><?php echo h($document['Document']['type']); ?>&nbsp;</td>
		<td><?php echo h($document['Document']['docs']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($document['Properties']['id'], array('controller' => 'properties', 'action' => 'view', $document['Properties']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($document['Customers']['id'], array('controller' => 'customers', 'action' => 'view', $document['Customers']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $document['Document']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $document['Document']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $document['Document']['id']), null, __('Are you sure you want to delete # %s?', $document['Document']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Document'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Properties'), array('controller' => 'properties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Properties'), array('controller' => 'properties', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customers'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>
