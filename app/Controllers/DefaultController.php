<?php

namespace Phramework\App\Controllers;

use Phramework\App\Models\User;

class DefaultController
{
    public function index()
    {
        return dd(User::all());
    }
}