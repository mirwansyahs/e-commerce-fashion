<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'ali',
                'password'    => password_hash("12345", PASSWORD_DEFAULT),
                'image'    => 'avatar-1.png',
                'first_name'    => 'Ali',
                'last_name'    => 'Abdurohman',
                'telephone'    => '0812334343',
                'level'    => 'admin',
                'created_at'    => Time::now(),
                'modified_at'    => Time::now(),
            ],
            [
                'username' => 'user',
                'password'    => password_hash("12345", PASSWORD_DEFAULT),
                'image'    => 'avatar-1.png',
                'first_name'    => 'User',
                'last_name'    => '',
                'telephone'    => '081233434392',
                'level'    => 'user',
                'created_at'    => Time::now(),
                'modified_at'    => Time::now(),
            ],
        ];

        // Using Query Builder
        // $this->db->table('user')->insert($data);
        $this->db->table('user')->insertBatch($data);
    }
}