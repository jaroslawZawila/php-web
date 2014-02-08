<div class="row-fluid">
    <div class="span5">
        <div class="panel panel-info">
            <div class="panel panel-heading">
                <h2 class="panel-title">Contact Details:</h2>
            </div>
            <div class="panel-body">
                <p>Please contact us using the contact details.</p>
                <p>
                    <b>Love Estate Agent</b><br/>
                    1-5 Love Avenue<br/>
                    Bristol<br/>
                    BS5 7TP<br/>
                    <br/>
                    <b>Tel:</b> 07787415639<br/>
                    <b>Fax:</b> 07787415639
                </p>
            </div>
        </div>
    </div>
    <div class="span7">
        <div class="panel panel-info">
            <div class="panel panel-heading">
                <h2 class="panel-title">Contact Form:</h2>
            </div>
            <div class="panel-body">
                <p>If you like to be contacted please fill contact form.</p>
                <div class="row-fluid span9 offset1">
                    <?php echo $this->Session->flash(); ?>
                    <div class="requests form">
                        <?php echo $this->Form->create('Request', array('inputDefaults' => array('label'=>false, 'div'=>false))); ?>
                        <fieldset>
                            <div class="input-group">
                                <span class="input-group-addon">Name</span>
                                <?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Your name')); ?>
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
                                <span class="input-group-addon">I am a</span>
                                <?php echo $this->Form->input('type', array('class' => 'form-control',
                                        'options' => array('Landlord', 'Tenant', 'Seller', 'Buyer'))); ?>
                            </div>
                            <br/>
                            <div class="input-group">
                                <span class="input-group-addon">Message</span>
                                <?php echo $this->Form->input('message', array('type' => 'textarea', 'class' => 'form-control', 'placeholder' => 'message')); ?>
                            </div>
                            <br/>
                        </fieldset>
                        <?php
                        echo $this->Form->submit('Send', array('class'=>'btn btn-primary'));
                        echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


