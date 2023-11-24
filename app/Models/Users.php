<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nombre', 'usuario', 'correo', 'password', 'perfil', 'foto', 'estado', 'ultimo_login'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    
    // Functions

    // Método para obtener la ruta actual de la foto del usuario
    public function getCurrentPhotoPath($userId)
    {
        $user = $this->select('users.foto')
            ->where('id', $userId)
            ->get()
            ->getRow();

        if ($user) {
            return $user->foto;
        }

        return null; // Si el usuario no existe o no tiene una foto
    }

    public function updatePhotoPath($userId, $photoName)
    {
        $data = [
            'foto' => $photoName
        ];

        $this->set($data)
            ->where('id', $userId)
            ->update();
    }

}
