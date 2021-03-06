<div class="requests form">
    <?php echo $this->Form->create('Search', array('url' => array('controller' => 'properties', 'action' => 'index'),
            'type' => 'get','inputDefaults' => array('label'=>false, 'div'=>false))); ?>
    <fieldset>
        <div class="input-group input-group-sm" style="margin-bottom: 0.5em">
            <span class="input-group-addon">postcode</span>
            <?php echo $this->Form->input('postcode', array('class' => 'form-control', 'placeholder' => 'bs5')); ?>
        </div>
        <div class="input-group input-group-sm" style="margin-bottom: 0.5em">
            <span class="input-group-addon">min beds</span>
            <?php echo $this->Form->input('minbeds', array('class' => 'form-control',
                    'options' => array('no min','1','2','3','4','5','6','7'))); ?>
        </div>
        <div class="input-group input-group-sm" style="margin-bottom: 0.5em">
            <span class="input-group-addon">max beds</span>
            <?php echo $this->Form->input('maxbeds', array('class' => 'form-control',
                    'options' => array('no max','1','2','3','4','5','6','7'))); ?>
        </div>
        <div class="input-group input-group-sm" style="margin-bottom: 0.5em">
            <span class="input-group-addon">type</span>
            <?php echo $this->Form->input('type', array('class' => 'form-control',
                    'options' => array('house' => 'house','flat' => 'flat'),
                    'empty' => 'no type')); ?>
        </div>
    </fieldset>
    <div class="span3">
       <?php echo $this->Form->submit('Sell', array('class'=>'btn btn-primary', 'name'=>'action' , 'id'=> 'quick-sell')); ?>
    </div>
    <div class="span3">
        <?php echo $this->Form->submit('Let', array('class'=>'btn btn-primary', 'name'=>'action', 'id' => 'quick-let'));
                echo $this->Form->end();?>
    </div>

</div>