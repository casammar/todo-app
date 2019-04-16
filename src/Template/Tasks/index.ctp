<!-- File: src/Template/Tasks/index.ctp -->

<h1>Tasks</h1>
<p><?= $this->Html->link(__('Add Task'), ['action' => 'add']) ?></p>
<table>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Status</th>
        <th>Username</th>
        <th>Action</th>
    </tr>
<!-- Loop through $tasks object, print info for: name, description, status, username, edit/delete action links -->
    <?php foreach ($tasks as $task): ?>
        <tr>
            <td>
                <?= $this->Html->link($task->name, ['action' => 'view', $task->id]) ?>
            </td>
            <td>
                <?= h($task->description) ?>
            </td>
            <td>
                <?= h($task->status) ?>
            </td>
            <td>
                <?= $task->user_id ?>
            </td>
            <td>
               <?= $this->Html->link('Edit', ['action' => 'edit', $task->id]) ?>
               |
               <?= $this->Form->postLink(
                   'Delete',
                   ['action' => 'delete', $task->id],
                   ['confirm' => 'Are you sure?'])
               ?>
           </td>
        </tr>
    <?php endforeach; ?>
</table>
