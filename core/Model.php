<?php

namespace Phramework\Core;

use Phramework\Core\Database\QueryBuilder;
use ReflectionClass;

class Model extends QueryBuilder
{
    protected $table;

    /**
     * Get all the data from a table
     * 
     * @return StdClass instance with table data
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
     * @return StdClass intance with table data
     */
    public static function fetch(array $fields)
    {
        $self = new static;
        return $self->get($self->table, implode(',', $fields));
    }


}