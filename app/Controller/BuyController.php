<?php namespace App\Controller;

use App\Helper\Validation;
use App\model\DB;
use Plasticbrain\FlashMessages\FlashMessages;

class BuyController
{
    public function __construct()
    {
        return admin();
    }
    public function show()
    {
        $db = new DB();
        $db::$tableName = 'buy';

        $buys = $db->inner();
        return view('buyList', compact('buys'));
    }

}

