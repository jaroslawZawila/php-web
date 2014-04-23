<?php echo $this->Form->create('User', array('action'=>'edit','url'=>'/users/edit/' . $staff['Users']['id']  , 'inputDefaults' => array('label'=>false, 'div'=>false))); ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
        <fieldset>
            <div class="input-group">
                <span class="input-group-addon">Username:</span>
                <?php echo $this->Form->input('username', array('class' => 'form-control', 'id' => 'uname', 'autocomplete' => 'off',
                 'placeholder' => 'username', 'value' => $staff['Users']['username'])); ?>
            </div>
            <br/>
            <div class="input-group">
                <span class="input-group-addon">Password:</span>
                <?php echo $this->Form->input('password', array('class' => 'form-control', 'id' => 'password'
                , 'value' => $staff['Users']['password'])); ?>
            </div>
            <br>
            <div class="input-group">
            <span class="input-group-addon">Group:</span>
                <?php echo $this->Form->input('group_id', array('class' => 'form-control', 'id' => 'group',
                        'options' => $groups,
                        'value' => $staff['Users']['group_id'])); ?>
            </div>
            <br/>
        </fieldset>
    </div>
    <div class="modal-footer">
        <?php echo $this->Form->submit('Upadate', array('class'=>'btn btn-primary', 'id'=>'update'));?>
        <?php echo $this->Form->end(); ?>
    </div>
