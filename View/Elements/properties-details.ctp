<?php if ( count($properties) == 0) { echo '<div class="alert alert-warning">Sorry there are not properties attached to this customer</div>'; }; ?>

<table class="table table-responsive">
    <?php foreach ($properties as $property): ?>
        <tr>
            <td><?php echo h($property['Property']['houseno']); ?>&nbsp;</td>
            <td><?php echo h($property['Property']['street']); ?>&nbsp;</td>
            <td><?php echo h($property['Property']['city']); ?>&nbsp;</td>
            <td><?php echo h($property['Property']['postcode']); ?>&nbsp;</td>
            <td colspan="2"><?php echo h($property['Property']['status']); ?>&nbsp;</td>
            <td><?php echo h($property['Property']['postcode']); ?>&nbsp;</td>

            <td><?php echo $this->Html->link('Manage property', array('controller' => 'properties', 'action' => 'manage', $property['Property']['id'], $customerid),
                    array('class' => 'btn btn-info')); ?> </td>
        </tr>
    <?php endforeach; ?>
</table>
<div>
    <?php echo $this->Html->link('Attach properties', array('controller' => 'properties', 'action' => 'add', $customerid),
        array('class' => 'btn btn-default')); ?>
</div>