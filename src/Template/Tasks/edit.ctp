<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */

$this->Form->setTemplates($form_templates['bootstrapFormElements']);
?>

<h1><?php echo $title; ?></h1>

<div class="task task-edit form col-lg-9">
    <?php
        echo $this->Form->create($task);
        echo $this->Form->control('name');
        echo $this->Form->control('description', ['rows' => '3']);
        echo $this->Form->label('Task Status');
        echo $this->Form->select('status', ['Not Started' => 'Not Started', 'In Progress' => 'In Progress', 'Completed' => 'Completed']);
        echo $this->Form->button(__('Submit'), ['class'=>'btn btn-primary my-4']);
        echo $this->Form->end();
    ?>
</div>
