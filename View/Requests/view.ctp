<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo $this->Form->create('Requestdetail', array('controller' => 'requestdetails', 'action'=>'add', 'inputDefaults' => array('label'=>false, 'div'=>false))); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add comment</h4>
            </div>
            <div class="modal-body">

                <?php echo $this->Form->input('comment', array('type'=>'textarea', 'placeholder' => 'Your comment', 'style'=>'width: 100%')); ?>
                <?php echo $this->Form->input('requests_id', array('type'=>'hidden', 'value'=>$request['Request']['id'] )) ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?php  echo $this->Form->submit('Submit comment', array('class'=>'btn btn-primary', 'div' => false)); ?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="panel panel-info">
            <div class="panel panel-heading">
                <h2 class="panel-title">Request NO: <?php echo h($request['Request']['id']); ?></h2>
            </div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td><b>Request date: </b></td>
                        <td colspan="3"><?php echo h($request['Request']['date']); ?></td>
                    </tr>
                    <tr>
                        <td><b>Name</b></td>
                        <td><?php echo h($request['Request']['name']); ?></td>
                        <td><b>Type:</b></td>
                        <td><?php echo h($request['Request']['type']); ?></td>
                    </tr>
                    <tr>
                        <td><b>Email:</b></td>
                        <td><?php echo h($request['Request']['email']); ?></td>
                        <td><b>Phone:</b></td>
                        <td><?php echo h($request['Request']['phone']); ?></td>
                    </tr>
                    <tr>
                        <td><b>Message:</b></td>
                        <td colspan="3"><?php echo h($request['Request']['message']); ?></td>
                    </tr>
                    <tr>
                        <td><b>STATUS</b></td>
                        <td colspan="2">
                            <?php echo $this->Form->create('Request', array('controller'=>'requests', 'action'=> 'applyStatus' ,'inputDefaults' => array('label'=>false, 'div'=>false))); ?>
                            <fieldset>
                            <div class="input-group" >
                                <?php echo $this->Form->input('requests_id', array('type'=>'hidden', 'value'=>$request['Request']['id'] )) ?>
                                <?php echo $this->Form->input('status', array('class' => 'form-control', 'value' => $request['Request']['status'],
                                        'options' => array('NEW' => 'New', 'OPEN' => 'Open', 'CLOSED' => 'Closed', 'INVALID' => 'Invalid'))); ?>
                                <span class="input-group-addon">
                                    <?php echo $this->Form->submit('Apply', array('div' => false)); ?>
                                </span>
                            </div>
                            </fieldset>
                            <?php
                                    echo $this->Form->end(); ?>
                        </td>
                        <td>
                            <button class="btn btn-info" data-toggle="modal" data-target="#commentModal">
                                Add comment
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Comments:</b></td>
                        <td colspan="3"></td>
                    </tr>
                    <?php foreach ($comments as $comment): ?>
                    <tr>
                        <td><?php echo h($comment['Requestdetail']['date']); ?>&nbsp;</td>
                        <td colspan="3">
                            <div class="well"> <?php echo h($comment['Requestdetail']['comment']); ?>&nbsp;</div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>

