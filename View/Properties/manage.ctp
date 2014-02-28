<div class="row-fluid">
    <div class="span12">
        <div class="panel panel-info">
            <div class="panel panel-heading">
                <h2 class="panel-title">Properties:</h2>
            </div>
            <div class="panel-body">
                <div>
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#basicdetails" data-toggle="tab">Basic details</a></li>
                        <li><a href="#photos" data-toggle="tab">Photos</a></li>
                        <li><a href="#docs" data-toggle="tab">Documents</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane in active" id="basicdetails">

                    </div>
                    <div class="tab-pane" id="photos">
                       <?php echo $this->element('photo-manager'); ?>
                    </div>
                    <div class="tab-pane" id="docs">... docs ...</div>
                </div>

            </div>
        </div>
    </div>
</div>