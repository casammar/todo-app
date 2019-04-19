<?php
// src/Model/Table/TasksTable.php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

class TasksTable extends Table
{

  /**
   * Initialize method
   *
   * @param array $config The configuration for the Table.
   * @return void
   */
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
