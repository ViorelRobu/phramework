<?php

namespace Phramework\Core\Database;

use PDOException;
use PDO;
use Phramework\App\Kernel;

class QueryBuilder
{
    protected $pdo;

    /** 
     * Assign the PDO instance from the dependendecy container to the $pdo attibute
     */
    protected function __construct()
    {
        $this->pdo = Kernel::get('connection');;
    }

    /**
     * Insert data into the table
     */
    protected function insert($table, $conditions = null, $fields = null)
    {
        //
    }
    /**
     * Fetch data from the table
     * 
     * @param $table
     * @param $conditions
     * @param $fields
     * 
     * @return array of StdClass Object
     */
    protected function get($table, $fields = '*', $conditions = null)
    {
        try {
            $sql = $this->pdo->prepare("SELECT {$fields} FROM {$table} {$conditions}");
            $sql->execute();
            return $data = $sql->fetchAll(PDO::FETCH_CLASS);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    /**
     * Update data from the table
     */
    protected function update($table, $conditions = null, $fields = null)
    {
        //
    }
    /**
     * Delete data from the table
     */
    protected function delete($table, $conditions = null, $fields = null)
    {
        //
    }
}