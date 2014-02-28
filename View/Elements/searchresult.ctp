<div class="panel panel-default">
    <div class="panel-body">
        <div class="row-fluid">
            <div class="span3">
                <?php  if( $property['Photo']['url'] != null) {
                            $url = $property['Photo']['url'];
                        }else {
                            $url = 'noimage.jpg';
                        };
                        echo $this->Html->image($url, array('alt' => 'NO IMAGE', 'border' => '0','width'=>'150px', 'height'=>'110px',
                        'url' =>  array('action' => 'view', $property['Property']['id'])));
                        ?>
            </div>
            <div class="span9">
                <b><?php echo ($property['Property']['street']) . ' , ' . ($property['Property']['city']) ?></b>
                <b style="color:red; float: right"><?php echo '£ ' . ($property['Property']['price'])?></b>
                <div><br/>
                    <?php echo substr(($property['Property']['description']),0, 150 )?>
                    <?php echo $this->Html->link('more...', array('action' => 'view', $property['Property']['id'])); ?>
                </div>
                <div><br/>
                    <b><?php echo ($property['Property']['status']) ?></b>
                </div>
            </div>
        </div>

    </div>
</div>