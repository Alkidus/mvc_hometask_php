<?php

namespace Core\Helpers;

use PDO;

class Db
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=lesson1_db', 'root', '');
    }
    public function query(string $sql, array $params = [], string $class = 'StdClass')
    {
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute($params);
        return $result == false ? null : $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }
}
