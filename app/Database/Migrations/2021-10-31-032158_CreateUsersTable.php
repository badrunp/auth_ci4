<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 150
            ],
            'role' => [
                'type' => 'INT',
                'unsigned' => true, 
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'remember_token' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],  
            'verified_at' => [
                'type' => 'DATETIME',
                'null' => true  
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('role', 'user_role', 'id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropForeignKey('users', 'role');
        $this->forge->dropTable('users');
    }
}
