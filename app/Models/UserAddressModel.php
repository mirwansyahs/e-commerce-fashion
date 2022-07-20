<?php

namespace App\Models;

use CodeIgniter\Model;

class UserAddressModel extends Model
{
    protected $table            = 'user_address';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['user_id', 'address_line1', 'address_line2', 'country', 'province', 'city', 'district', 'village', 'postal_code', 'telephone'];
}
