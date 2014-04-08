<div class="modal fade" id="viewingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo $this->Form->create('Viewing', array('action'=>'add', 'inputDefaults' => array('label'=>false, 'div'=>false))); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Update property information:</h4>
            </div>
            <div class="modal-body">
                <fieldset>
                    <?php echo $this->Form->input('customers_id', array('type'=>'hidden', 'value'=>$customer['Customer']['id'] )) ?>
                    <div class="input-group">
                        <span class="input-group-addon">Property:</span>
                        <?php echo $this->Form->input('properties_id', array('class' => 'form-control',
                                'options' => $list)); ?>

                    </div>
                    <br/>
                    <div class="input-group">
                        <span class="input-group-addon">Date</span>
                        <input size="16" name="data[Viewing][date]" type="text" value="<?php echo $date ?>" readonly class="form_datetime form-control"/>

                        <script type="text/javascript">
                            $(".form_datetime").datetimepicker({format: 'dd-mm-yyyy hh:ii'});
                        </script>
                    </div>
                    <br/>
                    <div class="input-group">
                        <span class="input-group-addon">Note:</span>
                        <?php echo $this->Form->input('comment', array('type' => 'textarea', 'class' => 'form-control', 'placeholder' => 'message')); ?>
                    </div>
                </fieldset>
            </div>
            <div class="modal-footer">
                <?php echo $this->Form->submit('Upadate', array('class'=>'btn btn-primary', 'id'=>'submit-viewing'));?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>

<div>
<table class="table">
       <?php if ( count($viewings) == 0) { echo '<div class="alert alert-warning">Sorry there is not viewings booked for this user.</div>'; }; ?>
       <?php foreach ($viewings as $viewing): ?>
    <tr>
        <td><?php echo $viewing['Viewing']['id'];?></td>
        <td><p><?php echo $viewing['Viewing']['date'] ?></p></td>

        <td><?php echo $viewing['Properties']['houseno'] . ', ' . $viewing['Properties']['street'] . ', ' . $viewing['Properties']['city'] . ', ' . $viewing['Properties']['postcode'] ?></td>
        <td><b><?php echo $viewing['Viewing']['status'] ?></b></td>
        <td><?php echo $this->Html->link('Manage', array('controller' => 'viewings','action' => 'edit', $viewing['Viewing']['id']), array('id'=>'manage-' . $viewing['Viewing']['id'])); ?></td>
    </tr>
    <?php endforeach; ?>
</table>
</div>
<div>
    <button class="btn btn-default" data-toggle="modal" data-target="#viewingModal" name="add-viewings" id="add-viewings">
            <span class="glyphicon glyphicon-plus"></span>&nbsp;Add viewing request
    </button>

</div>