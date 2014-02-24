<div class="panel panel-info">
    <div class="panel panel-heading">
     <h2 class="panel-title">Featured</h2>
    </div>
    <div class="panel-body">
        <div class="offset1">
            <?php echo $this->Html->image('noimage.jpg', array('alt' => 'NO IMAGE', 'border' => '0','width'=>'200px', 'height'=>'150px',
                    'url' =>  array('action' => 'view', $featured['Property']['id']))); ?>
        </div>
    </div>
</div>

