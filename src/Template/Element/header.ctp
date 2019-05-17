<nav class="navbar navbar-expand-lg navbar-dark bg-dark" data-topbar role="navigation">
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
            <ul class="navbar-nav text-right">
                <?php if (!$authUser) { ?>
                <li>
                  <?php echo $this->Html->link('' . __('Login'), ['controller' => 'Users', 'action' => 'login'], ['escape' => false]); ?>
                </li>
                <?php } else { ?>
                <li>
                  <a href="#">Hi, <?php echo $authUser['username']; ?></a>
                </li>
                <li>
                  <?php echo $this->Html->link('' . __('Logout'), ['controller' => 'Users', 'action' => 'logout'], ['escape' => false]); ?>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
