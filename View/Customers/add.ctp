<div class="customers form">
<?php echo $this->Form->create('Customer'); ?>
	<fieldset>
		<legend><?php echo __('Add Customer'); ?></legend>
	<?php
		echo $this->Form->input('type', array(
            'options' => array('private', 'business')));
		echo $this->Form->input('firstname');
		echo $this->Form->input('surname');
		echo $this->Form->input('postcode');
		echo $this->Form->input('houseno');
		echo $this->Form->input('street');
		echo $this->Form->input('city');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Customers'), array('action' => 'index')); ?></li>
	</ul>
</div>
