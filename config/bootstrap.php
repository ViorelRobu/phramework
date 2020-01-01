<?php

use Phramework\App\Kernel;
use Phramework\Core\Database\DatabaseConnection;

Kernel::bind('config', require __DIR__ . '/../config/config.php');
Kernel::bind('connection', DatabaseConnection::connect(DB_HOST, DB_NAME, DB_USER, DB_PASS));
