<?php

/* src/View/Helper/UserHelper.php */
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry;

class UserHelper extends Helper
{

    /**
     * getUsername method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function getUsername($id = null)
    {
        if (!$id) {
          return false;
        }
        $this->Users = TableRegistry::get('Users');
        $user = $this->Users->get($id);

        return $user->username;
    }
}
