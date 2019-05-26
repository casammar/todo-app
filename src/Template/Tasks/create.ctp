<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */

$this->Form->templates($form_templates['bootstrapFormElements']);
?>

<h1><?php echo $title; ?></h1>

<div class="task task-create form col-lg-9">
    <?php
        echo $this->Form->create($task);
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
