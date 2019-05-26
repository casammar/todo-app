<nav class="navbar navbar-expand-lg navbar-dark bg-dark" data-topbar role="navigation">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand" href="<?php echo $this->Url->build('/', true); ?>">TODO App</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $this->Url->build('/tasks', true); ?>">Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $this->Url->build('/users', true); ?>">Users</a>
                </li>
            </ul>
            <ul class="navbar-nav text-right">
                <?php if (!$authUser) { ?>
                <li class="nav-item">
                  <?php echo $this->Html->link('' . __('Login'), ['controller' => 'Users', 'action' => 'login'], ['class' => 'nav-link'], ['escape' => false]); ?>
                </li>
                <?php } else { ?>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Hi, <?php echo (isset($authUser['username']) ? $authUser['username'] : '');  ?>
                    </a>
                    <div class="dropdown-menu" >
                      <?php echo $this->Html->link('' . __('Logout'), ['controller' => 'Users', 'action' => 'logout'], ['class' => 'nav-link text-primary'], ['escape' => false]); ?>
                    </div>
                  </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
