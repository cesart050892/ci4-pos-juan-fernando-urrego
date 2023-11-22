<?php

namespace App\Controllers\Web;

use CodeIgniter\RESTful\ResourcePresenter;

class Clients extends ResourcePresenter
{
    public function index()
    {
        //
        return view('project/pages/clients');
    }
}
