<?php
// src/Model/Entity/Task.php
namespace App\Model\Entity;

use Cake\Collection\Collection;
use Cake\ORM\Entity;

class Task extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
