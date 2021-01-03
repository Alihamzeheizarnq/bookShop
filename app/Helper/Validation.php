<?php


namespace App\Helper;


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
                    $parametr = $parametr ? $parametr : '';
                    $item = substr($item, 0, $parametr);
                } else {
                    $parametr = "";
                }
                $method = ucfirst($item);
                $value = $request[$key] ? $request[$key] : null;
                if (method_exists($this, $method)) {
                    if ($this->{$method}($value, $key, $parametr) == false) {
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

    public function getErrors()
    {
        return $this->errors;
    }

}