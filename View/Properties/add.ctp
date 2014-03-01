<div class="row-fluid">
    <div class="panel panel-info">
        <div class="panel panel-heading">
            <h2 class="panel-title">Property Registration Form:</h2>
        </div>
        <div class="panel-body">
            <div class="row-fluid span9 offset1">
                <?php echo $this->Session->flash(); ?>
                <div class="requests form">
                    <?php echo $this->Form->create('Property', array('inputDefaults' => array('label'=>false, 'div'=>false))); ?>
                    <fieldset>
                        <div class="input-group">
                            <span class="input-group-addon">Property:</span>
                            <?php echo $this->Form->input('addtype', array('class' => 'form-control',
                                    'options' => array( 'sale' => 'for sale', 'let' => 'to let'))); ?>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">Price</span>
                            <?php echo $this->Form->input('price', array('class' => 'form-control', 'placeholder' => '£1000')); ?>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">Beds:</span>
                            <?php echo $this->Form->input('beds', array('class' => 'form-control',
                                    'options' => array( 0 => 'bedsite', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6=> 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10))); ?>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">Baths:</span>
                            <?php echo $this->Form->input('baths', array('class' => 'form-control',
                                    'options' => array( 1 => 1, 2 => 2, 3 => 3, 4 => 4))); ?>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">Garden:</span>
                            <?php echo $this->Form->input('garden', array('class' => 'form-control',
                                    'options' => array( 'no' => 'no', 'yes' => 'yes'))); ?>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">Parking:</span>
                            <?php echo $this->Form->input('parking', array('class' => 'form-control',
                                    'options' => array( 'no' => 'no', 'yes' => 'yes'))); ?>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">Type:</span>
                            <?php echo $this->Form->input('hometype', array('class' => 'form-control',
                                    'options' => array( 'house' => 'house','flat' => 'flat'))); ?>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">Year of build:</span>
                            <?php echo $this->Form->input('year', array('class' => 'form-control', 'placeholder' => 'Year of build')); ?>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">Featured:</span>
                            <?php echo $this->Form->input('featured', array('class' => 'form-control',
                                    'options' => array( 'no' => 'no', 'yes' => 'yes'))); ?>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">Visible:</span>
                            <?php echo $this->Form->input('hide', array('class' => 'form-control',
                                    'options' => array( 'no' => 'no', 'yes' => 'yes'))); ?>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">House no:</span>
                            <?php echo $this->Form->input('houseno', array('class' => 'form-control', 'placeholder' => 'House number')); ?>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">Street</span>
                            <?php echo $this->Form->input('street', array('class' => 'form-control', 'placeholder' => 'Street, road...')); ?>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">City/Town</span>
                            <?php echo $this->Form->input('city', array('class' => 'form-control', 'placeholder' => 'City or Town')); ?>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">Postcode:</span>
                            <?php echo $this->Form->input('postcode', array('class' => 'form-control', 'placeholder' => 'Postcode')); ?>
                        </div>
                        <br/>
                    </fieldset>
                    <?php echo $this->Form->submit('Register', array('class'=>'btn btn-primary'));?>
                </div>
            </div>
        </div>
    </div>
</div>

