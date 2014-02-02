<div class="panel panel-primary span3 offset4">

        <?php
                echo $this->Form->create('User', array('action' => 'login'), array('inputDefaults' => array(
                'div' => array('class' => 'panel-body')
                )));
                echo $this->Form->inputs(array(
                'legend' => __('Login'),
                'username',
                'password'
                ));
                echo $this->Form->end('Login');
                ?>
</div>


