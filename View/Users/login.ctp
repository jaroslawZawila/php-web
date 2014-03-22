<div class="span4 offset4">
    <div class="panel panel-info">
        <div class="panel panel-heading">
            <h2 class="panel-title">Log in:</h2>
        </div>
        <div class="panel-body">
            <?php echo $this->Form->create('User', array('action' => 'login','inputDefaults' => array('label'=>false, 'div'=>false))); ?>
            <fieldset>
            <div class="input-group">
                <span class="input-group-addon">Username:</span>
                <?php echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'Your username', 'id'=>'username')); ?>
            </div>
            <br/>
            <div class="input-group">
                <span class="input-group-addon">Password:</span>
                <?php echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Your password', 'id'=>'password')); ?>
            </div>
            </fieldset>
            <br/>
             <?php echo $this->Form->submit('Login', array('class'=>'btn btn-primary', 'id'=>'login-button'));
                   echo $this->Form->end(); ?>
        </div>
    </div>
</div>


