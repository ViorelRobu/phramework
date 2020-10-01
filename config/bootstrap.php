<?php

use Phramework\App\Kernel;
use Phramework\Core\Configuration\GetConfig;
use Phramework\Core\Database\DatabaseConnection;

$template = [
    '<<' => '<?php',
    '>>' => '?>'
];

Kernel::bind('connection', DatabaseConnection::connect(DB_HOST, DB_NAME, DB_USER, DB_PASS));
Kernel::bind('template', $template);