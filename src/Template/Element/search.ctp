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
  <tfoot>
  <tr>
    <td colspan="5"><?php echo count($tasks); ?> Total Results</td>
  </tr>
</tfoot>
</table>
