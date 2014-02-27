<div class="photos form">
<?php echo $this->Form->create('Photo', array('url' => array('action' => 'create'), 'enctype' => 'multipart/form-data')); ?>
	<fieldset>
		<legend><?php echo __('Add Photo'); ?></legend>
	<?php
		echo $this->Form->input('description');
		echo $this->Form->input('master');
		echo $this->Form->input('photo',array('type' => 'file'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Photos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Properties'), array('controller' => 'properties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Properties'), array('controller' => 'properties', 'action' => 'add')); ?> </li>
	</ul>
</div>
