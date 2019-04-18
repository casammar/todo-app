<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>

<h1>Create Task</h1>

<?php
    echo $this->Form->create($task);
    echo $this->Form->control('name');
    echo $this->Form->control('description', ['rows' => '3']);
    echo $this->Form->label('Task Status');
    echo $this->Form->select('status', ['Not Started' => 'Not Started', 'In Progress' => 'In Progress', 'Completed' => 'Completed'], ['empty' => '(choose one)']);
    echo $this->Form->label('Assign User');
    echo $this->Form->select('user_id', $users, ['empty' => '(choose one)']);
    echo $this->Form->button(__('Submit'));
    echo $this->Form->end();
?>