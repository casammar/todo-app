<!-- File: src/Template/Tasks/add.ctp -->

<h1>Add Task</h1>
<?php
    echo $this->Form->create($task);
    echo $this->Form->control('name');
    echo $this->Form->control('description', ['rows' => '3']);
    echo $this->Form->control('status', ['type' => 'text']);
    echo $this->Form->button(__('Submit'));
    echo $this->Form->end();
?>
