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
    <div class="col-8">
      <p>
        <?php echo $this->Html->link(__('Create Task'), ['controller' => 'Tasks', 'action' => 'create'], ['class' => 'btn btn-success']); ?>
      </p>
    </div>
    <div class="col-4">
      <?php
        echo $this->Form->create();
        echo $this->Form->label('Filer By Task Status');
        echo $this->Form->select('status', ['Not Started' => 'Not Started', 'In Progress' => 'In Progress', 'Completed' => 'Completed'], ['empty' => '- All -'], ['class'=>'form-inline']);
        echo $this->Form->button(__('Submit'),['class'=>'btn btn-primary']);
        echo $this->Form->end();
      ?>
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
