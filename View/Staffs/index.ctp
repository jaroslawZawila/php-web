<div class="panel panel-info">
    <div class="panel panel-heading">
        <h2 class="panel-title">Members of staff:</h2>
    </div>
    <?php if(count($staffs) == 0): ?>
        <?php echo $this->Html->link(__('Add new user'), array('action' => 'add'), array('id'=>'add-button')); ?>
        <br/>
        <div class="alert alert-warning">There are not any offer in the system.</div>
    <?php endif; ?>
    <?php if(count($staffs) > 0): ?>
        <div class="panel-body" >
            <table class="table table-responsive">
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('fname', "Firstname"); ?></th>
                <th><?php echo $this->Paginator->sort('sname', "Surname"); ?></th>
                <th><?php echo $this->Html->link(__('+'), array('action' => 'add'), array('id'=>'add-button')); ?></th>

                <?php foreach ($staffs as $key=>$staff): ?>
                    <tr>
                        <td><?php echo h($staff['Staff']['id']); ?>&nbsp;</td>
                        <td><?php echo h($staff['Staff']['fname']); ?>&nbsp;</td>
                        <td><?php echo h($staff['Staff']['sname']); ?>&nbsp;</td>
                        <td class="btn btn-default btn-sm">
                            <?php echo $this->Html->link(__('Details'), array('action' => 'view', $staff['Staff']['id']), array('id'=>'view-button-' . $key)); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?php echo $this->element('paging', array('paging'=>$this->request->params['paging']['Staff'])) ?>
        <?php endif; ?>
</div>