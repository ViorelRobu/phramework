<?php


use PHPUnit\Framework\TestCase;
use Phramework\Core\Database\Builder;
use Phramework\Core\Database\DatabaseConnection;

class BuilderTest extends TestCase
{
    /** @test */
    public function can_create_tables()
    {
        $db = DatabaseConnection::connect('sqlite::memory:');

        $table = Builder::create('users', [
            'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY',
            'username varchar(255)',
            'password varchar(255)'
        ], $db);

        $this->assertTrue($table);
    }
    
    /** @test */
    public function can_destroy_tables()
    {
        $db = DatabaseConnection::connect('sqlite::memory:');

        $create = Builder::create('users', [
            'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY',
            'username varchar(255)',
            'password varchar(255)'
        ], $db);

        $delete = Builder::destroy('users', $db);

        $this->assertTrue($delete);
        
    }

    /** @test */
    public function can_add_column()
    {
        $db = DatabaseConnection::connect('sqlite::memory:');

        $create = Builder::create('users', [
            'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY',
            'username varchar(255)',
            'password varchar(255)'
        ], $db);

        $add = Builder::addColumn('users', 'validated boolean', $db);

        $this->assertTrue($add);
        
    }

    /** @test */
    public function can_delete_column()
    {
        $db = DatabaseConnection::connect('sqlite::memory:');

        $create = Builder::create('users', [
            'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY',
            'username varchar(255)',
            'password varchar(255)',
            'validated boolean'
        ], $db);

        $add = Builder::dropColumn('users', 'validated', $db);

        $this->assertTrue($add);
        
    }
}