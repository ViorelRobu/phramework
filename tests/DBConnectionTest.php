<?php

use Phramework\App\Kernel;
use PHPUnit\Framework\TestCase;
use Phramework\Core\Database\DatabaseConnection;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/helpers.php';

$template = [
    '__@' => '<?php',
    '@__' => '?>'
];

Kernel::bind('config', require __DIR__ . '/../config/config.test.php');
Kernel::bind('connection', DatabaseConnection::connect(DB_HOST, DB_NAME, DB_USER, DB_PASS));
Kernel::bind('template', $template);

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
        $db = DatabaseConnection::connect(DB_HOST, DB_NAME, DB_USER, DB_PASS);
        $this->assertInstanceOf(PDO::class, $db);
    }
}