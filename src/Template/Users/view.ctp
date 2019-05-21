<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title"><?php echo h($user->username); ?></h5>
                    <p class="card-text">
                        <?php echo h($user->created); ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <?php foreach ($userTasks as $task): ?>
                <div class="card">
                    <h5 class="card-header"><?php echo h($task->status); ?></h5>
                    <div class="card-body">
                        <h5 class="card-title">Name: <?php echo h($task->name); ?></h5>
                        <p class="card-text">Description: <?php echo h($task->description); ?></p>
                        <?php echo $this->Html->link(__('View'), ['controller' => 'Tasks', 'action' => 'view', $task->id], ['class' => 'btn btn-primary']); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
