<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Love Estate Agent');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
        echo $this->Html->script('jquery-1.9.0');
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap');
        echo $this->Html->css('bootstrap-responsive');
        echo $this->Html->script('bootstrap');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container" class="container">
        <div class="span12">
            <div id="content" class="">
                <div id="menu">
                    <?php echo $this->element('menu'); ?>
                </div>
                <?php echo $this->Session->flash(); ?>

                <?php echo $this->fetch('content'); ?>
            <div id="footer">
            </div>
            </div>
        </div>
	</div>
</body>
</html>
