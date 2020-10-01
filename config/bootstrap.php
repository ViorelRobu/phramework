<?php

use Phramework\App\Kernel;
use Phramework\Core\Configuration\GetConfig;
use Phramework\Core\Database\DatabaseConnection;

$template = [
    '<<' => '<?php',
    '>>' => '?>'
];

Kernel::bind('connection', DatabaseConnection::connect('mysql', [
    'host' => DB_HOST, 
    'db' => DB_NAME, 
    'user' => DB_USER, 
    'password' => DB_PASS]));
    
Kernel::bind('template', $template);