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
    <div class="span8">
        <div class="panel panel-info">
            <div class="panel panel-heading">
                <h2 class="panel-title">Results</h2>
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
    <div class="span2">
        <div class="panel panel-info">
            <div class="panel panel-heading">
                <h2 class="panel-title">Featured</h2>
            </div>
            <div class="panel-body">
                <p>Featured.</p>

            </div>
        </div>
    </div>
</div>


