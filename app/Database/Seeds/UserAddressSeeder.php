<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => '1',
                'address_line1'    => 'jl. abc no 45',
                'address_line2'    => 'jl. bcd no 21',
                'city'    => 'Cirebon',
                'postal_code'    => '98272',
                'country'    => 'Indonesia',
                'telephone'    => '0812334343',
            ],
            [
                'user_id' => '2',
                'address_line1'    => 'jl. sds no 40',
                'address_line2'    => '',
                'city'    => 'Jakarta',
                'postal_code'    => '98232',
                'country'    => 'Indonesia',
                'telephone'    => '082323242',
            ],
        ];

        // Using Query Builder
        $this->db->table('user_address')->insertBatch($data);
    }
}