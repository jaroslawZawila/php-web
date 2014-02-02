<div class="panel panel-default">
    <div class="panel-heading">Panel heading without title</div>
    <div class="panel-body">
        <?php
                echo $this->Form->create('User', array('action' => 'login'));
                echo $this->Form->inputs(array(
                'legend' => __('Login'),
                'username',
                'password'
                ));
                echo $this->Form->end('Login');
                ?>
    </div>
</div>

<div class="panel panel-primary">
<div class="panel-heading">
    <h3 class="panel-title">Panel title</h3>
</div>
<div class="panel-body">
    Panel content
</div>
</div>

