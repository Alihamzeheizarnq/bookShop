<?php


namespace App\Helper;


use App\model\DB;

class Validation
{
    public $errors = [];


    public function make($date, $request)
    {
        $validation = true;

        foreach ($date as $key => $rule) {
            $listRule = explode('|', $rule);
            foreach ($listRule as $item) {
                $parametr = strpos($item, ':');

                if ($parametr !== false) {

                    $parametrs = substr($item, $parametr + 1);
                    $item = substr($item, 0, $parametr);

                } else {
                    $parametrs = "";


                }

                $method = ucfirst($item);
                $value = isset($request[$key]) ? $request[$key] : null;
                if (method_exists($this, $method)) {
                    if ($this->{$method}($value, $key, $parametrs) == false) {
                        $validation = false;
                        break;
                    }
                }

            }
        }
        return $validation;
    }

    public function required($value, $key)
    {
        if (strlen($value) == 0) {
            $name = keys($key);
            $this->errors[$key] = "فیلد {$name} نمیتواند خالی بماند";
            return false;
        }
        return true;
    }

    public function int($value, $key)
    {

        if (!filter_var($value, FILTER_VALIDATE_INT)) {
            $name = keys($key);
            $this->errors[$key] = "فیلد {$name} باید به صورت عددی وارد شود";
            return false;
        }
        return true;
    }

    public function tel($value, $key)
    {

        if (strlen($value) !== 11 && !is_int($value)) {
            $name = keys($key);
            $this->errors[$key] = "شماره تماس نامعتبر میباشد";
            return false;
        }
        return true;

    }

    public function unique($value, $key)
    {
        $db = new DB();
        $db::$tableName = 'users';

        $select = $db::select()->where('username', '=', $value)->get();
        if (!empty($select)) {
            $this->errors[$key] = "نام کاریری قبل ثبت شده است";
            return false;
        }
        return true;
    }

    public function min($value, $key, $param)
    {
       if (strlen($value) < $param) {

           $name = keys($key);
           $this->errors[$key] = "فیلد پسوورد نمیتواند کم تر از {$param} کاراکتر باشد";
           return false;
       }
           return true;

    }
    public function max($value, $key, $param)
    {
       if (strlen($value) > $param) {

           $name = keys($key);
           $this->errors[$key] = "فیلد پسوورد نمیتواند بیشتر از {$param} کاراکتر باشد";
           return false;
       }
           return true;

    }

    public function confirm_password($value,$key,$param)
    {
        $password = request($param);
        if ($password){
            if ($value !== $password){
                $this->errors[$key] = "تکرار پسوورد با پسوورد یکسان نیست";
                return false;
            }
            return true;
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }

}