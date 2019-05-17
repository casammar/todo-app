<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Chris\'s Awesome Todo App ';
?>
<?php echo $this->Html->docType(); ?>
<html>
<head>
    <?php echo $this->element('head', array('cakeDescription' => $cakeDescription)); ?>
</head>
<body>
    <?php echo $this->element('header', array('authUser' => $authUser)); ?>
    <?php echo $this->Flash->render(); ?>
    <div class="container content large-8 large-offset-2 clearfix pt-5">
        <?php echo $this->fetch('content'); ?>
    </div>
    <?php echo $this->element('footer'); ?>
</body>
</html>
