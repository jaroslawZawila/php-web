<div class="viewings form">
<?php echo $this->Form->create('Viewing'); ?>
	<fieldset>
		<legend><?php echo __('Add Viewing'); ?></legend>
	<?php
		echo $this->Form->input('properties_id');
		echo $this->Form->input('customers_id');
		echo $this->Form->input('status');
		echo $this->Form->input('date');
		echo $this->Form->input('timestamp');
		echo $this->Form->input('comment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Viewings'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Properties'), array('controller' => 'properties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Properties'), array('controller' => 'properties', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customers'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>
