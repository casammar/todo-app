<?php
namespace App\Event;

use Cake\Log\Log;
use Cake\Event\EventListenerInterface;

class TaskListener implements EventListenerInterface
{
    public function implementedEvents() {
        return array(
            'Model.Task.afterSave' => 'updateTaskLog',
        );
    }

    public function updateTaskLog($event, $entity, $options) {
        if ($event->subject->isNew()) {
            Log::write('info', 'A new task was created with id: ' . $event->subject['id']);
        } else {
            Log::write('info', 'A task was updated with id: ' . $event->subject['id']);
        }
    }
}
