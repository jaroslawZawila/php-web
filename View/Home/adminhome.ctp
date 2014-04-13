<div class="row-fluid">
    <div class="span6">
        <div class="panel panel-info">
            <div class="panel panel-heading">
                <h2 class="panel-title">Lates offers:</h2>
            </div>
            <div class="panel-body">
            <?php if(count($offers) == 0) { echo '<div class="alert alert-info">There are not new offers.</div>'; };?>
               <?php if(count($offers) > 0): ?>
               <table class="table table-responsive">
                   <?php foreach ($offers as $key=>$offer): ?>
                       <tr>
                           <td><?php echo h($offer['Offer']['id']); ?>&nbsp;</td>
                           <td><?php echo h($offer['Customers']['firstname'] . " " . $offer['Customers']['surname']); ?>&nbsp;</td>
                           <td><?php echo h($offer['Offer']['status']); ?>&nbsp;</td>
                           <td class="btn btn-default btn-sm">
                               <?php echo $this->Html->link(__('View'), array('controller'=>'offers','action' => 'view', $offer['Offer']['id']), array('id'=>'view-offer-' . $key)); ?>
                           </td>
                       </tr>
                   <?php endforeach; ?>
               </table>
               <?php endif ?>
            </div>
        </div>
    </div>
    <div class="span6">
        <div class="panel panel-info">
            <div class="panel panel-heading">
                <h2 class="panel-title">Viewings today:</h2>
            </div>
            <div class="panel-body">
            <?php if(count($viewings) == 0) { echo '<div class="alert alert-info">No viewing today.</div>'; }?>
            <?php if(count($viewings) > 0): ?>
             <table class="table table-responsive">
                 <?php foreach ($viewings as $key=>$viewing): ?>
                     <tr>
                         <td><?php echo h($viewing['Viewing']['id']); ?>&nbsp;</td>
                         <td><?php echo h($viewing['Properties']['houseno'] . ", " .
                                          $viewing['Properties']['street'] . ", " .
                                          $viewing['Properties']['postcode']  ); ?>&nbsp;</td>
                         <td><?php echo h($viewing['Viewing']['date']); ?>&nbsp;</td>
                         <td class="btn btn-default btn-sm">
                             <?php echo $this->Html->link(__('View'), array('controller'=>'viewings','action' => 'edit', $viewing['Viewing']['id']), array('id'=>'view-viewing-' . $key)); ?>
                         </td>
                     </tr>
                 <?php endforeach; ?>
             </table>
             <?php endif ?>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span6">
        <div class="panel panel-info">
            <div class="panel panel-heading">
                <h2 class="panel-title">Lates requests:</h2>
            </div>
            <div class="panel-body">
            <?php if(count($requests) == 0) { echo '<div class="alert alert-info">There is not new request.</div>'; }?>
            <?php if(count($requests) > 0): ?>
                <table class="table table-responsive">
                    <?php foreach ($requests as $key=>$request): ?>
                        <tr>
                            <td><?php echo h($request['Request']['id']); ?>&nbsp;</td>
                            <td><?php echo h($request['Request']['name']); ?>&nbsp;</td>
                            <td><?php echo h($request['Request']['type']); ?>&nbsp;</td>
                            <td><?php echo h($request['Request']['status']); ?>&nbsp;</td>
                            <td><?php echo h($request['Request']['date']); ?>&nbsp;</td>
                            <td class="btn btn-default btn-sm">
                                <?php echo $this->Html->link(__('View'), array('controller'=>'requests','action' => 'view', $request['Request']['id']), array('id'=>'view-request-' . $key)); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif ?>
            </div>
        </div>
    </div>
        <div class="span6">
            <div class="panel panel-info">
                <div class="panel panel-heading">
                    <h2 class="panel-title">Lates info:</h2>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                      <li class="list-group-item">Information 1</li>
                      <li class="list-group-item">Information 2</li>
                      <li class="list-group-item">Information 3</li>
                      <li class="list-group-item">Information 4</li>
                    </ul>
                </div>
            </div>
        </div>
</div>