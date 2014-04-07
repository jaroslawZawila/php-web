<div class="panel panel-info">
    <div class="panel panel-heading">
        <h2 class="panel-title">List of properties:</h2>
    </div>
    <div class="panel-body">
        <table class="table table-responsive">
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('houseno'); ?></th>
                <th><?php echo $this->Paginator->sort('street'); ?></th>
                <th><?php echo $this->Paginator->sort('city'); ?></th>
                <th><?php echo $this->Paginator->sort('postcode'); ?></th>
                <th></th>
            <?php foreach ($properties as $property): ?>
            <tr>
                <td><?php echo h($property['Property']['id']); ?>&nbsp;</td>
                <td><?php echo h($property['Property']['houseno']); ?></td>
                <td><?php echo h($property['Property']['street']); ?>&nbsp;</td>
                <td><?php echo h($property['Property']['city']); ?>&nbsp;</td>
                <td><?php echo h($property['Property']['postcode']); ?>&nbsp;</td>
                <td><?php echo $this->Html->link('Manage property', array('controller' => 'properties', 'action' => 'manage', $property['Property']['id']),
                        array('class' => 'btn btn-info', 'id'=>'manage-' . $property['Property']['id'])); ?> </td>
            </tr>
            <?php endforeach; ?>
        </table>
           <?php echo $this->element('paging', array('paging'=>$this->request->params['paging']['Property'])) ?>
    </div>
</div>