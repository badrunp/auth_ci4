<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserMenuSubmenu extends Migration
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
            ],
            'url' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'user_menu' => [
                'type' => 'INT',
                'unsigned' => true
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_menu', 'user_menu', 'id');
        $this->forge->createTable('user_menu_submenu');
    }

    public function down()
    {
        $this->forge->dropForeignKey('user_menu_submenu', 'user_menu');
        $this->forge->dropTable('user_menu_submenu');
    }
}
