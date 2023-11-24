<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{

    private $name = "users";

    public function up()
    {
        // Identificator

        $this->forge->addField([
            'id'          => [
                'type'           => 'BIGINT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ]
        ]);

        // Data
        $this->forge->addField([
            'nombre'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'usuario'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'correo'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default'  => null
            ],
            'password'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'perfil'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'foto'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'estado'       => [
                'type'       => 'BOOLEAN',
                'default'    => true
            ],
            'ultimo_login' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ]
        ]);


        // Primary Key
        $this->forge->addKey('id', true);

        // Unique Keys
        // $this->forge->addUniqueKey('');
        // $this->forge->addUniqueKey(['key1', 'key2']);

        // Foreign Keys 
        // $this->forge->addForeignKey('example_id', 'examples', 'id', 'cascade', 'cascade');

        // Timestamps 
        $this->forge->addField([
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
        ]);

        // Create Table
        $this->forge->createTable($this->name, true);
    }

    public function down()
    {
        $this->forge->dropTable($this->name);
    }
}
