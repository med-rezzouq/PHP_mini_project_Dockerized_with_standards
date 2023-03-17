<?php

namespace App\Service;

use PDOException;

final class DatabaseConnection
{
    private static $instance;

    private const HOST = 'host.docker.internal:3306';
    private const DB = 'php_upgrade';
    private const USER = 'php';
    private const PASSWORD = 'php';

    public static function getInstance()
    {
        if (static::$instance === null) {
            try {
                $pdo = new \PDO(
                    "mysql:host=".self::HOST.";port=3306;dbname=".self::DB.";charset=UTF8",
                    self::USER,
                    self::PASSWORD
                );
                if ($pdo) {
                    static::$instance = $pdo;
                }
            } catch (\PDOException $e) {
                $fp = fopen('app.log', 'a');
                fwrite($fp, __CLASS__.' : Cannot connect to database ! '. PHP_EOL);
                throw new PDOException('Cannot establish mysql connection');
            }
        }

        return static::$instance;
    }


    private function __clone()
    {
    }
}
