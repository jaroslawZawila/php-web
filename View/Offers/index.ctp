<div class="panel panel-info">
    <div class="panel panel-heading">
        <h2 class="panel-title">List of offers:</h2>
    </div>
     <?php echo $this->Html->link(__('Make Offer'), array('action' => 'add'), array('id'=>'make-offer')); ?>
    <?php if(count($offers) == 0): ?>
        <div class="alert alert-warning">There are not any offer in the system.</div>
    <?php endif; ?>
    <?php if(count($offers) > 0): ?>
        <div class="panel-body" >
            <table class="table table-responsive">
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('properties_id'); ?></th>
                <th><?php echo $this->Paginator->sort('customers_id'); ?></th>
                <th><?php echo $this->Paginator->sort('status'); ?></th>

                <?php foreach ($offers as $key=>$offer): ?>
                    <tr>
                        <td><?php echo h($offer['Offer']['id']); ?>&nbsp;</td>
                        <td><?php echo h($offer['Properties']['houseno'] . ", "
                                        . $offer['Properties']['street'] . ", "
                                        . $offer['Properties']['city'] . ", "
                                        . $offer['Properties']['postcode']); ?>&nbsp;</td>
                        <td><?php echo h($offer['Customers']['firstname'] . " " . $offer['Customers']['surname']); ?>&nbsp;</td>
                        <td><?php echo h($offer['Offer']['status']); ?>&nbsp;</td>
                        <td class="btn btn-default btn-sm">
                            <?php echo $this->Html->link(__('Manage'), array('action' => 'view', $offer['Offer']['id']), array('id'=>'view-button-' . $key)); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?php echo $this->element('paging', array('paging'=>$this->request->params['paging']['Offer'])) ?>
        <?php endif; ?>
</div>