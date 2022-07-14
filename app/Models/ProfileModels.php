<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModels extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['username', 'password', 'image', 'first_name', 'last_name', 'telephone', 'level', 'created_at', 'modified_at'];
}
