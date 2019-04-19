<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>

<h1>Tasks</h1>

<p><?= $this->Html->link(__('Create Task'), ['action' => 'create']) ?></p>
<div class="large-3">
    <?php 
        echo $this->Form->create();
        echo $this->Form->label('Filer By Task Status');
        echo $this->Form->select('status', ['Not Started' => 'Not Started', 'In Progress' => 'In Progress', 'Completed' => 'Completed'], ['empty' => '- All -']);
        echo $this->Form->button(__('Submit'));
        echo $this->Form->end();
    ?>
</div>
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
                <?= h($task->name) ?>
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
        
