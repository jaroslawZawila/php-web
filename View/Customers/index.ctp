<div class="panel panel-info">
    <div class="panel panel-heading">
        <h2 class="panel-title">List of customers:</h2>
    </div>
    <div class="panel-body">
        <table class="table table-responsive">
            <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?php echo h($customer['Customer']['id']); ?>&nbsp;</td>
                <td><?php echo h($customer['Customer']['firstname']); ?>&nbsp;<?php echo h($customer['Customer']['surname']); ?>&nbsp;</td>
                <td><?php echo h($customer['Customer']['street']); ?>&nbsp;</td>
                <td><?php echo h($customer['Customer']['city']); ?>&nbsp;</td>
                <td><?php echo h($customer['Customer']['postcode']); ?>&nbsp;</td>
                <td class="btn btn-default btn-sm">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $customer['Customer']['id'])); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
