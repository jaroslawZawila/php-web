<div class="viewings form">
<?php echo $this->Form->create('Viewing', array('inputDefaults' => array('label'=>false, 'div'=>false))); ?>
	<fieldset>
		<legend><?php echo __('Manage viewing:'); ?></legend>
        <div class="input-group">
            <span class="input-group-addon">Created:</span>
            <input value="<?php echo $viewings['Viewing']['timestamp'] ?>" class="form-control"  disabled="true" />
        </div>
        <br/>
        <div class="input-group">
            <span class="input-group-addon">Property: </span>
            <input value="<?php echo $property_address ?>" class="form-control"  disabled="true" />
            <span class="input-group-addon">
               <?php echo $this->Html->link('details', array('controller' => 'properties','action' => 'view', $viewings['Properties']['id'] ));?>
            </span>
        </div>
        <br/>
        <div class="input-group">
            <span class="input-group-addon">Customer:</span>
            <input value="<?php echo $customer_name ?>" class="form-control"  disabled="true" />
            <span class="input-group-addon">
               <?php echo $this->Html->link('details', array('controller' => 'customers','action' => 'view', $viewings['Customers']['id'] ));?>
            </span>
        </div>
        <br/>
        <div class="input-group">
            <span class="input-group-addon">Date</span>
            <input size="16" name="data[Viewing][date]" type="text" value="<?php echo  $viewings['Viewing']['date']?>" readonly class="form_datetime form-control"/>
            <script type="text/javascript">
                $(".form_datetime").datetimepicker({format: 'dd-mm-yyyy hh:ii'});
            </script>
        </div>
        <br/>
        <div class="input-group">
            <span class="input-group-addon">Status:</span>
            <?php echo $this->Form->input('status', array('class' => 'form-control',
                    'options' => array('New' => 'New', 'Updated' => 'Updated', 'Closed' => 'Closed', 'Cancelled' => 'Cancelled'))); ?>
        </div>
        <br/>
        <div class="input-group">
            <span class="input-group-addon">Note:</span>
            <?php echo $this->Form->input('comment', array('type' => 'textarea', 'class' => 'form-control', 'placeholder' => 'message')); ?>
        </div>
        <br/>
        <?php echo $this->Form->input('properties_id', array('type'=>'hidden', 'value'=>$viewings['Properties']['id'] )) ?>
        <?php echo $this->Form->input('customers_id', array('type'=>'hidden', 'value'=>$viewings['Customers']['id'] )) ?>
	</fieldset>
    <div class="row-fluid">
        <div class="span2">
            <?php echo $this->Form->submit('Update', array('class'=>'btn btn-primary', 'id'=>'update-viewings'));?>
            <?php echo $this->Form->end(); ?></div>
        <div ><?php echo $this->Html->link('Back to viewings', array('controller' => 'viewings', 'action' => 'index'), array('class'=>'btn btn-info')); ?></div>
    </div>


</div>
