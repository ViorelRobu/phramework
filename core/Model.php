<?php

namespace Phramework\Core;

use Phramework\Core\Database\QueryBuilder;
use ReflectionClass;

class Model extends QueryBuilder
{
    
    protected $table = 'users';

    /**
     * Get all the data from a table
     * 
     * @return PDO
     */
    public static function all()
    {
        $self = new static;
        return $self->get($self->table);
    }

    /**
     * Get the selected fields from the table
     * 
     * @param array $fields
     * @return PDO
     */
    public static function fetch(array $fields)
    {
        $self = new static;
        return $self->get($self->table, implode(',', $fields));
    }


}