<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="users view large-9 medium-8 columns content">
    <h3>User ID:<?php echo h($user->id); ?></h3>
    <table class="table table-bordered">
        <tr>
            <th scope="row"><?php echo __('Id'); ?></th>
            <td><?php echo $this->Number->format($user->id); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Username'); ?></th>
            <td><?php echo h($user->username); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Password'); ?></th>
            <td><?php echo h($user->password); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Created'); ?></th>
            <td><?php echo h($user->created); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Modified'); ?></th>
            <td><?php echo h($user->modified); ?></td>
        </tr>
    </table>
</div>
