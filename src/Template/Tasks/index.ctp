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
            <div class="btn-group" id="btnTaskStatus" role="group" aria-label="Search by task status">
                <button type="button" class="btn btn-primary" value="all">All <span class="badge"><?php echo $taskCount['all'] ?></span></button>
                <button type="button" class="btn btn-danger" value="not-started">Not Started <span class="badge"><?php echo $taskCount['not_started'] ?></span></button>
                <button type="button" class="btn btn-warning" value="in-progress">In Progress <span class="badge"><?php echo $taskCount['in_progress'] ?></span></button>
                <button type="button" class="btn btn-success" value="completed">Completed <span class="badge"><?php echo $taskCount['completed'] ?></span></button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
          <div class="input-group input-group-lg my-4">
              <input type="text" class="form-control" name="search" aria-label="Search Tasks" placeholder="Search Tasks" autocomplete="off">
          </div>
        </div>
    </div>
    <div class="row task-table-container">
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
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php echo $this->Paginator->prev('< ' . __('previous')); ?>
                <?php echo $this->Paginator->numbers(); ?>
                <?php echo $this->Paginator->next(__('next') . ' >'); ?>
            </ul>
            <p><?php echo $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]); ?></p>
        </nav>
    </div>
    <div class="row search-results-table-container">
    </div>
</div>
