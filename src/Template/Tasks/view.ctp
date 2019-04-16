<!-- File: src/Template/Tasks/view.ctp -->

<h1><?= h($task->name) ?></h1>
<p><?= h($task->description) ?></p>
<p><small>Created: <?= $task->created->format(DATE_RFC850) ?></small></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $task->id]) ?></p>
