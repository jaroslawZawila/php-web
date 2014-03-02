<div class="panel panel-info">
    <div class="panel panel-heading">
     <h2 class="panel-title">Featured</h2>
    </div>
    <div class="panel-body">
        <div class="offset1">
            <?php  if( $featured['Photo']['url'] != null) {
                    $url = $featured['Photo']['url'];
                    }else {
                    $url = 'noimage.jpg';
                    };
                    echo $this->Html->image($url, array('alt' => 'NO IMAGE', 'border' => '0','width'=>'150px', 'height'=>'110px',
                    'url' =>  array('action' => 'view', $featured['Property']['id'])));
                    ?>
        </div>
    </div>
</div>

