<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <?php echo $this->Html->image('logo.jpg', array('alt'=>'LOGO', 'width'=>'100%')) ?>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php
                    if ($this->Session->read('Auth.User')) {
                        echo $this->element('admin-menu');
                        echo $this->Html->link('log out',
                            array('type'=>'button', 'class'=>'btn-link', 'float'=>'right', 'controller'=>'Users', 'action'=>'logout'),
                            array('style'=>'color:grey;float:right'));
                    }else {
                        echo $this->element('general-menu');
                        echo $this->Html->link('log in',
                            array('type'=>'button', 'class'=>'btn-link', 'float'=>'right', 'controller'=>'Users', 'action'=>'login'),
                            array('style'=>'color:grey;float:right'));
                    };
                    ?>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

