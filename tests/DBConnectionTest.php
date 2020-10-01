<?php

use PHPUnit\Framework\TestCase;
use Phramework\Core\Database\DatabaseConnection;

class DBConnectionTest extends TestCase 
{
    /** @test */
    public function configuration_exists_and_is_not_null()
    {
        $this->assertNotNull(DB_HOST);
        $this->assertNotNull(DB_NAME);
        $this->assertNotNull(DB_USER);
        $this->assertNotNull(DB_PASS);
    }
    
    /** @test */
    public function app_can_connect_to_database()
    {
        $db = DatabaseConnection::connect('sqlite::memory:');
        $this->assertInstanceOf(PDO::class, $db);
    }
}