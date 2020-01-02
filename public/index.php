<?php

use Phramework\App\Kernel;
use Phramework\App\Models\User;
use Phramework\Core\Database\QueryBuilder;
use Phramework\Core\Model;
use Phramework\Core\Routes\{Router, Request};

// link required files
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/bootstrap.php';
require __DIR__ . '/../config/helpers.php';

// dd($_SERVER['REQUEST_URI']);

Router::load(__DIR__ . '/../routes.php')
    ->direct(Request::uri(), Request::method());