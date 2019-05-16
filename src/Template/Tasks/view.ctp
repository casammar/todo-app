<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>

<div class="users view col-lg-9 columns content">
    <h3>Task ID:<?= h($task->id) ?></h3>
    <table class="table table-bordered">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($task->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($task->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($task->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= $task->created->format(DATE_RFC850)?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($task->modified) ?></td>
        </tr>
    </table>
    <p><?= $this->Html->link(__('Edit'), ['controller' => 'Tasks', 'action' => 'edit', $task->id], ['class' => 'btn btn-primary']) ?></p>
</div>
