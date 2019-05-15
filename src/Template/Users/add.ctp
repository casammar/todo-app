<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="row justify-content-center align-items-center h-100">
  <div class="user-signup form col-lg-6">
      <?= $this->Form->create() ?>
      <fieldset>
          <legend><?= __('Sign Up') ?></legend>
          <?php
            echo $this->Form->control('username', ['class'=>'form-control mb-4']);
            echo $this->Form->control('password', ['class'=>'form-control mb-4']);
          ?>
      </fieldset>
      <?= $this->Form->button(__('Sign Up'),['class'=>'btn btn-info btn-block my-4'] ) ?>
      <?= $this->Form->end() ?>
  </div>
</div>
