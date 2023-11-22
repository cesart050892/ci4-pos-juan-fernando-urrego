<?php

namespace App\Managers;

class Auth
{
    private $model, $user;

    public function __construct()
    {
        $this->model = model("users");
    }

    private function getUser(string $field, mixed $value)
    {
        return $this->model->select("
        users.id,
        users.nombre,
        users.usuario,
        users.perfil,
        users.password,
        users.correo,
        users.ultimo_login,
        users.estado,
        users.foto,")
            ->where($field, $value)
            ->first();
    }

    public function validateUser($data)
    {
        $username = $data['user'];
        $pass = $data['pass'];
        $user = (object) $this->getUser("users.usuario", $username);

        if (!$user) {
            return false; // El usuario no existe
        }

        if (!$this->isHashed($user->password)) {
            $user->password = password_hash($user->password, PASSWORD_DEFAULT); // Hash la contraseña si no está hasheada
        }

        if (!password_verify($pass, $user->password)) {
            return false; // Contraseña incorrecta
        }
        $this->user = $user;
        return true; // Usuario validado
    }

    private function isHashed($string)
    {
        return preg_match('/^\$2[ayb]\$.{56}$/', $string) === 1;
    }


    private function getName()
    {
        [$firstname, $lastname] = array_pad(explode(" ", $this->user->name, 2), 2, '');
        $this->user->firstname = $firstname;
        $this->user->lastname = $lastname;
    }


    public function doSession()
    {
        // $this->getName();

        session()->set([
            'isLoggedIn' => true,
            'id' => $this->user->id,
            'nombre' => $this->user->nombre,
            'perfil' => $this->user->perfil,
            'foto' => $this->user->foto
        ]);
    }

    public function auth(array $request)
    {
        if ($this->validateUser($request)) :
            $this->doSession();
            return true;
        endif;
        return false;
    }
}
