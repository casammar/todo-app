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

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <!-- STYLES -->
    <?= $this->Html->css('bootstrap') ?>
    <!-- SCRIPTS -->
    <?= $this->Html->script('jquery') ?>
    <?= $this->Html->script('bootstrap.bundle') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a class="navbar-brand" href="<?php echo $this->Url->build('/', true); ?>">TODO App</a>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo $this->Url->build('/tasks', true); ?>">Tasks</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo $this->Url->build('/users', true); ?>">Users</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <?php if (!$authUser) { ?>
                  <!-- <li><?= $this->Html->link('' . __('Sign Up'), ['controller' => 'Users', 'action' => 'add'], ['escape' => false]) ?></li> -->
                  <li><?= $this->Html->link('' . __('Login'), ['controller' => 'Users', 'action' => 'login'], ['escape' => false]) ?></li>
                <?php } else { ?>
                  <li><a href="#">Hi, <?= $authUser['username']?></a></li>
                  <li><?= $this->Html->link('' . __('Logout'), ['controller' => 'Users', 'action' => 'logout'], ['escape' => false]) ?></li>
                <?php } ?>
            </div>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container content large-8 large-offset-2 clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
