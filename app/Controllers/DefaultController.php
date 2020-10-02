<?php

namespace Phramework\App\Controllers;

use Phramework\App\Kernel;
use Phramework\App\Models\User;
use Phramework\Core\Database\Builder;
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
        $test = User::all();
        return view('home', ['test' => $test]);
    }

    /**
     * Persist the data inside the database
     *
     */
    public function store()
    {
        $user = new User();
        $user->insert([$_POST['name'], $_POST['password']]);
        return redirect('/');
    }

    public function newColumn()
    {
        $connection = Kernel::get('connection');
        Builder::addColumn('users', 'verified boolean', $connection);

        return redirect('/');
    }

    public function deleteColumn()
    {
        $connection = Kernel::get('connection');
        Builder::dropColumn('users', 'verified', $connection);

        return redirect('/');
    }
}