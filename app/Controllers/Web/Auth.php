<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        //
        return view('project/pages/auth/login');
    }
}
