<?php
// src/Controller/TasksController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Client;

class TasksController extends AppController
{
    public $paginate = [
        'limit' => 10
    ];

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
    }

    public function index()
    {
        $tasks = $this->paginate($this->Tasks->find('all', [
            'order' => ['Tasks.modified' => 'DESC']
        ]));

        $this->set(compact('tasks'));
    }

    public function view($id)
    {
        $task = $this->Tasks->findById($id)->firstOrFail();
        $this->set(compact('task'));
    }

    public function create()
    {
        $users = array();
        $allUsers = $this->Tasks->Users->find('all');
        foreach ($allUsers as $key => $value) {
            $users[] = ['text' => $value['username'], 'value' => $value['id']];
        }

        $task = $this->Tasks->newEntity();
        if ($this->request->is('post')) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());

            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('Your task has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your task.'));
        }

        $this->set(['task' => $task, 'users' => $users]);
    }

    public function edit($id)
    {
        $users = array();
        $allUsers = $this->Tasks->Users->find('all');
        foreach ($allUsers as $key => $value) {
            $users[] = ['text' => $value['username'], 'value' => $value['id']];
        }

        $task = $this->Tasks
            ->findById($id)
            ->firstOrFail();
        if ($this->request->is(['post', 'put'])) {
            $this->Tasks->patchEntity($task, $this->request->getData());
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('Your task has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your task.'));
        }
        $this->set(['task' => $task, 'users' => $users]);
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
