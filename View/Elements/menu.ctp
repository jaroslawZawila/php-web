<div class="navbar">
<?php echo $this->Html->image('logo.jpg', array('alt'=>'LOGO', 'width'=>'100%')) ?>
    <div class="navbar-inner">
        <?php
         if ($this->Session->read('Auth.User')) {
                echo $this->element('admin-menu');
                echo $this->Html->link('log out', array('type'=>'button', 'class'=>'btn-link', 'float'=>'right', 'controller'=>'Users', 'action'=>'logout'));
            }else {
                echo $this->element('general-menu');
                echo $this->Html->link('log in', array('type'=>'button', 'class'=>'btn-link', 'float'=>'right', 'controller'=>'Users', 'action'=>'login'));
            };
        ?>
    </div>
</div>