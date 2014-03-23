<div class="panel panel-info">
    <div class="panel panel-heading">
        <h2 class="panel-title">List of requests:</h2>
    </div>
    <div class="panel-body">
        <table class="table table-responsive">
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('type'); ?></th>
            <th><?php echo $this->Paginator->sort('status'); ?></th>
            <th><?php echo $this->Paginator->sort('date'); ?></th>
            <th></th>
            <?php foreach ($requests as $key=>$request): ?>
                <tr>
                    <td><?php echo h($request['Requests']['id']); ?>&nbsp;</td>
                    <td><?php echo h($request['Requests']['name']); ?>&nbsp;</td>
                    <td><?php echo h($request['Requests']['type']); ?>&nbsp;</td>
                    <td><?php echo h($request['Requests']['status']); ?>&nbsp;</td>
                    <td><?php echo h($request['Requests']['date']); ?>&nbsp;</td>
                    <td class="btn btn-default btn-sm">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $request['Requests']['id']), array('id'=>'view-button-' . $key)); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php echo $this->element('paging') ?>
</div>


