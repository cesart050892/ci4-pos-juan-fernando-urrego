<?php

namespace App\Controllers\Web;

use CodeIgniter\RESTful\ResourcePresenter;

class Categories extends ResourcePresenter
{
    public function index()
    {
        //
        return view('project/pages/categories');
    }
}
