<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <?= h($task->status) ?>
        </div>
        <div class="card-body">
          <h5 class="card-title"><?= h($task->name) ?></h5>
          <p class="card-text"><?= h($task->description) ?></p>
          <p><small>Created: <?= $task->created->format(DATE_RFC850) ?></small></p>
          <p><?= $this->Html->link(__('Edit'), ['controller' => 'Tasks', 'action' => 'edit', $task->id], ['class' => 'btn btn-primary']) ?></p>
        </div>
      </div>
    </div>
  </div>
