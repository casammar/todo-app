<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>

<h1>Tasks</h1>
<p><?= $this->Html->link(__('Create Task'), ['action' => 'create']) ?></p>
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
                <?= $this->User->getUsername($task->user_id) ?>
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
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>
        
