<div class="row-fluid">
    <div class="span12">
        <div class="panel panel-info">
            <div class="panel panel-heading">
                <h2 class="panel-title" id="page-title">Property manager:<a href="<?php echo $back ?>" style="float: right">back</a></h2></div>
            <div class="panel-body">
                <div>
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#basicdetails" data-toggle="tab">Basic details</a></li>
                        <li><a href="#description" data-toggle="tab" id="description-tab">Description</a></li>
                        <li><a href="#photos" data-toggle="tab" id="photo-tab">Photos</a></li>
                        <li><a href="#docs" data-toggle="tab">Documents</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane in active" id="basicdetails">
                        <?php echo $this->element('property-details', $property); ?>
                    </div>
                    <div class="tab-pane" id="photos">
                       <?php echo $this->element('photo-manager'); ?>
                    </div>
                    <div class="tab-pane" id="docs"><?php echo $this->element('doc-manager'); ?></div>
                    <div class="tab-pane" id="description">
                        <?php echo $this->Form->create('Property', array('action'=>'update_description','inputDefaults' => array('label'=>false, 'div'=>false))); ?>
                        <fieldset>
                            <div class="input-group">
                                <span class="input-group-addon">Description</span>
                                <?php echo $this->Form->input('description', array('type' => 'textarea', 'value'=>$property['Property']['description'], 'class' => 'form-control', 'placeholder' => 'Property description')); ?>
                                <?php echo $this->Form->input('id', array('type'=>'hidden', 'value'=>$property['Property']['id'] )) ?>
                            </div>
                        </fieldset>
                        <?php echo $this->Form->submit('Update', array('class'=>'btn btn-primary', 'id'=>'update-description'));
                                echo $this->Form->end(); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>