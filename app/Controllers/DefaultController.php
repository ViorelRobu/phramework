<?php

namespace Phramework\App\Controllers;

use Phramework\App\Kernel;
use Phramework\Core\Database\QueryBuilder;

class DefaultController
{
    /**
     * Return the index page
     * 
     * @param null
     * @return view()
     */
    public function index()
    {
        $test = new QueryBuilder();
        return view('home', ['test' => $test->get('users')]);
    }
}