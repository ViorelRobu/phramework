<?php

namespace Phramework\Core\Database;

use PDOException;
use PDO;
use Phramework\App\Kernel;

abstract class QueryBuilder
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
    public function __construct()
    {
        $this->pdo = Kernel::get('connection');
        if ($this->table == null) {
            $reflection = new \ReflectionClass($this);
            $this->table = strtolower($reflection->getShortName() . 's');
        }
    }

    /**
     * Insert data into the table
     *
     * @param array $values
     */
    public function insert(array $values)
    {
        $fields = $this->getColumns();
        unset($fields[0]);
        $placeholders = [];
        foreach($fields as $field) {
            $placeholders[] = '?';
        }
        $fields = implode(', ', $fields);
        $placeholders = implode(', ', $placeholders);

        try {
            $sql = "INSERT INTO " .  $this->table . " (" . $fields . ") VALUES (" . $placeholders . ")";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($values);
            return $stmt->rowCount();
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
        }
    }
    /**
     * Fetch data from the table
     * 
     * @param string $table
     * @param null $conditions
     * @param string $fields
     * 
     * @return array of StdClass Object
     */
    public function get($table, $fields = '*', $conditions = null)
    {
        try {
            $sql = $this->pdo->prepare("SELECT {$fields} FROM {$table} {$conditions}");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_CLASS);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /**
     * @return mixed
     */
    public function getColumns()
    {
        try {
            $sql = $this->pdo->prepare('DESCRIBE ' . $this->table);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_COLUMN);
        } catch (PDPException $exception) {
            echo "Error: " . $exception->getMessage();
        }
    }

    /**
     * Update data from the table
     *
     * @param array $conditions
     * @param array $fields
     */
    protected function update($conditions = [], $fields = [])
    {
        //
    }
    /**
     * Delete data from the table
     *
     * @param array $conditions
     */
    protected function delete(array $conditions)
    {
        //
    }
}