<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>

<div class="users view col-lg-9 columns content">
    <h3>Task ID:<?php echo h($task->id); ?></h3>
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
            <td><?php echo $task->created->format(DATE_RFC850); ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Modified'); ?></th>
            <td><?php echo h($task->modified); ?></td>
        </tr>
    </table>
    <p><?php echo $this->Html->link(__('Edit'), ['controller' => 'Tasks', 'action' => 'edit', $task->id], ['class' => 'btn btn-primary']); ?></p>
</div>
