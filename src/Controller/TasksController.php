<?php
// src/Controller/TasksController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Client;

class TasksController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
    }

    public function index()
    {
        $tasks = $this->Paginator->paginate($this->Tasks->find());
        $this->set(compact('tasks'));
    }

    public function view($id)
    {
        $task = $this->Tasks->findById($id)->firstOrFail();
        $this->set(compact('task'));
    }

    public function create()
    {
        $task = $this->Tasks->newEntity();
        if ($this->request->is('post')) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());
            // Get userId of logged in user
            $task->user_id = $this->Auth->user('id');

            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('Your task has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your task.'));
        }

        $this->set(['task' => $task]);
    }

    public function edit($id)
    {
        $task = $this->Tasks
            ->findById($id)
            ->firstOrFail();
        if ($this->request->is(['post', 'put'])) {
            $this->Tasks->patchEntity($task, $this->request->getData(), [
                // Disable modification of user_id.
                'accessibleFields' => ['user_id' => false]
            ]);
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('Your task has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your task.'));
        }
        $this->set('task', $task);
    }

    public function delete($id)
    {
        // Allow delete method
        $this->request->allowMethod(['post', 'delete']);

        $task = $this->Tasks->findById($id)->firstOrFail();
        if ($this->Tasks->delete($task)) {
            $this->Flash->success(__('The {0} task has been deleted.', $task->name));
            return $this->redirect(['action' => 'index']);
        }
    }

}
