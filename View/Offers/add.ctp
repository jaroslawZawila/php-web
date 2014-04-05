<div class="row-fluid">
        <div class="panel panel-info">
            <div class="panel panel-heading">
                <h2 class="panel-title">Offer form:</h2>
            </div>
            <div class="panel-body">
                <div class="row-fluid span9 offset1">
                    <?php echo $this->Session->flash(); ?>
                    <div class="requests form">
                        <?php echo $this->Form->create('Offer', array('inputDefaults' => array('label'=>false, 'div'=>false))); ?>
                        <fieldset>
                            <div class="input-group">
                                <span class="input-group-addon">Property:</span>
                                <?php echo $this->Form->input('properties_id',  array('class' => 'form-control', 'id'=>'offer-property'
                                                               ,'options' => $properties)) ?>
                            </div>
                            <br/>
                            <div class="input-group">
                                <span class="input-group-addon">Customer:</span>
                                <?php echo $this->Form->input('customers_id', array('class' => 'form-control', 'id'=>'offer-customer')) ?>
                            </div>
                            <br/>
                            <div class="input-group">
                                <span class="input-group-addon">Price</span>
                                <?php echo $this->Form->input('price', array('class' => 'form-control', 'placeholder' => '£ 1000', 'id'=>'offer-price')); ?>
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">Comment</span>
                                <?php echo $this->Form->input('comment', array('type' => 'textarea', 'class' => 'form-control', 'id'=>'offer-comment',
                                                                               'placeholder' => 'comment', 'id'=>'contact-msg')); ?>
                            </div>
                            <br/>
                        </fieldset>
                        <?php echo $this->Form->submit('Submit offer', array('class'=>'btn btn-primary', 'id'=>'offer-submit'));?>
                        <?php echo $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
</div>
