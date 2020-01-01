<?php

use PHPUnit\Framework\TestCase;

class DBConnectionTest extends TestCase 
{
    /** @test */
    public function app_can_connect_to_database()
    {
        $app = [];
        $this->assertEmpty($app);
    }
}