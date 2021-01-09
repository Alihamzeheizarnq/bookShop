<?php namespace App\Controller;

use App\Helper\Validation;
use App\model\DB;
use Plasticbrain\FlashMessages\FlashMessages;

class UserController
{
    public function listUser()
    {
        $users = new DB();
        $users::$tableName = 'users';

        $users = $users::select()->get();
        return view('userList', compact('users'));
    }

    public function deleteUser($id)
    {
        $users = new DB();
        $users::$tableName = 'users';
        $users->delete($id);
        redirect('/users-list');

    }


}
