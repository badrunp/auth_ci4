<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserAccessMenuTable extends Migration
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
            'user_role' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'user_menu' => [
                'type' => 'INT',
                'unsigned' => true
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_role', 'user_role', 'id');
        $this->forge->addForeignKey('user_menu', 'user_menu', 'id');
        $this->forge->createTable('user_access_menu');
    }

    public function down()
    {
        $this->forge->dropForeignKey('user_access_menu', 'user_role');
        $this->forge->dropForeignKey('user_access_menu', 'user_menu');
        $this->forge->dropTable('user_access_menu');
    }
}
