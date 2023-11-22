<?php

namespace App\Database\Seeds\Data;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        //
        $model = model('users');

        $array  = array(
            array(
                'nombre' => 'Cesar Augusto Tapia',
                'usuario' => 'admin',
                'correo' => 'cesar.tapia@email.com',
                'password' => password_hash("admin.00", PASSWORD_DEFAULT),
                'perfil' => 'Administrador',
                'foto' => "",
                'estado' => true,
                'ultimo_login' => date('Y-m-d H:i:s') // Establece la fecha y hora actual
            ),
        );

        foreach ($array as $value) {
            $model->insert($value);
        }
    }
}
