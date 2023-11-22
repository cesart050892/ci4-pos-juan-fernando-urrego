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
        helper(['logger', 'cookie']);
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

    public function logout()
    {
        // Aquí, podrías invalidar el token, por ejemplo, agregándolo a una lista negra
        // o estableciendo su fecha de expiración a un tiempo pasado.

        // Si estás usando JWT, no puedes "eliminar" un token una vez que se ha emitido.
        // Pero puedes agregarlo a una lista negra o asegurarte de que no se acepte en futuras solicitudes.

        // Suponiendo que tienes un método para manejar esto:
        $token = $this->request->header('Authorization');
        $this->invalidateToken($token);
        return $this->respond(['message' => 'Logged out successfully'], 200);
    }

    private function invalidateToken($token)
    {
        $cname = env('remember.cname') || 'ci_remember';
        delete_cookie($cname);
        session()->destroy();
    }
}
