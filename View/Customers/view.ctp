<div class="row-fluid">
<div class="span12">
    <div class="panel panel-info">
        <div class="panel panel-heading">
            <h2 class="panel-title">Customer: <?php echo h($customer['Customer']['firstname']); ?>  <?php echo h($customer['Customer']['surname']); ?></h2>
        </div>
        <div class="panel-body">
            <div>
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#basicdetails" data-toggle="tab">Basic details</a></li>
                    <li><a href="#viewing" data-toggle="tab">Viewing</a></li>
                    <li><a href="#docs" data-toggle="tab">Documents</a></li>
                    <li class=<?php echo $visible ?> ><a href="#properties" data-toggle="tab" id="properties-tab">Properties</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane in active" id="basicdetails">
                    <table class="table">
                        <tr>
                            <td><b>Type:</b></td>
                            <td colspan="3"><?php echo h($customer['Customer']['type']); ?></td>
                        </tr>
                        <tr>
                            <td><b>Firstname:</b></td>
                            <td><?php echo h($customer['Customer']['firstname']); ?></td>
                            <td><b>Surname:</b></td>
                            <td><?php echo h($customer['Customer']['surname']); ?></td>
                        </tr>
                        <tr>
                            <td><b>Email:</b></td>
                            <td><?php echo h($customer['Customer']['email']); ?></td>
                            <td><b>Phone:</b></td>
                            <td><?php echo h($customer['Customer']['phone']); ?></td>
                        </tr>
                    </table>
                </div>
                <div class="tab-pane" id="viewing"><?php echo $this->element('viewing-customer', array('viewings' => $viewings)) ?></div>
                <div class="tab-pane" id="docs"><?php echo $this->element('docs-customer', array('docs' => $docs)) ?></div>
                <div class="tab-pane" id="properties" ><?php echo $this->element('properties-details', array('properties' => $properties, 'customerid' => $customer['Customer']['id'] )) ?></div>
            </div>

        </div>
    </div>
</div>
</div>
