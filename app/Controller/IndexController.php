<?php namespace App\Controller;

use App\Helper\Validation;
use App\model\DB;
use Plasticbrain\FlashMessages\FlashMessages;

class IndexController
{
    public function show()
    {
        $db = new DB();
        $db::$tableName = 'books';
        $books = $db::select()->get();
        return view('index', compact('books'));
    }

    public function register()
    {
        if (isset($_SESSION['user_id']))
            return redirect('/panel/user');
        return view('registerusers');
    }

    public function login()
    {
        if (isset($_SESSION['user_id']))
            return redirect('/panel/user');
        return view('loginusers');
    }

    public function auth()
    {
        $db = new DB();
        $db::$tableName = 'users';
        $msg = new FlashMessages();
        $validate = new Validation();

        $rule = [
            'name' => 'required',
            'lastname' => 'required',
            'tel' => 'required|tel',
            'username' => 'required|unique',
            'password' => 'required|max:12|min:5',
            'confirm_password' => 'required|confirm_password:password'
        ];
        $validate->make($rule, request()->all());

        if ($validate->getErrors()) {
            foreach ($validate->getErrors() as $error) {
                $msg->error($error);
            }
            return redirect('/register');
        }


        $res = $db->created([
            'name' => request('name'),
            'lastname' => request('lastname'),
            'tel' => request('tel'),
            'username' => request('username'),
            'password' => request('password'),
            'email' => request('email') ? request('email') : 'وارد نشده است'
            ]);
        if ($res){
            redirect('/Login-user');
        }

    }

    public function auth_login()
    {
        $msg = new FlashMessages();
        $db = new DB();
        $db::$tableName = 'users';
        $validate = new Validation();
        $rule = [
          'username' => 'required',
          'password' => 'required'
        ];

        $validate->make($rule,request()->all());
        if ($validate->getErrors()){
            foreach ($validate->getErrors() as $error){
                $msg->error($error);

            }
            return redirect('/Login-user');
        }
        $user = $db::select()->where('username','=',request('username'))->get();
        var_dump($user);
        if (empty($user)){
        $msg->error('اطلاعات وارد شده اشتباه است');
          return redirect('/Login-user');

        }
        if ($user){
            if ($user[0]['password'] === request('password')){
                $_SESSION['user_id'] = $user[0]['id'];
                redirect('/panel/user');

            }else{
                $msg->error('اطلاعات وارد شده اشتباه است');
                return redirect('/Login-user');


            }
        }

    }

    public function panelUser()
    {
        if (!isset($_SESSION['user_id'])){
           return redirect('/Login-user');
        }
        $db = new DB();
        $db::$tableName = 'users';


        $test = $db->innerUser($_SESSION['user_id']);

        $user = $db::select()->where('id','=',$_SESSION['user_id'])->get()[0];

        view('panelUser',compact('user','test'));

    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        return redirect('/');
    }

    public function books($id)
    {
        if (!isset($_SESSION['user_id']))
            return redirect('/register');



        $BOOK = new DB();
        $BOOK::$tableName = 'books';


        $book =$BOOK::select()->where('id','=',$id)->get();

        if (empty($book))
            return redirect('/');
        $db = new DB();
        $db::$tableName = 'buy';

        $status = $BOOK->query("SELECT book_id FROM buy WHERE user_id = {$_SESSION['user_id']} AND book_id={$id}");
        $users = $BOOK->query("SELECT * FROM users WHERE id = {$_SESSION['user_id']}");

        $etebar = $users[0]['etebar'];
        $total = $book[0]['price'] - $etebar;

        $BOOK->query("UPDATE users SET etebar={$total} WHERE id={$_SESSION['user_id']}");
        if ($etebar !== 0){
            if (!$status){
                $add = $db->created([
                    'user_id' => $_SESSION['user_id'],
                    'book_id' => $id,
                    'code' => rand(100000,100000000),
                    'total' => $book[0]['price']
                ]);

            }




    if ($add)
        return redirect('/panel/user');
}else{
    return redirect('/panel/user');

}





    }

}
