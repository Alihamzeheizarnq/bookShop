<?php


namespace App\Helper;


class Request
{

    public function input($field)
    {
        if ($this->isPost()) {
            return trim(htmlspecialchars($_POST[$field]));
        }
    }

    public function all()
    {
       return array_map('htmlspecialchars',$_POST);
    }


    public function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';

    }

}