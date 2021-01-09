<?php


namespace App\model;


use PDO;

class DB
{
    static public $pdo;
    static private $query;
    static public $tableName;

    public function __construct()
    {
        try {
            $config = require __DIR__ . "/../config.php";
            self::$pdo = new \PDO("mysql:host=localhost;dbname={$config['database']}", $config['username'], $config['password']);

        } catch (\PDOException $e) {
            echo "ERROR SERVER : " . $e->getMessage();
            die();
        }
    }

    static public function select($nameField = "*")
    {
        self::$query .= "SELECT {$nameField} FROM " . self::$tableName;
        return new static();
    }

    public function delete($id)
    {
        $stmt = self::$pdo->prepare("DELETE FROM " . self::$tableName . " WHERE id={$id}");
        return $stmt->execute();
    }

    public function update($date, $where)
    {
        $update = "";
        foreach ($date as $key => $item) {
            $update .= " " . $key . "='" . $item . "',";

        }
        $update = substr($update, 0, strlen($update) - 1);


        $stmt = self::$pdo->prepare("UPDATE " . self::$tableName . " SET " . $update . " WHERE " . array_keys($where)[0] . " = " . $where['id']);
        return $stmt->execute();
    }

    public function inner()
    {
        $stmt = self::$pdo->prepare("
        SELECT *
FROM ((buy
INNER JOIN users ON buy.user_id = users.id)
INNER JOIN books ON buy.book_id = books.id)
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function innerUser($user_id)
    {

        $stmt = self::$pdo->prepare("
                SELECT * FROM users LEFT OUTER JOIN buy ON users.id = buy.user_id AND buy.user_id = {$user_id} LEFT OUTER JOIN books ON buy.book_id = books.id WHERE buy.user_id = {$user_id}
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function where($field, $param, $request)
    {
        self::$query .= ' WHERE ' . $field . $param . "'" . $request . "'";
        return new static();
    }

    public function created(array $data)
    {
        $tbl = join(',', array_keys($data));
        $val = "'" . join("','", array_values($data)) . "'";
        $table = self::$tableName;
        $stmt = self::$pdo->prepare("INSERT INTO {$table} ({$tbl}) VALUES ({$val})");
        return $stmt->execute();

    }

    public function get()
    {
        $stm = self::$pdo->prepare(self::$query);
        $stm->execute();
        return $stm->fetchAll();
    }
    public function query($sql)
    {
        $stm = self::$pdo->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}