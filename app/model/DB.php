<?php


namespace App\model;


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
        $stmt = self::$pdo->prepare("DELETE FROM ".self::$tableName . " WHERE id={$id}");
        return $stmt->execute();
    }

    public function update()
    {

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
}