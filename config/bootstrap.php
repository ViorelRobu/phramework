<?php

use Phramework\App\Kernel;
use Phramework\Core\Database\DatabaseConnection;

$template = [
    '__@' => '<?php',
    '@__' => '?>'
];

Kernel::bind('config', require __DIR__ . '/../config/config.php');
Kernel::bind('connection', DatabaseConnection::connect(DB_HOST, DB_NAME, DB_USER, DB_PASS));
Kernel::bind('template', $template);
