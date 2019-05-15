<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>

<h1>Edit Task</h1>

<?php
    echo $this->Form->create($task, ['templates' => [
      'inputContainer' => '<div class="form-group row {{required}}" form-type="{{type}}">{{content}}</div>',
      'label' => '<label class="col-md-2 control-label" {{attrs}}>{{text}}</label>',
      'input' => '<div class="col-md-4"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>',
      'select' => '<div class="form-control col-md-4"><select name="{{name}}"{{attrs}}>{{content}}</select></div>',
      'error' => '<div class="error">{{content}}</div>'
    ]]);

    echo $this->Form->input('name');
    echo $this->Form->control('description', ['rows' => '3']);
    echo $this->Form->label('Task Status');
    echo $this->Form->select('status', ['Not Started' => 'Not Started', 'In Progress' => 'In Progress', 'Completed' => 'Completed']);
    echo $this->Form->button(__('Submit'),['class'=>'btn btn-primary']);
    echo $this->Form->end();
?>
