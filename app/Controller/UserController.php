<?php namespace App\Controller;

use App\Helper\Validation;
use App\model\DB;
use Plasticbrain\FlashMessages\FlashMessages;

class UserController
{
    /**
     *
     */
    public function index()
    {
        view('home');
    }

    /**
     *
     */

    public function add()
    {
        $validate = new Validation();
        $roule = [
            'name' => 'required',
            'email' => 'required|unic|email',
            'tel' => 'required|int|min:11|max:11',
            'location' => 'required'
        ];


        if ($validate->make($roule, request()->all()) == false) {
            $msg = new FlashMessages();

            foreach ($validate->getErrors() as $error) {
                $msg->error($error);
            }
            return redirect('/addUser');

        }
        $db = new DB();
        $db::$tableName = 'user';
        $result = $db->created([
            'name' => request('name'),
            'email' => request('email'),
            'tel' => request('tel'),
            'location' => request('location')
        ]);
        if ($result){
            redirect('/');
        }

    }

    public function show()
    {
        DB::$tableName = 'user';
        $users = DB::select()->get();

        view('list',compact('users'));
    }

    public function deleteUser($id)
    {
    $delete = new DB();
    $delete::$tableName = 'user';

    if ($delete->delete($id)){
        redirect('/');
    };
    }

}
