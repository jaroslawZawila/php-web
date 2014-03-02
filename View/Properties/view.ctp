<div class="row-fluid">
    <div class="span7 offset2">
        <div class="panel panel-info">
            <div class="panel panel-heading">
                <h2 class="panel-title">
                    <?php echo h($property['Property']['street'] . ', ' .
                            $property['Property']['city'] .
                            ', price £' . $property['Property']['price']); ?></h2>
            </div>
            <div class="panel-body">
                <div id="master-img">
                    <?php   if($property['Photo']) {
                                echo $this->Html->image($property['Photo']['url'], array('alt' => 'NO IMAGE', 'class'=>'thumbnail', 'border' => '0','width'=>'100%', 'height'=>'100%'));
                            }else {
                                echo $this->Html->image('noimage.jpg', array('alt' => 'NO IMAGE', 'border' => '0', 'class'=>'thumbnail','width'=>'100%', 'height'=>'100%'));
                            }?>
                </div>
                <div class="row-fluid">
                    <?php  $index = 0;
                           if(count($property['Photo']) > 1) {
                           foreach ($photos as $photo):
                           $index++;
                           $modalname = 'showPhoto-' . $index?>

                            <div class="modal fade" id=<?php echo $modalname?> tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <?php echo $this->Form->create('Photo', array('controller' => 'photos', 'action'=>'create', 'inputDefaults' => array('label'=>false, 'div'=>false),'enctype' => 'multipart/form-data')); ?>
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo $this->Html->image($photo['Photo']['url'], array('alt' => 'NO IMAGE',
                                                    'class'=>'thumbnail', 'border' => '0px','width'=>'100%', 'height'=>'100%')); ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                             <div class="span2">
                                 <a data-toggle="modal" data-target=<?php echo '#' . $modalname ?>>
                                    <?php echo $this->Html->image($photo['Photo']['url'], array('alt' => 'NO IMAGE',
                                    'class'=>'thumbnail', 'border' => '0px','width'=>'100%', 'height'=>'100%')); ?>
                                 </a>
                             </div>
                           <?php endforeach;} ?>

                </div>
                <div id="small-imgs"></div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="panel-body span12">
                            <div class="span6">
                                <p><b>Bedrooms</b>: <?php echo ($property['Property']['beds']) ?></p>
                                <p><b>Garden</b>: <?php echo ($property['Property']['garden']) ?></p>
                                <p><b>Year of build:</b>: <?php echo ($property['Property']['year']) ?></p>
                                <p><b>Status:</b>: <?php echo ($property['Property']['status']) ?></p>
                            </div>
                            <div class="span6">
                                <p><b>Bathrooms</b>: <?php echo ($property['Property']['baths']) ?></p>
                                <p><b>Parking</b>: <?php echo ($property['Property']['parking']) ?></p>
                                <p><b>Type</b>: <?php echo ($property['Property']['hometype']) ?></p>
                            </div>
                            <div class="span12">
                                <hr class="span10 offset1"/>
                                <b>Description: </b>
                                <p><?php echo ($property['Property']['description']) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


