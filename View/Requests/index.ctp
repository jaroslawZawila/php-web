<div class="panel panel-info">
    <div class="panel panel-heading">
        <h2 class="panel-title">List of requests:</h2>
    </div>
    <div class="panel-body">
        <table class="table table-responsive">
            <?php foreach ($requests as $request): ?>
            <tr>
                <td><?php echo h($request['Request']['id']); ?>&nbsp;</td>
                <td><?php echo h($request['Request']['name']); ?>&nbsp;</td>
                <td><?php echo h($request['Request']['type']); ?>&nbsp;</td>
                <td><?php echo h($request['Request']['status']); ?>&nbsp;</td>
                <td><?php echo h($request['Request']['date']); ?>&nbsp;</td>
                <td class="btn btn-default btn-sm">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $request['Request']['id'])); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>


