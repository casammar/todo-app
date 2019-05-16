<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<div class="container">
  <div class="row">
    <h1><?= $title ?></h1>
  </div>
  <div class="row">
    <div class="col-8">
      <p>
        <?= $this->Html->link(__('Create User'), ['controller' => 'Users', 'action' => 'create'], ['class' => 'btn btn-success']) ?>
      </p>
    </div>
  </div>
  <div class="row">
    <table class="table table-striped">
      <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('username') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td>
                    <?= $user->id ?>
                </td>
                <td>
                    <?= $this->Html->link($user->username, ['action' => 'view', $user->id]) ?>
                </td>
                <td>
                    <?= h($user->created) ?>
                </td>
                <td>
                   <?= $this->Html->link('Edit', ['action' => 'edit', $user->id]) ?>
                   |
                   <?= $this->Form->postLink(
                       'Delete',
                       ['action' => 'delete', $user->id],
                       ['confirm' => 'Are you sure?'])
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
          <?= $this->Paginator->prev('< ' . __('previous')) ?>
          <?= $this->Paginator->numbers() ?>
          <?= $this->Paginator->next(__('next') . ' >') ?>
      </ul>
      <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </nav>
  </div>
</div>
