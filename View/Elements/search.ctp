<div class="requests form">
    <?php echo $this->Form->create('Search', array('type' => 'get','inputDefaults' => array('label'=>false, 'div'=>false))); ?>
    <fieldset>
        <div class="input-group input-group-sm">
            <span class="input-group-addon">postcode</span>
            <?php echo $this->Form->input('postcode', array('class' => 'form-control', 'placeholder' => 'bs5')); ?>
        </div>
        <div class="input-group input-group-sm">
            <span class="input-group-addon">min</span>
            <?php echo $this->Form->input('mina', array('class' => 'form-control',
                    'options' => $minmax,
                    'empty' => 'no min')); ?>
        </div>
        <div class="input-group input-group-sm">
            <span class="input-group-addon">max</span>
            <?php echo $this->Form->input('max', array('class' => 'form-control',
                    'options' => $minmax,
                    'empty' => 'no max')); ?>
        </div>
    </fieldset>
    <?php
            echo $this->Form->submit('Search', array('class'=>'btn btn-primary'));
            echo $this->Form->end(); ?>
</div>