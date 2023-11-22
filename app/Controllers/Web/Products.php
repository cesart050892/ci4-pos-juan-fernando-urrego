<?php

namespace App\Controllers\Web;

use CodeIgniter\RESTful\ResourcePresenter;

class Products extends ResourcePresenter
{
    public function index()
    {
        //
        return view('project/pages/products');
    }
}
