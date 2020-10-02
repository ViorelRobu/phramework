<?php

namespace Phramework\Core\Database;

use PDOException;
use Phramework\App\Kernel;

class Builder 
{
    /**
     * Creates a table inside the database
     *
     * @param string $table
     * @param array $fields
     * @param $connection
     * @return void
     */
    public static function create(string $table, array $fields, $connection)
    {   
        try {
            $columns = implode(',', $fields);

            $sql = "CREATE TABLE {$table} (
                {$columns}
                )";
            $connection->exec($sql);

            return true;
        } catch (PDOException $e) {
            return false;

        }
    }

    /**
     * Deletes a table inside the database
     *
     * @param string $table
     * @param $connection
     * @return void
     */
    public static function destroy(string $table, $connection)
    {
        try {
            $sql = "DROP TABLE {$table}";
    
            $connection->exec($sql);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Alter table and add column
     *
     * @param string $table
     * @param string $options
     * @param [type] $connection
     * @return void
     */
    public static function addColumn(string $table, string $options, $connection)
    {
        try {
            $sql = "ALTER TABLE {$table} ADD {$options}";

            $connection->exec($sql);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Alter table and add column
     *
     * @param string $table
     * @param string $options
     * @param [type] $connection
     * @return void
     */
    public static function dropColumn(string $table, string $column, $connection)
    {
        try {
            $sql = "ALTER TABLE {$table} DROP COLUMN {$column}";

            $connection->exec($sql);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
