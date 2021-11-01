<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Admin'
            ],
            [
                'name' => 'User'
            ]
        ];

        $this->db->table('user_role')->insertBatch($data);
    }
}
