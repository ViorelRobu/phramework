<?php

use Phramework\App\Kernel;
use Phramework\Core\Configuration\GetConfig;
use Phramework\Core\Database\DatabaseConnection;

$template = [
    '<<' => '<?php',
    '>>' => '?>'
];

Kernel::bind('config', new GetConfig());
Kernel::bind('connection', DatabaseConnection::connect(env('DB_HOST'), env('DB_NAME'), env('DB_USER'), env('DB_PASS')));
Kernel::bind('template', $template);