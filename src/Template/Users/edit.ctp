<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-9 medium-8 columns content">
    <?php echo $this->Form->create($user); ?>
    <fieldset>
        <legend><?php echo __('Edit User'); ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('password');
        ?>
    </fieldset>
    <?php echo $this->Form->button(__('Submit')); ?>
    <?php echo $this->Form->end(); ?>
</div>
