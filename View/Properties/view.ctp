<div class="properties view">
<h2><?php echo __('Property'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($property['Property']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($property['Property']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Beds'); ?></dt>
		<dd>
			<?php echo h($property['Property']['beds']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Baths'); ?></dt>
		<dd>
			<?php echo h($property['Property']['baths']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Garden'); ?></dt>
		<dd>
			<?php echo h($property['Property']['garden']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parking'); ?></dt>
		<dd>
			<?php echo h($property['Property']['parking']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hometype'); ?></dt>
		<dd>
			<?php echo h($property['Property']['hometype']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Year'); ?></dt>
		<dd>
			<?php echo h($property['Property']['year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($property['Property']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Featured'); ?></dt>
		<dd>
			<?php echo h($property['Property']['featured']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hide'); ?></dt>
		<dd>
			<?php echo h($property['Property']['hide']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($property['Property']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Postcode'); ?></dt>
		<dd>
			<?php echo h($property['Property']['postcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Houseno'); ?></dt>
		<dd>
			<?php echo h($property['Property']['houseno']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street'); ?></dt>
		<dd>
			<?php echo h($property['Property']['street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($property['Property']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customers'); ?></dt>
		<dd>
			<?php echo $this->Html->link($property['Customers']['id'], array('controller' => 'customers', 'action' => 'view', $property['Customers']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Property'), array('action' => 'edit', $property['Property']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Property'), array('action' => 'delete', $property['Property']['id']), null, __('Are you sure you want to delete # %s?', $property['Property']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Properties'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Property'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customers'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>
