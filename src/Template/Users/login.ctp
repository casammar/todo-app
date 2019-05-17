<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="row justify-content-center align-items-center h-100">
    <div class="user-login form col-lg-6">
        <?php echo $this->Form->create(); ?>
        <fieldset>
            <legend><?php echo __('Login') ?></legend>
            <?php
                echo $this->Form->control('username', ['class'=>'form-control mb-4']);
                echo $this->Form->control('password', ['class'=>'form-control mb-4']);
            ?>
        </fieldset>
        <?php echo $this->Form->button(__('Login'),['class'=>'btn btn-info btn-block my-4']); ?>
        <?php echo $this->Form->end(); ?>
        <p>Not a member?
          <?php echo $this->Html->link('' . __('Sign Up'), ['controller' => 'Users', 'action' => 'add'], ['escape' => false]); ?>
            <a href="">Sign Up</a>
        </p>
    </div>
</div>
