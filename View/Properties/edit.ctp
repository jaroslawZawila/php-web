<div class="properties form">
<?php echo $this->Form->create('Property'); ?>
	<fieldset>
		<legend><?php echo __('Edit Property'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('price');
		echo $this->Form->input('beds');
		echo $this->Form->input('baths');
		echo $this->Form->input('garden');
		echo $this->Form->input('parking');
		echo $this->Form->input('hometype');
		echo $this->Form->input('year');
		echo $this->Form->input('status');
		echo $this->Form->input('featured');
		echo $this->Form->input('hide');
		echo $this->Form->input('description');
		echo $this->Form->input('postcode');
		echo $this->Form->input('houseno');
		echo $this->Form->input('street');
		echo $this->Form->input('city');
		echo $this->Form->input('customers_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Property.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Property.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Properties'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customers'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>
