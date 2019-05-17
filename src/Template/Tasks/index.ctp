<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>

<div class="container">
  <div class="row">
    <h1><?php echo $title; ?></h1>
  </div>
  <div class="row">
    <div class="col">
      <p>
        <?php echo $this->Html->link(__('Create Task'), ['controller' => 'Tasks', 'action' => 'create'], ['class' => 'btn btn-success']); ?>
      </p>
    </div>
    <div class="col">
      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-primary">All <span class="badge">27</span></button>
        <button type="button" class="btn btn-danger">Not Started <span class="badge">6</span></button>
        <button type="button" class="btn btn-warning">In Progress <span class="badge">12</span></button>
        <button type="button" class="btn btn-success">Completed <span class="badge">9</span></button>
      </div>
    </div>
  </div>
  <div class="row">
    <table class="table table-striped">
      <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Username</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td>
                    <?php echo $this->Html->link($task->name, ['action' => 'view', $task->id]); ?>
                </td>
                <td>
                    <?php echo h($task->description); ?>
                </td>
                <td>
                    <?php echo h($task->status); ?>
                </td>
                <td>
                    <?php echo $this->User->getUsername($task->user_id); ?>
                </td>
                <td>
                   <?php echo $this->Html->link('Edit', ['action' => 'edit', $task->id]); ?>
                   |
                   <?php echo $this->Form->postLink(
                       'Delete',
                       ['action' => 'delete', $task->id],
                       ['confirm' => 'Are you sure?']);
                   ?>
               </td>
            </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="row">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
          <?php echo $this->Paginator->prev('< ' . __('previous')); ?>
          <?php echo $this->Paginator->numbers(); ?>
          <?php echo $this->Paginator->next(__('next') . ' >'); ?>
      </ul>
      <p><?php echo $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]); ?></p>
    </nav>
  </div>
</div>
