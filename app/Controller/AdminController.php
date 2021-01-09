<?php namespace App\Controller;

use App\Helper\Validation;
use App\model\DB;
use Plasticbrain\FlashMessages\FlashMessages;

class AdminController
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



    public function show()
    {
        admin();
        DB::$tableName = 'user';
        $users = DB::select()->get();

        view('list', compact('users'));
    }

    public function deleteUser($id)
    {
        $delete = new DB();
        $delete::$tableName = 'user';

        if ($delete->delete($id)) {
            redirect('/');
        };
    }

    public function showLogin()
    {
        return view('login');
    }

    public function LoginAdmin()
    {
        $validation = new Validation();
        $msg = new FlashMessages();
        $rule = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        if ($validation->make($rule, request()->all())) {
            $admin = new DB();
            $admin::$tableName = 'users';
            $user = $admin::select()->where('email', '=', request('email'))->get();
            if (!empty($user)) {
                if ($user[0]['password'] === request('password')) {
                    if ($user[0]['status'] == 'admin'){
                        $_SESSION['admin'] = $user[0]['username'];
                        redirect('/doshbord');
                    }else{
                        $msg->error('سطح دسترسی شما محدود میباشد');
                        redirect('/admin');

                    }

                }else{
                    $msg->error('اطلاعات وارد شده اشتباه میباشد');
                    redirect('/admin');
                }
            } else {

                $msg->error('اطلاعات وارد شده اشتباه میباشد');
                redirect('/admin');
            }
        } else {
            foreach ($validation->getErrors() as $error) {
                $msg->error($error);
            }
            redirect('/admin');
        }

    }

    public function logout()
    {
        session_destroy();
        redirect('/admin');
    }

}
