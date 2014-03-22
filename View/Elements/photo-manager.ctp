<div class="modal fade" id="addPhotoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo $this->Form->create('Photo', array('controller' => 'photos', 'action'=>'create', 'inputDefaults' => array('label'=>false, 'div'=>false),'enctype' => 'multipart/form-data')); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add comment</h4>
            </div>
            <div class="modal-body">
                <fieldset>
                    <div class="input-group">
                        <span class="input-group-addon">Description:</span>
                        <?php echo $this->Form->input('description', array('class' => 'form-control', 'placeholder' => 'Short description ...')); ?>
                    </div>
                    <br/>
                    <div class="input-group">
                        <?php echo $this->Form->input('photo', array('class' => 'form-control', 'type' => 'file', 'value' => 'dasdas')); ?>
                    </div>
                    <br/>
                    <?php echo $this->Form->input('propertyid', array('type'=>'hidden', 'value'=>$property['Property']['id'] )) ?>
                </fieldset>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?php  echo $this->Form->submit('add photo', array('class'=>'btn btn-primary', 'div' => false)); ?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>

<table class="table">
<tr>
    <td><button class="btn btn-primary" data-toggle="modal" data-target="#addPhotoModal">
        add photo
    </button></td>
</tr>
<?php if ( count($photos) == 0) { echo '<div class="alert alert-warning">Sorry there are not pictures for this properties.</div>'; }; ?>
<?php foreach ($photos as $photo): ?>
<tr>
    <td><?php echo $this->Html->image($photo['Photo']['url'], array('alt' => 'NO IMAGE', 'border' => '0','width'=>'150px', 'height'=>'110px'));?></td>
    <td><b>Description:</b><p><?php echo $photo['Photo']['description'] ?></p></td>
    <td><?php echo $this->Form->postLink(__('Delete'), array('controller' => 'photos','action' => 'delete', $photo['Photo']['id']), null, __('Are you sure you want to delete??')); ?></td>
</tr>
<?php endforeach; ?>
</table>
