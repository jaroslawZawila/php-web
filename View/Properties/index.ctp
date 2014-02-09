<div class="row-fluid">
    <div class="span2">
        <div class="panel panel-info">
            <div class="panel panel-heading">
                <h2 class="panel-title">Search:</h2>
            </div>
            <div class="pnel-body">
                <?php echo $this->element('search') ?>
            </div>
        </div>
    </div>
    <div class="span7">
        <div class="panel panel-info">
            <div class="panel panel-heading">
                <h2 class="panel-title"><?php echo $resultstitle ?></h2>
            </div>
            <div class="panel-body">
                <div class="properties index">
                    <table cellpadding="0" cellspacing="0">
                        <?php foreach ($properties as $property):
                                echo $this->element('searchresult', array('property'=>$property))?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="span3">
        <?php foreach ($featureds as $featured):
                echo $this->element('featured', array('featured'=>$featured))?>
        <?php endforeach; ?>
    </div>
</div>
        <!--<?php echo $this->element('sql_dump'); ?>-->


