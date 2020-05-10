<?php

use Phramework\App\Kernel;
use PHPUnit\Framework\TestCase;
use Phramework\Core\Configuration\GetConfig;
use Phramework\Core\Database\DatabaseConnection;

require __DIR__ . '/../config/helpers.php';
require __DIR__ . '/../vendor/autoload.php';

$template = [
    '__@' => '<?php',
    '@__' => '?>'
];

Kernel::bind('config', new GetConfig());
Kernel::bind('connection', DatabaseConnection::connect(env('DB_HOST'), env('DB_NAME'), env('DB_USER'), env('DB_PASS')));
Kernel::bind('template', $template);

class DBConnectionTest extends TestCase 
{
    /** @test */
    public function configuration_exists_and_is_not_null()
    {
        $this->assertNotNull(env('DB_HOST'));
        $this->assertNotNull(env('DB_NAME'));
        $this->assertNotNull(env('DB_USER'));
        $this->assertNotNull(env('DB_PASS'));
    }
    
    /** @test */
    public function app_can_connect_to_database()
    {
        $db = DatabaseConnection::connect(env('DB_HOST'), env('DB_NAME'), env('DB_USER'), env('DB_PASS'));
        $this->assertInstanceOf(PDO::class, $db);
    }
}