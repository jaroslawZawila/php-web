<div class="panel panel-info">
    <div class="panel panel-heading">
        <h2 class="panel-title">List of properties:</h2>
    </div>
    <div class="panel-body">
        <table class="table table-responsive">
            <?php foreach ($properties as $property): ?>
            <tr>
                <td><?php echo h($property['Property']['id']); ?>&nbsp;</td>
                <td><?php echo h($property['Property']['houseno']); ?></td>
                <td><?php echo h($property['Property']['street']); ?>&nbsp;</td>
                <td><?php echo h($property['Property']['city']); ?>&nbsp;</td>
                <td><?php echo h($property['Property']['postcode']); ?>&nbsp;</td>
                <td><?php echo $this->Html->link('Manage property', array('controller' => 'properties', 'action' => 'manage', $property['Property']['id']),
                        array('class' => 'btn btn-info')); ?> </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>