<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>

<h1>Create Task</h1>

<div class="task task-create form col-lg-9">
    <?php
        echo $this->Form->create($task, ['templates' => [
          'label' => '<label class="col-sm-3  control-label" {{attrs}}>{{text}}</label>',
          'inputContainer' => '<div class="col-sm-10 form-group" form-type="{{type}}">{{content}}</div>',
          'input' => '<input class="form-control" type="{{type}}" name="{{name}}" {{attrs}} />',
          'select' => '<select class="form-control" name="{{name}}"{{attrs}}>{{content}}</select>',
          'textarea' => '<textarea class="form-control" name="{{name}}"{{attrs}}>{{value}}</textarea>',
        ]]);

        echo $this->Form->input('name');
        echo $this->Form->control('description', ['rows' => '3']);
        echo $this->Form->label('Task Status');
        echo $this->Form->select('status', ['Not Started' => 'Not Started', 'In Progress' => 'In Progress', 'Completed' => 'Completed']);
        echo $this->Form->label('Assigned User');
        echo $this->Form->select('user_id', $users, ['empty' => '- Choose Assigned User -']);
        echo $this->Form->button(__('Create'),['class'=>'btn btn-success my-4']);
        echo $this->Form->end();
    ?>
</div>
