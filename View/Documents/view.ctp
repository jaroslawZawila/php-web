<div class="documents view">
<h2><?php echo __('Document'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($document['Document']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($document['Document']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Docs'); ?></dt>
		<dd>
			<?php echo h($document['Document']['docs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Properties'); ?></dt>
		<dd>
			<?php echo $this->Html->link($document['Properties']['id'], array('controller' => 'properties', 'action' => 'view', $document['Properties']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customers'); ?></dt>
		<dd>
			<?php echo $this->Html->link($document['Customers']['id'], array('controller' => 'customers', 'action' => 'view', $document['Customers']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Document'), array('action' => 'edit', $document['Document']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Document'), array('action' => 'delete', $document['Document']['id']), null, __('Are you sure you want to delete # %s?', $document['Document']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Documents'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Document'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Properties'), array('controller' => 'properties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Properties'), array('controller' => 'properties', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customers'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>
