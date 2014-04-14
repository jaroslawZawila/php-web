<div class="modal fade" id="editCompModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo $this->Form->create('Staff', array('action'=>'edit','url'=>'/staffs/edit/' . $staff['Staff']['id'] , 'inputDefaults' => array('label'=>false, 'div'=>false))); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Update compensation details:</h4>
            </div>
            <div class="modal-body">
                <fieldset>
                    <div class="input-group">
                        <span class="input-group-addon">Salary</span>
                        <?php echo $this->Form->input('compensation', array('class' => 'form-control', 'id' => 'e-compensation', 'placeholder' => '£1000', 'value' => $staff['Staff']['compensation'])); ?>
                    </div>
                    <br/>
                    <div class="input-group">
                        <span class="input-group-addon">Bonus</span>
                        <?php echo $this->Form->input('bonus', array('class' => 'form-control', 'id' => 'e-bonus', 'placeholder' => '10%', 'value' => $staff['Staff']['bonus'])); ?>
                        <span class="input-group-addon">%</span>
                    </div>
                    <br/>
                </fieldset>
            </div>
            <div class="modal-footer">
                <?php echo $this->Form->submit('Upadate', array('class'=>'btn btn-primary', 'id'=>'epu'))?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>

<table class="table">
    <tr>
        <td><b>Salary:</b></td>
        <td id="salary">£<?php echo h($staff['Staff']['compensation']); ?></td>
        <td><b>Bonus:</b></td>
        <td id="bonus"><?php echo h($staff['Staff']['bonus']); ?>%</td>
    </tr>
    <tr>
        <td colspan="4">
          <?php if($staff['Staff']['fdate'] == ''): ?>
            <button class="btn btn-default" data-toggle="modal" data-target="#editCompModal" id="edit-comp">
                Edit
            </button>
          <?php endif ?>
        </td>
    </tr>
</table>