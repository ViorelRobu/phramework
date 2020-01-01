<?php

namespace Phramework\Core\Database;

use PDOException;
use PDO;
use Phramework\App\Kernel;

class QueryBuilder
{
    /**
     * PDO instance
     */
    protected $pdo;

    /**
     * The table name associated with the model
     */
    protected $table = null;

    /** 
     * Assign the PDO instance from the dependendecy container to the $pdo attibute
     * and, if $table is null assign the strtolower class name
     */
    protected function __construct()
    {
        $this->pdo = Kernel::get('connection');
        if ($this->table == null) {
            $reflection = new \ReflectionClass($this);
            $this->table = strtolower($reflection->getShortName() . 's');
        }
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