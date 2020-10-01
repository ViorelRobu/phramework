<?php

namespace Phramework\Core\Database;

use PDO;
use PDOException;

class DatabaseConnection 
{
    public static function connect($driver, array $config = [])
    {
        try {
            if ($driver == 'mysql') {
                return new PDO(
                    "mysql:host={$config['host']};dbname={$config['db']}",
                    $config['user'], 
                    $config['password'],
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                );
            }
            if ($driver == 'sqlite::memory:') {
                return new PDO(
                    'sqlite::memory:',
                    null,
                    null,
                    array(PDO::ATTR_PERSISTENT => true)
                );
            }
        } catch (PDOException $e) {
            echo 'Connection failed! ' . $e->getMessage();
        }
    }
}