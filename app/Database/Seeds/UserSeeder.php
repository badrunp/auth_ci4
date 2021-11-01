<?php

namespace App\Database\Seeds;

use CodeIgniter\CodeIgniter;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        
        $data = [
            'name' => 'Muhammad Badrun',
            'email' => 'bbadrunn@gmail.com' ,
            'password' => password_hash('123456', PASSWORD_DEFAULT),
            'role' => 1,
            'created_at' => new Time('now'),
            'updated_at' => new Time('now')
        ];

        $this->db->table('users')->insert($data);

    }
}
