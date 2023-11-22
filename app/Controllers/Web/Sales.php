<?php

namespace App\Controllers\Web;

use CodeIgniter\RESTful\ResourcePresenter;

class Sales extends ResourcePresenter
{
    public function index()
    {
        //
        return view('project/pages/sales');
    }
}
