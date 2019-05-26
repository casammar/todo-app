<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>

<div class="users view col-lg-9 columns content">
    <h1><?php echo $title; ?></h1>
    <table class="table table-bordered">
        <tr>
            <th scope="row"><?php echo __('Id'); ?></th>
            <td><?php echo $this->Number->format($task->id); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Name'); ?></th>
            <td><?php echo h($task->name); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Description'); ?></th>
            <td><?php echo h($task->description); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Created'); ?></th>
            <td><?php echo h($task->created); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Modified'); ?></th>
            <td><?php echo h($task->modified); ?></td>
        </tr>
    </table>
    <p>
      <?php echo $this->Html->link(__('Edit'), ['controller' => 'Tasks', 'action' => 'edit', $task->id], ['class' => 'btn btn-primary']); ?>
      <?php echo $this->Html->link(__('Send Email Reminder'), ['controller' => 'Tasks', 'action' => 'emailReminder', $task->id], ['class' => 'btn btn-warning']); ?>
    </p>
</div>
