<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>

<h1>Edit Task</h1>

<?php
    echo $this->Form->create($task);
    echo $this->Form->control('name');
    echo $this->Form->control('description', ['rows' => '3']);
    echo $this->Form->label('Task Status');
    echo $this->Form->select('status', ['Not Started' => 'Not Started', 'In Progress' => 'In Progress', 'Completed' => 'Completed']);
    echo $this->Form->button(__('Submit'));
    echo $this->Form->end();
?>