<?php

namespace App\Controllers\Web;

use CodeIgniter\Controller;

class Errors extends Controller
{
    public function index()
    {
        if (!session('isLoggedIn'))
            return view('project/pages/errors/out');
        return view('project/pages/errors/in');
    }
}
