<?php namespace App\Controller;

use App\Helper\Validation;
use App\model\DB;
use Carbon\Exceptions\BadFluentSetterException;
use Plasticbrain\FlashMessages\FlashMessages;

class BookController
{
    public function __construct()
    {
        return admin();
    }

    public function listBook()
    {
        $books = new DB();
        $books::$tableName = 'books';

        $books = $books::select()->get();
        return view('bookList', compact('books'));
    }

    public function deleteBook($id)
    {
        $books = new DB();

        $books::$tableName = 'books';

        $fetch = $books::select()->where('id', '=', $id)->get()[0];

        $ImgName = __DIR__ . "/../../public/Bookimg/" . $fetch['img'];
        $FileName = __DIR__ . "/../../public/Bookimg/" . $fetch['bookfile'];

        if (file_exists($ImgName) || file_exists($FileName)) {
            unlink($ImgName);

            unlink($FileName);
        };


        $books->delete($id);
        redirect('/lists-book');

    }

    public function addBook()
    {
        return view('addBook');
    }

    public function creatBook()
    {
        $db = new DB();
        $db::$tableName = 'books';
        $request = new Validation();
        $rule = [
            'name' => 'required',
            'price' => 'required|int',
            'text' => 'required',

        ];
        $request->make($rule, request()->all());
        $error = $request->getErrors();


        if ($_FILES['img']['error'] == 4) {

            $bookfileError = ['img' => 'عکس کتاب نمیتواند خالی بماند'];
            array_push($error, $bookfileError['img']);
        }
        if ($_FILES['bookfile']['error'] == 4) {

            $bookfileError = ['bookfile' => 'فایل کتاب نمیتواند خالی بماند'];
            array_push($error, $bookfileError['bookfile']);
        }
        if ($_FILES['bookfile']['error'] !== 4) {
            if ($_FILES['bookfile']['type'] !== 'application/pdf') {
                $bookfileError = ['bookfile' => 'فرمت فایل کتاب باید pdf باشد'];
                array_push($error, $bookfileError['bookfile']);
            }
        }


        if ($error) {
            $msg = new FlashMessages();
            foreach ($error as $val) {
                $msg->error($val);
            }
            redirect('/add-book');
            return;
        };

        $img = fl('img');
        $bookfile = fl('bookfile');
        $imgname = time() . $img['name'];
        $bookfileName = time() . $bookfile['name'];
        $folder = __DIR__ . '/../../public/Bookimg/' . $imgname;
        $folder1 = __DIR__ . '/../../public/Bookimg/' . $bookfileName;
        move_uploaded_file($img['tmp_name'], $folder);
        move_uploaded_file($bookfile['tmp_name'], $folder1);

        $res = $db->created([
            'bookname' => request('name'),
            'img' => $imgname,
            'price' => request('price'),
            'bookfile' => $bookfileName,
            'text' => request('text')
        ]);
        var_dump($res);
        if ($res) {
            return redirect('lists-book');
        }

    }

    public function text($id)
    {
        $books = new DB();
        $books::$tableName = 'books';

        $books = $books::select()->where('id', '=', $id)->get()[0];

        return view('bookText', compact('books'));
    }

    public function showEdit($id)
    {
        $db = new DB();
        $db::$tableName = 'books';

        $book = $db::select()->where('id', '=', $id)->get()[0];

        return view('editBook', compact('book'));
    }

    public function UpdateBook($id)
    {
        $valid = new Validation();
        $db = new DB();
        $msg = new FlashMessages();
        $db::$tableName = 'books';

        $book = $db::select()->where('id', '=', $id)->get()[0];

        $img = null;
        $BookFile = null;

        $rule = [
            'name' => 'required',
            'price' => 'required|int',
            'text' => 'required',

        ];
        $valid->make($rule, request()->all());

        $error = $valid->getErrors();

        if (fl('img')['size'] == 0) {
            $img = $book['img'];
        } else {
            unlink(__DIR__ . "/../../public/Bookimg/" . $book['img']);

            $img = time() . fl('img')['name'];

            $folder = __DIR__ . "/../../public/Bookimg/" . $img;

            move_uploaded_file(fl('img')['tmp_name'], $folder);
        }
        if (fl('bookfile')['size'] == 0) {
            $BookFile = $book['img'];
        } else {

            if ($_FILES['bookfile']['error'] !== 4) {
                if ($_FILES['bookfile']['type'] !== 'application/pdf') {
                    $bookfileError = ['bookfile' => 'فرمت فایل کتاب باید pdf باشد'];
                    array_push($error, $bookfileError['bookfile']);
                    $BookFile = $book['bookfile'];
                } else {
                    unlink(__DIR__ . "/../../public/Bookimg/" . $book['bookfile']);
                    $BookFile = time() . fl('bookfile')['name'];

                    $folder = __DIR__ . "/../../public/Bookimg/" . $BookFile;

                    move_uploaded_file(fl('bookfile')['tmp_name'], $folder);
                }

            }
        }
        if ($error) {
            foreach ($error as $err) {
                $msg->error($err);
            }
            return redirect('/editBook/' . $book['id']);
        }


        $edit = DB::update([
            'bookname' => request('name'),
            'price' => request('price'),
            'bookfile' => $BookFile,
            'img' => $img,
            'text' => request('text')
        ], ['id' => $book['id']]);

        if ($edit){
            return redirect('/lists-book');
        }
    }
}
