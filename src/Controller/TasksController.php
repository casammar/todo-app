<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         3.3.4
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\TasksTable $Tasks
 *
 * @method \App\Model\Entity\Task[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TasksController extends AppController
{
    public $paginate = [
        'limit' => 10
    ];

    /**
     * Initialize method
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->set('title', 'Tasks');
        $tasks = $this->Tasks->find('all')->order(['Tasks.modified' => 'DESC']);
        $taskCount = $this->getCount();
        $tasks = $this->paginate($tasks);
        $this->set(['taskCount' => $taskCount]);
        $this->set(compact('tasks'));
    }

    /**
     * View method
     *
     * @param  string|null $id Task id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $task = $this->Tasks->findById($id)->firstOrFail();
        $this->set(compact('task'));
    }

    /**
     * Create method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
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

    /**
     * Edit method
     *
     * @param  string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
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


    /**
     * Delete method
     *
     * @param  string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // Allow delete method
        $this->request->allowMethod(['post', 'delete']);

        $task = $this->Tasks->findById($id)->firstOrFail();
        if ($this->Tasks->delete($task)) {
            $this->Flash->success(__('The {0} task has been deleted.', $task->name));
        } else {
            $this->Flash->error(__('The task could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Search method
     * @param  string|null $query search text
     * @return \Cake\Http\RequestHandler|json
     */
    public function search($keyword = null)
    {
        $this->request->allowMethod('ajax');

        $keyword = $this->request->getQuery('keyword');

        $query = $this->Tasks->find('all', [
            'conditions' =>  [
                 'OR' => [
                     ['Tasks.name LIKE' => "%".$keyword."%"],
                     ['Tasks.description LIKE' => "%".$keyword."%"],
                 ]
            ]

            // also search through users strings
        ]);

        $this->set('tasks', $this->paginate($query));
        $this->set('_serialize', ['tasks']);
        $this->layout = 'ajax';
        $this->render('/Element/search');
    }

    /**
     * Search Status method
     * @param  string|null $query search text
     * @return \Cake\Http\RequestHandler|json
     */
    public function searchByStatus($status = null)
    {
        $this->request->allowMethod('ajax');

        // Get & Normalize Status
        $status = $this->request->getQuery('status');
        $status = str_replace ("-", " ", $status);
        $status = ucwords($status);

        if ($status === 'All') {
          $query = $this->Tasks->find();
        } else {
          $query = $this->Tasks->find();
          $query->where(['Tasks.status' => $status]);
        }

        $query->order(['modified' => 'DESC']);

        $this->set('tasks', $this->paginate($query));
        $this->set('_serialize', ['tasks']);
        $this->layout = 'ajax';
        $this->render('/Element/search');
    }


    /**
     * getCount method find total counts for each task statuses
     *
     * @return \Cake\Http\Response|array
     */
    public function getCount()
    {
        $taskCount = array();

        $taskCount['all'] = $this->Tasks->find('all')->count();
        $taskCount['not_started'] = $this->Tasks->find('all')->where(['Tasks.status' => 'Not Started'])->count();
        $taskCount['in_progress'] = $this->Tasks->find('all')->where(['Tasks.status' => 'In Progress'])->count();
        $taskCount['completed'] = $this->Tasks->find('all')->where(['Tasks.status' => 'Completed'])->count();

        return $taskCount;
    }

}
