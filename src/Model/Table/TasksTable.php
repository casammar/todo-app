<?php
// src/Model/Table/TasksTable.php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\Log\Log;

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
        parent::initialize($config);

        $this->setTable('tasks');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Users');
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

    public function afterSave($event, $entity, $options = array())
    {
        $event = new Event('Model.Task.afterSave', $entity, $options);
        $this->getEventManager()->dispatch($event);
    }
}
