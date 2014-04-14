<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo $this->Form->create('Offers', array('controller' => 'offers', 'action'=>'editComment', 'inputDefaults' => array('label'=>false, 'div'=>false))); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit comment</h4>
            </div>
            <div class="modal-body">

                <?php echo $this->Form->input('comment', array('type'=>'textarea', 'placeholder' => 'Your comment', 'style'=>'width: 100%', 'value'=>$comment)); ?>
                <?php echo $this->Form->input('id', array('type'=>'hidden', 'value'=>$offer['Offer']['id'] )) ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?php  echo $this->Form->submit('Update', array('class'=>'btn btn-primary', 'div' => false)); ?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="panel panel-info">
            <div class="panel panel-heading">
                <h2 class="panel-title">Offers NO: <?php echo h($offer['Offer']['id']); ?></h2>
            </div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td><b>Customer: </b></td>
                        <td colspan="3"><?php echo $offer['Customers']['firstname'] . " " . $offer['Customers']['surname']
                         . ", phone: " . $offer['Customers']['phone']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Property:</b></td>
                        <td><?php echo h($offer['Properties']['houseno'] . ", "
                                       . $offer['Properties']['street'] . ", "
                                       . $offer['Properties']['city'] . ", "
                                       . $offer['Properties']['postcode']); ?></td>
                    </tr>
                    <tr>
                        <td><b>Asking price:</b></td>
                        <td><?php echo h($offer['Properties']['price']); ?></td>
                    </tr>
                    <tr>
                        <td><b>Offer:</b></td>
                        <td><?php echo h($offer['Offer']['price']); ?></td>
                    </tr>
                    <tr>
                        <td><b>Status:</b></td>
                        <td colspan="3"><?php echo h($offer['Offer']['status']); ?></td>
                    </tr>
                    <tr>
                        <td><b>Comment:</b></td>
                        <td colspan="3"><?php echo h($offer['Offer']['comment']); ?></td>
                    </tr>
                    <?php if($offer['Offer']['status'] == 'NEW'): ?>
                        <tr>
                            <td><?php echo $this->Html->link(__('Accept'), array('action' => 'update', 'ACCEPTED', $offer['Offer']['id']), array('class'=>'btn btn-success')); ?>
                                <?php echo $this->Html->link(__('Reject'), array('action' => 'update', 'REJECTED', $offer['Offer']['id']), array('class'=>'btn btn-danger')); ?></td>
                            <td><button class="btn btn-info" data-toggle="modal" data-target="#commentModal">
                                                                Add comment
                                                            </button></td>
                        </tr>
                     <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</div>