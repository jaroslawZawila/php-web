<div class="requests form">
    <?php echo $this->Form->create('Search', array('type' => 'get','inputDefaults' => array('label'=>false, 'div'=>false))); ?>
    <fieldset>
        <?php echo $this->Form->input('action', array('type' => 'hidden')); ?>
        <div class="input-group input-group-sm" style="margin-bottom: 0.5em">
            <span class="input-group-addon">postcode</span>
            <?php echo $this->Form->input('postcode', array('class' => 'form-control', 'placeholder' => 'bs5')); ?>
        </div>
        <div class="input-group input-group-sm" style="margin-bottom: 0.5em">
            <span class="input-group-addon">min</span>
            <?php echo $this->Form->input('mina', array('class' => 'form-control',
                    'options' => $minmax,
                    'empty' => 'no min')); ?>
        </div>
        <div class="input-group input-group-sm" style="margin-bottom: 0.5em">
            <span class="input-group-addon">max</span>
            <?php echo $this->Form->input('max', array('class' => 'form-control',
                    'options' => $minmax,
                    'empty' => 'no max')); ?>
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
    <?php
            echo $this->Form->submit('Search', array('class'=>'btn btn-primary'));
            echo $this->Form->end(); ?>
</div>