<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$this->Form->templates($form_templates['bootstrapFormElements']);
?>

<div class="task task-edit form col-lg-9">
  <?php echo $this->Form->create($user); ?>
  <fieldset>
      <legend><?php echo __('Edit User'); ?></legend>
      <?php
          echo $this->Form->control('username');
          echo $this->Form->control('password');
      ?>
  </fieldset>
  <?php echo $this->Form->button(__('Submit'), ['class'=>'btn btn-primary my-4']); ?>
  <?php echo $this->Form->end(); ?>
</div>
