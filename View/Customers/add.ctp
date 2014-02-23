<div class="row-fluid">
        <div class="panel panel-info">
            <div class="panel panel-heading">
                <h2 class="panel-title">Customer Registration Form:</h2>
            </div>
            <div class="panel-body">
                <div class="row-fluid span9 offset1">
                    <?php echo $this->Session->flash(); ?>
                    <div class="requests form">
                        <?php echo $this->Form->create('Customer', array('inputDefaults' => array('label'=>false, 'div'=>false))); ?>
                        <fieldset>
                            <div class="input-group">
                                <span class="input-group-addon">Type:</span>
                                <?php echo $this->Form->input('type', array('class' => 'form-control',
                                        'options' => array('Landlord' => 'Landlord', 'Tenant' => 'Tenant', 'Seller' => 'Seller', 'Buyer' => 'Buyer'))); ?>
                            </div>
                            <br/>
                            <div class="input-group">
                                <span class="input-group-addon">First name</span>
                                <?php echo $this->Form->input('firstname', array('class' => 'form-control', 'placeholder' => 'Firstname')); ?>
                            </div>
                            <br/>
                            <div class="input-group">
                                <span class="input-group-addon">Surname name</span>
                                <?php echo $this->Form->input('surname', array('class' => 'form-control', 'placeholder' => 'Surname')); ?>
                            </div>
                            <br/>
                            <div class="input-group">
                                <span class="input-group-addon">Email</span>
                                <?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Your email')); ?>
                            </div>
                            <br/>
                            <div class="input-group">
                                <span class="input-group-addon">Phone</span>
                                <?php echo $this->Form->input('phone', array('class' => 'form-control', 'placeholder' => 'Your phone number')); ?>
                            </div>
                            <br/>
                            <div class="input-group">
                                <span class="input-group-addon">House no:</span>
                                <?php echo $this->Form->input('houseno', array('class' => 'form-control', 'placeholder' => 'Your phone number')); ?>
                            </div>
                            <br/>
                            <div class="input-group">
                                <span class="input-group-addon">Street</span>
                                <?php echo $this->Form->input('street', array('class' => 'form-control', 'placeholder' => 'Your phone number')); ?>
                            </div>
                            <br/>
                            <div class="input-group">
                                <span class="input-group-addon">City/Town</span>
                                <?php echo $this->Form->input('city', array('class' => 'form-control', 'placeholder' => 'Your phone number')); ?>
                            </div>
                            <br/>
                            <div class="input-group">
                                <span class="input-group-addon">Post code</span>
                                <?php echo $this->Form->input('postcode', array('class' => 'form-control', 'placeholder' => 'Your phone number')); ?>
                            </div>
                            <br/>
                        </fieldset>
                        <?php echo $this->Form->submit('Register', array('class'=>'btn btn-primary'));?>
                    </div>
                </div>
            </div>
        </div>
</div>
