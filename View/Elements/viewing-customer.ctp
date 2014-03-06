<?php if ( count($viewings) == 0) { echo '<div class="alert alert-warning">Sorry there is not viewings booked for this user.</div>'; }; ?>

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
                        <input size="16" type="text" value="<?php echo $date ?>" readonly class="form_datetime form-control"/>

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
                <?php echo $this->Form->submit('Upadate', array('class'=>'btn btn-primary'));?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<div>
    <button class="btn btn-default" data-toggle="modal" data-target="#viewingModal" name="add-viewings">
            <span class="glyphicon glyphicon-plus"></span>&nbsp;Add viewing request
    </button>

</div>