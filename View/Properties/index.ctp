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
                <p>Results.</p>
                <div class="properties index">
                    <h2><?php echo __('Properties'); ?></h2>
                    <table cellpadding="0" cellspacing="0">
                        <?php foreach ($properties as $property): ?>
                        <tr>
                            <td><?php echo h($property['Property']['id']); ?>&nbsp;</td>
                            <td><?php echo h($property['Property']['price']); ?>&nbsp;</td>
                            <td><?php echo h($property['Property']['beds']); ?>&nbsp;</td>
                            <td><?php echo h($property['Property']['baths']); ?>&nbsp;</td>
                            <td><?php echo h($property['Property']['garden']); ?>&nbsp;</td>
                            <td><?php echo h($property['Property']['parking']); ?>&nbsp;</td>
                            <td><?php echo h($property['Property']['hometype']); ?>&nbsp;</td>
                            <td><?php echo h($property['Property']['year']); ?>&nbsp;</td>
                            <td><?php echo h($property['Property']['status']); ?>&nbsp;</td>
                            <td><?php echo h($property['Property']['featured']); ?>&nbsp;</td>
                            <td><?php echo h($property['Property']['hide']); ?>&nbsp;</td>
                            <td><?php echo h($property['Property']['description']); ?>&nbsp;</td>
                            <td><?php echo h($property['Property']['postcode']); ?>&nbsp;</td>
                            <td><?php echo h($property['Property']['houseno']); ?>&nbsp;</td>
                            <td><?php echo h($property['Property']['street']); ?>&nbsp;</td>
                            <td><?php echo h($property['Property']['city']); ?>&nbsp;</td>
                            <td>
                                <?php echo $this->Html->link($property['Customers']['id'], array('controller' => 'customers', 'action' => 'view', $property['Customers']['id'])); ?>
                            </td>
                            <td class="actions">
                                <?php echo $this->Html->link(__('View'), array('action' => 'view', $property['Property']['id'])); ?>
                                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $property['Property']['id'])); ?>
                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $property['Property']['id']), null, __('Are you sure you want to delete # %s?', $property['Property']['id'])); ?>
                            </td>
                        </tr>
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


