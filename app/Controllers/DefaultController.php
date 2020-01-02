<?php

namespace Phramework\App\Controllers;

use Phramework\App\Models\User;

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
        return view('home');
    }
}