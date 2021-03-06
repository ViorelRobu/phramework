<?php

use Phramework\Core\Routes\{Router, Request};

// link to composer autoload
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/bootstrap.php';

Router::load(__DIR__ . '/../routes.php')
    ->direct(Request::uri(), Request::method());