<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="row justify-content-center align-items-center h-100">
  <div class="user-signup form col-lg-6">
      <?php echo $this->Form->create(); ?>
      <fieldset>
          <legend><?php echo $title; ?></legend>
          <p>
            <strong>Username and Password must be at least 6 characters</strong>
          </p>
          <?php
            echo $this->Form->control('username', ['label' => 'Email Address', 'class'=>'form-control mb-4', 'type' => 'email']);
            echo $this->Form->control('password', ['class'=>'form-control mb-4']);
          ?>
      </fieldset>
      <?php echo $this->Form->button(__('Sign Up'), ['class'=>'btn btn-info btn-block my-4']); ?>
      <?php echo $this->Form->end(); ?>
  </div>
</div>
