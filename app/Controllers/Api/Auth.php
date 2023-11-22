<?php

namespace App\Controllers\Api;

use App\Managers\Auth as ManagersAuth;
use CodeIgniter\RESTful\ResourceController;

class Auth extends ResourceController
{
    protected $modelName = 'App\Models\Users';
    protected $manager;

    public function __construct()
    {
        helper('logger');
        $this->manager = new ManagersAuth();
    }

    public function index()
    {
        //
        $rules = [
            'user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],
            'pass' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ]
        ];

        if (!$this->validate($rules))
            return $this->failValidationErrors(['error' => $this->validator->getErrors()], 401);

        $req = $this->request->getVar(['user', 'pass'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (!$this->manager->auth($req))
            return $this->failUnauthorized();

        // $this->model->db->transStart();
        // create_log('Inicio de sesion');
        // $this->model->db->transComplete();

        return $this->respond([
            'status' => 200
        ]);
    }
}
