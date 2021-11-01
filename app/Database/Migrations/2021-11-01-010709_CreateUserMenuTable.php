<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserMenuTable extends Migration
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
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('user_menu');
    }

    public function down()
    {
        $this->forge->dropTable('user_menu');
    }
}
