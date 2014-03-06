<div class="viewings view">
<h2><?php echo __('Viewing'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($viewing['Viewing']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Properties'); ?></dt>
		<dd>
			<?php echo $this->Html->link($viewing['Properties']['id'], array('controller' => 'properties', 'action' => 'view', $viewing['Properties']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customers'); ?></dt>
		<dd>
			<?php echo $this->Html->link($viewing['Customers']['id'], array('controller' => 'customers', 'action' => 'view', $viewing['Customers']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($viewing['Viewing']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($viewing['Viewing']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timestamp'); ?></dt>
		<dd>
			<?php echo h($viewing['Viewing']['timestamp']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($viewing['Viewing']['comment']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Viewing'), array('action' => 'edit', $viewing['Viewing']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Viewing'), array('action' => 'delete', $viewing['Viewing']['id']), null, __('Are you sure you want to delete # %s?', $viewing['Viewing']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Viewings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Viewing'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Properties'), array('controller' => 'properties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Properties'), array('controller' => 'properties', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customers'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>
