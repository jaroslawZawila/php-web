<div class="row-fluid">
    <div class="span12">
        <div class="panel panel-info">
            <div class="panel panel-heading">
                <h2 class="panel-title" id="page-title">Personal information</h2></div>
            <div class="panel-body">
                <div>
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#basicdetails" data-toggle="tab">Basic details</a></li>
                        <li><a href="#compensation" data-toggle="tab" id="compensation-tab">Compensation</a></li>
                        <li><a href="#permisions" data-toggle="tab" id="permisions-tab">Permisions</a></li>
                        <?php if($staff['Staff']['fdate'] == ''): ?>
                            <li><a href="#term" data-toggle="tab" id="term-tab">Terminate</a></li>
                        <?php endif ?>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane in active" id="basicdetails">
                        <?php echo $this->element('staff-details', $staff); ?>
                    </div>
                    <div class="tab-pane" id="compensation">
                       <?php echo $this->element('compensation', $staff); ?>
                    </div>
                    <div class="tab-pane" id="permisions">
                        <?php echo $this->element('permision', $staff); ?>
                    </div>
                    <div class="tab-pane" id="term">
                        <?php echo $this->element('terminate', $staff); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>