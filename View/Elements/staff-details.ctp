<div class="modal fade" id="editStaffModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo $this->Form->create('Staff', array('action'=>'update','url'=>'/staffs/edit/' . $staff['Staff']['id'] , 'inputDefaults' => array('label'=>false, 'div'=>false))); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Update details:</h4>
            </div>
            <div class="modal-body">
                <fieldset>
                    <div class="input-group">
                        <span class="input-group-addon">Address:</span>
                        <?php echo $this->Form->input('address', array('class' => 'form-control', 'id' => 'e-address', 'placeholder' => '11,Street,City,Postcode', 'value' => $staff['Staff']['address'])); ?>
                    </div>
                    <br/>
                    <div class="input-group">
                        <span class="input-group-addon">Phone</span>
                        <?php echo $this->Form->input('phone', array('class' => 'form-control', 'id' => 'e-phone', 'placeholder' => '', 'value' => $staff['Staff']['phone'])); ?>
                    </div>
                    <br/>
                    <div class="input-group">
                        <span class="input-group-addon">NIN</span>
                        <?php echo $this->Form->input('nin', array('class' => 'form-control', 'id' => 'e-nin', 'placeholder' => 'NIN', 'value' => $staff['Staff']['nin'])); ?>
                    </div>
                    <br/>
                </fieldset>
            </div>
            <div class="modal-footer">
                <?php echo $this->Form->submit('Upadate', array('class'=>'btn btn-primary', 'id'=>'epu'));?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<table class="table">
    <tr>
        <td><b>Firstname:</b></td>
        <td id="fname"><?php echo h($staff['Staff']['fname']); ?></td>
        <td><b>Surname:</b></td>
        <td id="sname"><?php echo h($staff['Staff']['sname']); ?></td>
    </tr>
    <tr>
        <td><b>Address:</b></td>
        <td id="address" colspan="3"><?php echo h($staff['Staff']['address']); ?></td>
        </tr>
    <tr>
        <td><b>Phone:</b></td>
        <td id="phone"><?php echo h($staff['Staff']['phone']); ?></td>
        <td><b>NIN:</b></td>
        <td id="nin"><?php echo h($staff['Staff']['nin']); ?></td>
    </tr>
    <tr>
        <td><b>Employment started:</b></td>
        <td id="es"><?php echo h($staff['Staff']['sdate']); ?></td>
        <td><b>Employment terminated:</b></td>
        <td id="et"><?php echo h($staff['Staff']['fdate']); ?></td>
    </tr>
    <tr>
        <td colspan="4">
        <?php if($staff['Staff']['fdate'] == ''): ?>
            <button class="btn btn-default" data-toggle="modal" data-target="#editStaffModal" id="edit-Staff">
                Edit
            </button>
        <?php endif ?>
        </td>
    </tr>
</table>