<div class="row-fluid">
    <div class="panel panel-info">
        <div class="panel panel-heading">
            <h2 class="panel-title">Add member of staff:</h2>
        </div>
        <div class="panel-body">
            <div class="row-fluid span9 offset1">
                <?php echo $this->Session->flash(); ?>
                <div class="requests form">
                    <?php echo $this->Form->create('Staff', array('inputDefaults' => array('label'=>false, 'div'=>false))); ?>
                    <fieldset>
                        <div class="input-group">
                            <span class="input-group-addon">First name:</span>
                            <?php echo $this->Form->input('fname', array('class' => 'form-control','id'=>'fname', 'placeholder' => 'first name')); ?>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">Surname:</span>
                            <?php echo $this->Form->input('sname', array('class' => 'form-control','id'=>'sname', 'placeholder' => 'surname')); ?>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">Address:</span>
                            <?php echo $this->Form->input('address', array('class' => 'form-control','id'=>'address', 'placeholder' => '11, Street,City,Postcode')); ?>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">Phone:</span>
                            <?php echo $this->Form->input('phone', array('class' => 'form-control','id'=>'phone', 'placeholder' => 'Contact number')); ?>
                        </div>
                        <br/>
                         <div class="input-group">
                            <span class="input-group-addon">NIN:</span>
                            <?php echo $this->Form->input('nin', array('class' => 'form-control','id'=>'nin', 'placeholder' => 'NIN')); ?>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">Salary:</span>
                            <?php echo $this->Form->input('compensation', array('class' => 'form-control','id'=>'salary', 'placeholder' => '£18000')); ?>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">Bonus:</span>
                            <?php echo $this->Form->input('bonus', array('class' => 'form-control','id'=>'bonus', 'placeholder' => '5%')); ?>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">Start date:</span>
                            <?php echo $this->Form->input('sdate', array('class' => 'form-control','id'=>'sdate', 'placeholder' => '04/04/2014')); ?>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">Username:</span>
                            <?php echo $this->Form->input('username', array('class' => 'form-control','id'=>'username', 'placeholder' => 'username')); ?>
                        </div>
                        <br/>
                    </fieldset>
                    <?php echo $this->Form->submit('Register', array('class'=>'btn btn-primary', 'id'=>'register',));?>
                </div>
            </div>
        </div>
    </div>
</div>