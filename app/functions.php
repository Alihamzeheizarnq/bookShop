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
    }
    return $result;
}


function redirect($url,$message = []){
    extract($message,EXTR_SKIP);
    header('Location:'.$url);
}
function flashError(){
    return new \Plasticbrain\FlashMessages\FlashMessages();
}