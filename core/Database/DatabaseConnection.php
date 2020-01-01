<?php

namespace Phramework\Core\Database;

use PDO;
use PDOException;

class DatabaseConnection 
{
    public static function connect($host, $dbname, $user, $pass)
    {
        try {
            return new PDO(
                "mysql:host={$host};dbname={$dbname}",
                $user, 
                $pass,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {
            echo 'Connection failed! ' . $e->getMessage();
        }
    }
}