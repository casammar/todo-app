<?php
// src/Model/Table/TasksTable.php
namespace App\Model\Table;

use Cake\ORM\Query;
// the Text class
use Cake\ORM\Table;
// the Validator class
use Cake\Utility\Text;
use Cake\Validation\Validator;

class TasksTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

    public function beforeSave($event, $entity, $options)
    {
        // Fires before save
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmptyString('name', false)
            ->maxLength('name', 255)
            ->allowEmptyString('description', false)
            ->maxLength('description', 255)
            ->allowEmptyString('status', false)
            ->allowEmptyString('user_id', false);

        return $validator;
    }
}
