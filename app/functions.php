<?php


function view($view, array $param = [])
{
    if (file_exists(__DIR__ . "/../views/" . $view . ".php")) {
        extract($param, EXTR_SKIP);
        require __DIR__ . "/../views/" . $view . ".php";

    }
}

function request($field = null)
{
    $request = new \App\Helper\Request();

    if ($field)
        return $request->input($field);

    return $request;
}


function keys($keyName)
{
    $result = '';
    switch ($keyName) {
        case 'name':
            $result = 'نام';
            break;
        case 'email':
            $result = 'ایمیل';
            break;
        case 'tel':
            $result = 'تلفن';
            break;
        case 'location':
            $result = 'آدرس';
            break;
        case 'password':
            $result = 'پسوورد';
            break;
        case 'price':
            $result = 'قیمت';
            break;
            case 'img':
            $result = 'عکس';
            break;
            case 'bookfile':
            $result = 'فایل ';
            break;
            case 'text':
            $result = 'توضیحات';
            break;
        case 'lastname':
            $result = 'نام خانوادگی';
            break;
            case 'username';
            $result = 'نام کاریری';
            break;
        case 'confirm_password':
            $result = 'تکرار پسوورد';
            break;

    }
    return $result;
}

function admin()
{
    if (!isset($_SESSION['admin'])) {
        return redirect('/admin');

    } else {
        return true;
    }
}

function redirect($url, $message = [])
{
    extract($message, EXTR_SKIP);
    header('Location:' . $url);
}

function flashError()
{
    return new \Plasticbrain\FlashMessages\FlashMessages();
}

function fl($file = null)
{
    if ($file)
    return isset($_FILES[$file]) ? $_FILES[$file] : null;

    return $_FILES;
}