<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<div class="container">
  <div class="row">
    <h1><?php echo $title; ?></h1>
  </div>
  <div class="row">
    <div class="col-8">
      <p>
        <?php echo $this->Html->link(__('Create User'), ['controller' => 'Users', 'action' => 'create'], ['class' => 'btn btn-success']); ?>
      </p>
    </div>
  </div>
  <div class="row">
    <table class="table table-striped">
      <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('username'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td>
                    <?php echo $user->id; ?>
                </td>
                <td>
                    <?php echo $this->Html->link($user->username, ['action' => 'view', $user->id]); ?>
                </td>
                <td>
                    <?php echo h($user->created); ?>
                </td>
                <td>
                    <?php if ($authUser) { ?>
                        <?php echo $this->Html->link('Edit', ['action' => 'edit', $user->id]); ?>
                        |
                        <?php echo $this->Form->postLink(
                           'Delete',
                           ['action' => 'delete', $user->id],
                           ['confirm' => 'Are you sure?']);
                        ?>
                    <?php } ?>
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
